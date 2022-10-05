@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Event List
                </div>

                <div class="panel-body">
                    <table>
                        <tbody>
                        <thead>
                        <tr>
                            <td width="20">
                                <strong>#</strong>
                            </td>
                            <td width="150">
                                <strong>Title</strong>
                            </td>
                            <td width="250">
                                <strong>Dates</strong>
                            </td>
                            <td width="250">
                                <strong>Occurrence</strong>
                            </td>
                            <td width="200">
                                <strong>Actions</strong>
                            </td>
                        </tr>
                        </thead>
                        @foreach($events as $index=>$event)
                            <tbody>
                            <tr>
                                <td>
                                    {{$index+1}}
                                </td>
                                <td>
                                    {{$event->event_title}}
                                </td>
                                <td>
                                    {{$event->start_date}} to {{$event->end_date}}
                                </td>
                                <td>
                                    @if($event->recurrence=='1')
                                        @php
                                            $repeat=['0','','Second','Third','Fourth'];
                                            $every=['','Day','Week','Month','Year']
                                        @endphp
                                        Every {{$repeat[$event->repeat]}}
                                        {{$every[$event->every]}}
                                    @elseif($event->recurrence === '2')

                                        @php
                                            $repeatOnMonths=['0 Months','Months','2 Months','3 Months','4 Months','5 Months','6 Months','7 Months','8 Months','9 Months','10 Months','11 Months','Years'];
                                            $days=['Sun','Mon','Tue','Wed','Thus','Fri','Sat'];
                                            $repeatOn=['0','First','Second','Third','Fourth'];
                                        @endphp
                                        {{$repeatOn[$event->repeatOn]}} {{$days[$event->repeatWeek]}}day
                                        of {{$repeatOnMonths[$event->repeatMonth]}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('view-event/'.$event->id)}}" class="btn btn-primary">View</a>
                                    <a href="{{url('edit-event/'.$event->id)}}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
