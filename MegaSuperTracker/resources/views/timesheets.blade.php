@extends('layouts.app')

@section('content')
<table>
    <tr><th>{{ __('start') }}</th><th>{{ __('end') }}</th><th>{{ __('comment') }}</th></tr>
@foreach($timesheets as $timesheet)
    <tr><td>{{$timesheet->start}}</td><td>{{$timesheet->end}}</td><td>{{$timesheet->comment}}</td></tr>
@endforeach
</table>
<h3>{{ __('New') }}</h3>
<div class="card">
    <div class="card-header">{{ __('Time Entry') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('timesheets') }}">
            @csrf

            <div class="row mb-3">
                <label for="start" class="col-md-4 col-form-label text-md-end">{{ __('Start') }}</label>

                <div class="col-md-6">
                    <input id="start" type="datetime-local" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" required autocomplete="start" autofocus>

                    @error('start')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="end" class="col-md-4 col-form-label text-md-end">{{ __('End') }}</label>

                <div class="col-md-6">
                    <input id="end" type="datetime-local" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" required autocomplete="end" autofocus>

                    @error('end')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Comment') }}</label>

                <div class="col-md-6">
                    <input id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" autocomplete="comment" autofocus>

                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
    </div>
</div>
@endsection
