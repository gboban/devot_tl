@extends('layouts.app')

@section('content')
<h3>{{ __('Filter') }}</h3>
<form method="get" action="{{ url('admin/timesheets') }}">
    <div><input type="datetime-local" id="start" name="start"></div>
    <div><input type="datetime-local" id="end" name="end"></div>
    <div><button type="submit">{{ __('Search') }}</button>
@csrf
</form>
<h3>{{ __('Entries') }}</h3>
<table>
    <tr><th>{{ __('start') }}</th><th>{{ __('end') }}</th><th>{{ __('comment') }}</th></tr>
@foreach($timesheets as $timesheet)
    <tr><td>{{$timesheet->start}}</td><td>{{$timesheet->end}}</td><td>{{$timesheet->comment}}</td></tr>
@endforeach
</table>
@endsection
