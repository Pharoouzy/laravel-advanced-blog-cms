@extends('layouts.app')

@section('content')


@if (session('status'))
    <div class="notification is-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">{{ __('Reset Your Password') }}</h1>
                <form class="form-horizontal" method="POST" action="{{ route('password.update') }}" role="form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="field">
                        <label for="email" class="label">{{ __('Email Address') }}</label>
                        <p class="control">
                            <input id="email" type="email" placeholder="{{ __('name@example.com') }}" name="email" value="{{ old('email') }}" required autofocus class="input{{ $errors->has('email') ? ' is-danger' : '' }}">
                        </p>
                        @if ($errors->has('email'))
                            <span class="help is-danger" role="alert">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label for="email" class="label">{{ __('Password') }}</label>
                                <p class="control">
                                   <input id="password" type="password" name="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" required>

                                    @if ($errors->has('password'))
                                        <span class="help is-danger" role="alert">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                                <p class="control">
                                   <input id="password-confirm" type="password" name="password_confirmation" class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" required>

                                   @if ($errors->has('password_confirmation'))
                                        <span class="help is-success" role="alert">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button is-primary is-outlined is-fullwidth m-t-30">{{ __('Reset Password') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
