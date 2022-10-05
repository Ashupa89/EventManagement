@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$event->event_title}}
                </div>

                <div class="panel-body">
                    <table class="table table-border">
                        <tbody>
                        <thead>
                        <tr>
                            <td width="20">
                                <strong>Date</strong>
                            </td>
                            <td width="150">
                                <strong>Day Name</strong>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($total_dates as $i=>$date)
                            <tr>
                                <td>{{$date}}</td>
                                <td>{{$total_days[$i]}}</td>
                            </tr>
                        </tbody> @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
