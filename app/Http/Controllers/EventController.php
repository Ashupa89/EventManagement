<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(Request $request)
    {
        $request->validate([
            "event_title" => 'required',
            "start_date" => 'required',
            "end_date" => 'required',
            "recurrenceType" => "required"
        ]);
        $input = $request->all();

        if ($input['recurrenceType'] == 1) {

            $input['repeatOn'] = null;
            $input['repeatWeek'] = null;
            $input['repeatMonth'] = null;

        } else if ($input['recurrenceType'] == 2) {

            $input['repeat'] = null;
            $input['every'] = null;
        }
        $input['recurrence'] = $input['recurrenceType'];

        $event = Event::create($input);
        return redirect('event_list')->with('message', 'Event Created SuccessFully');

    }

    public function index(Request $request)
    {
        $events = Event::get();
        return view('event_list', compact('events'));
    }

    public function editEvent(Event $event)
    {
        return view('edit_event', compact('event'));
    }

    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            "event_title" => 'required',
            "start_date" => 'required',
            "end_date" => 'required',
            "recurrenceType" => "required"
        ]);
        $input = $request->all();

        if ($input['recurrenceType'] == 1) {

            $input['repeatOn'] = null;
            $input['repeatWeek'] = null;
            $input['repeatMonth'] = null;

        } else if ($input['recurrenceType'] == 2) {

            $input['repeat'] = null;
            $input['every'] = null;
        }
        $input['recurrence'] = $input['recurrenceType'];
        unset($input['_token']);
        unset($input['recurrenceType']);
        $event = Event::where('id', $id)->update($input);
        return redirect('event_list')->with('message', 'Event Updated SuccessFully');

    }

    public function viewEvent(Event $event)
    {
        $start_date = $event->start_date;
        $end_date = $event->end_date;
        $total_dates = array();
        $total_days = array();
        $every_mon = [];
        if ($event->recurrence == 1) {
            $repeat = $event->repeat;
            $every = $event->every;
            if ($repeat == 1 && $every == 1) {
                for ($x = strtotime($start_date); $x <= strtotime($end_date); $x += 86400) {
                    array_push($total_dates, date('Y-m-d', $x));
                    array_push($total_days, date('l', $x));
                }
            }

        } elseif ($event->recurrence == 2) {
            $repeatOn = $event->repeatOn;
            $repeatWeek = $event->repeatWeek;
            $repeatMonth = $event->repeatMonth;
            if ($repeatMonth == 1) {
                for ($x = strtotime($start_date); $x <= strtotime($end_date); $x += 86400) {
                    array_push($every_mon, date('Y-m-d', $x));
                }
                foreach ($every_mon as $Date) {
                    $weekday = date('l', strtotime($Date));
                    if ($weekday == 'Monday' && $repeatWeek == 1) {
                        array_push($total_dates, $Date);
                        array_push($total_days, date('l', $x));
                        break;
                    } elseif ($weekday == 'Tuesday' && $repeatWeek == 2) {
                        array_push($total_dates, $Date);
                        array_push($total_days, date('l', $x));
                        break;
                    } elseif ($weekday == 'Wednesday' && $repeatWeek == 3) {
                        array_push($total_dates, $Date);
                        array_push($total_days, date('l', $x));
                        break;
                    } elseif ($weekday == 'Thusday' && $repeatWeek == 4) {
                        array_push($total_dates, $Date);
                        array_push($total_days, date('l', $x));
                        break;
                    } elseif ($weekday == 'Friday' && $repeatWeek == 5) {
                        array_push($total_dates, $Date);
                        array_push($total_days, date('l', $x));
                        break;
                    } elseif ($weekday == 'Saturday' && $repeatWeek == 6) {
                        array_push($total_dates, $Date);
                        array_push($total_days, date('l', $x));
                        break;
                    } elseif ($weekday == 'Sunday' && $repeatWeek == 0) {
                        array_push($total_dates, $Date);
                        array_push($total_days, date('l', $x));
                        break;
                    }
                }

            }
        }
        return view('view_event', compact('event', 'total_days', 'total_dates'));
    }

    public function deleteEvent(Event $event)
    {
        $event->delete();
        return redirect('event-list')->with('message', 'Event Deleted SuccessFully');
    }
}
