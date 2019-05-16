@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">{{ __('Join the Community') }}</h1>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" role="form">
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="name" class="label">{{ __('Name') }}</label>
                        <p class="control">
                            <input id="name" type="name" placeholder="{{ __('Enter your Name') }}" name="name" value="{{ old('name') }}" required autofocus class="input{{ $errors->has('name') ? ' is-danger' : '' }}">
                        </p>
                        @if ($errors->has('name'))
                            <span class="help is-danger" role="alert">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <label for="email" class="label">{{ __('Email Address') }}</label>
                        <p class="control">
                            <input id="email" type="email" placeholder="{{ __('name@example.com') }}" name="email" value="{{ old('email') }}" required class="input{{ $errors->has('email') ? ' is-danger' : '' }}">
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
                                   <input id="password" type="password" name="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" required placeholder="{{ __('Enter your Password') }}">

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
                                   <input id="password-confirm" type="password" name="password_confirmation" class="input" required placeholder="{{ __('Re-enter your Password') }}">
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="button is-success is-outlined is-fullwidth m-t-30">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
        <h5 class="has-text-centered m-t-20">
            <a href="{{ route('login') }}" class="is-muted">{{ __('Already a member?') }}</a>
        </h5>
    </div>
</div>

@endsection
