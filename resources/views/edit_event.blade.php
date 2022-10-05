@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Event
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    <form action="{{ url('update-event/'.$event->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Event Title</label>
                            <div class="col-8">
                                <textarea type="text" name="event_title" id="event-title" class="form-control"
                                          value="{{$event->event_title}}">{{$event->event_title}}</textarea>
                            </div>
                            <div class="col-8">
                                <label for="start-date">Start Date</label><input type="date" name="start_date"
                                                                                 id="start-date" class="form-control"
                                                                                 value="{{$event->start_date }}">
                            </div>
                            <div class="col-8">
                                <label for="end-date">End Date</label><input type="date" name="end_date" id="end-date"
                                                                             class="form-control"
                                                                             value="{{$event->end_date }}">
                            </div>
                            <div class="col-8">
                                <label for="">Recurrence</label></br>
                                <label for="event-title">Repeat
                                    <input type="radio" name="recurrenceType" id="" value="1" class=""
                                           @if($event->recurrence=='1') checked @endif>
                                    <select class="" name="repeat"
                                            tabindex="10">
                                        <option @if($event->repeat==1)selected="selected" @endif value="1">Every
                                        </option>
                                        <option @if($event->repeat==2)selected="selected" @endif value="2">Every Other
                                        </option>
                                        <option @if($event->repeat==3)selected="selected" @endif value="3">Every Third
                                        </option>
                                        <option @if($event->repeat==4)selected="selected" @endif value="4">Every
                                            Fourth
                                        </option>
                                    </select>
                                    <select id="every" class="textbox-medium" name="every"
                                            tabindex="10">
                                        <option @if($event->every==1)selected="selected" @endif value="1">Day</option>
                                        <option @if($event->every==2)selected="selected" @endif value="2">Week</option>
                                        <option @if($event->every==3)selected="selected" @endif value="3">Month</option>
                                        <option @if($event->every==4)selected="selected" @endif value="4">Year</option>
                                    </select>
                                </label>
                                <label>Repeat on the
                                    <input type="radio" name="recurrenceType" id="event-title" class=""
                                           @if($event->recurrence=='2') checked @endif
                                           value="2">
                                    <select id="repeatOn" class="textbox-middle" name="repeatOn"
                                            tabindex="12">
                                        <option @if($event->repeatOn==1)selected="selected" @endif value="1">First
                                        </option>
                                        <option @if($event->repeatOn==2)selected="selected" @endif value="2">Second
                                        </option>
                                        <option @if($event->repeatOn==3)selected="selected" @endif value="3">Third
                                        </option>
                                        <option @if($event->repeatOn==4)selected="selected" @endif value="4">Fourth
                                        </option>
                                    </select><select id="repeatWeek" class="textbox-middle" name="repeatWeek"

                                                     tabindex="13">
                                        <option @if($event->repeatWeek==0)selected="selected" @endif  value="0">Sun
                                        </option>
                                        <option @if($event->repeatWeek==1)selected="selected" @endif value="1">Mon
                                        </option>
                                        <option @if($event->repeatWeek==2)selected="selected" @endif value="2">Tue
                                        </option>
                                        <option @if($event->repeatWeek==3)selected="selected" @endif value="3">Wed
                                        </option>
                                        <option @if($event->repeatWeek==4)selected="selected" @endif value="4">Thu
                                        </option>
                                        <option @if($event->repeatWeek==5)selected="selected" @endif value="5">Fri
                                        </option>
                                        <option @if($event->repeatWeek==6)selected="selected" @endif value="6">Sat
                                        </option>
                                    </select>
                                    of the

                                    <select id="repeatMonth" class="textbox-middle"
                                            name="repeatMonth"
                                            tabindex="14">
                                        <option @if($event->repeatMonth==1)selected="selected" @endif value="1">Month
                                        </option>
                                        <option @if($event->repeatMonth==3)selected="selected" @endif value="3">3
                                            Months
                                        </option>
                                        <option @if($event->repeatMonth==4)selected="selected" @endif value="4">4
                                            Months
                                        </option>
                                        <option @if($event->repeatMonth==6)selected="selected" @endif value="6">6
                                            Months
                                        </option>
                                        <option @if($event->repeatMonth==12)selected="selected" @endif value="12">Year
                                        </option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-8">
                                <button
                                    type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Edit Event
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
