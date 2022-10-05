@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Event
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
                    <form action="{{ url('add-event') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Event Title</label>
                            <div class="col-8">
                                <textarea type="text" name="event_title" id="event-title" class="form-control"
                                          value="{{ old('event_title') }}"></textarea>
                            </div>
                            <div class="col-8">
                                <label for="start-date">Start Date</label><input type="date" name="start_date"
                                                                                 id="start-date" class="form-control"
                                                                                 value="{{ old('event_title') }}">
                            </div>
                            <div class="col-8">
                                <label for="end-date">End Date</label><input type="date" name="end_date" id="end-date"
                                                                             class="form-control"
                                                                             value="{{ old('event_title') }}">
                            </div>
                            <div class="col-8">
                                <label for="">Recurrence</label></br>
                                <label for="event-title">Repeat
                                    <input type="radio" name="recurrenceType" id="" class=""
                                           value="1">
                                    <select class="" name="repeat"
                                            tabindex="10">
                                        <option selected="selected" value="1">Every</option>
                                        <option value="2">Every Other</option>
                                        <option value="3">Every Third</option>
                                        <option value="4">Every Fourth</option>
                                    </select>
                                    <select id="every" class="textbox-medium" name="every"
                                            tabindex="10">
                                        <option selected="selected" value="1">Day</option>
                                        <option value="2">Week</option>
                                        <option value="3">Month</option>
                                        <option value="4">Year</option>
                                    </select>
                                </label>
                                <label>Repeat on the
                                    <input type="radio" name="recurrenceType" id="event-title" class=""
                                           value="2">
                                    <select id="repeatOn" class="textbox-middle" name="repeatOn"
                                            tabindex="12">
                                        <option selected="selected" value="1">First</option>
                                        <option value="2">Second</option>
                                        <option value="3">Third</option>
                                        <option value="4">Fourth</option>
                                    </select><select id="repeatWeek" class="textbox-middle" name="repeatWeek"

                                                     tabindex="13">
                                        <option selected="selected" value="0">Sun</option>
                                        <option value="1">Mon</option>
                                        <option value="2">Tue</option>
                                        <option value="3">Wed</option>
                                        <option value="4">Thu</option>
                                        <option value="5">Fri</option>
                                        <option value="6">Sat</option>
                                    </select>
                                    of the

                                    <select id="repeatMonth" class="textbox-middle"
                                            name="repeatMonth"
                                            tabindex="14">
                                        <option selected="selected" value="1">Month</option>
                                        <option value="3">3 Months</option>
                                        <option value="4">4 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="12">Year</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-8">
                                <button
                                    type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Event
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
