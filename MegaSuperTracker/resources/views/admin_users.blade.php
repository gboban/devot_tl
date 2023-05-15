@extends('layouts.app')

@section('content')
<table>
    <tr><th>{{ __('name') }}</th><th>{{ __('email') }}</th></tr>
@foreach($users as $user)
    <tr><td>{{$user->name}}</td><td>{{$user->email}}</td><td>
                    <a href="#"
                        onclick="event.preventDefault();
                                        document.getElementById('delete-user-form').submit();">
                        {{ __('delete') }}
                    </a>

                    <form id="delete-user-form" action="{{ url('admin/users/delete') }}" method="POST" class="d-none">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        @csrf
                    </form>
                </td></tr>
@endforeach
</table>
<h3>{{ __('New') }}</h3>
<div class="card">
    <div class="card-header">{{ __('User') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ url('admin/users/new') }}">
            @csrf

            <div class="row mb-3">
                <label for="start" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('start') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('end') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
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
