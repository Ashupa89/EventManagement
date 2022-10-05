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
//            $request->validate([
//                "repeat" => "required",
//                "every" => "required"
//            ]);
            $input['repeatOn'] = null;
            $input['repeatWeek'] = null;
            $input['repeatMonth'] = null;

        } else if ($input['recurrenceType'] == 2) {
//            $request->validate([
//                "repeatOn" => "required",
//                "repeatWeek" => "required",
//                "repeatMonth" => "required"
//            ]);
            $input['repeat'] = null;
            $input['every'] = null;
        }
        $input['recurrence'] = $input['recurrenceType'];

        $event = Event::create($input);
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
//            $request->validate([
//                "repeat" => "required",
//                "every" => "required"
//            ]);
            $input['repeatOn'] = null;
            $input['repeatWeek'] = null;
            $input['repeatMonth'] = null;

        } else if ($input['recurrenceType'] == 2) {
//            $request->validate([
//                "repeatOn" => "required",
//                "repeatWeek" => "required",
//                "repeatMonth" => "required"
//            ]);
            $input['repeat'] = null;
            $input['every'] = null;
        }
        $input['recurrence'] = $input['recurrenceType'];
        unset($input['_token']);
        unset($input['recurrenceType']);
        $event = Event::where('id', $id)->update($input);
    }

    public function viewEvent(Event $event)
    {
        $start_date = $event->start_date;
        $end_date = $event->end_date;
        $total_dates = array();
        $total_days = array();
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
        }
        return view('view_event', compact('event', 'total_days', 'total_dates'));
    }
}
