@extends('layouts.app')

@section('content')


<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">{{ __('Login') }}</h1>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}" role="form">
                    @csrf
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
                    <div class="field">
                        <label for="email" class="label">{{ __('Password') }}</label>
                        <p class="control">
                           <input id="password" type="password" name="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" placeholder="{{ __('Enter your Password') }}">

                            @if ($errors->has('password'))
                                <span class="help is-danger" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </p>
                    </div>
                    <b-checkbox name="remember" {{ old('remember') ? 'checked' : '' }} class="m-t-20 checked">{{ __('Remember Me') }}</b-checkbox>
                    <button type="submit" class="button is-success is-outlined is-fullwidth m-t-30">{{ __('Login') }}</button>
                </form>
            </div>
        </div>
        <h5 class="has-text-centered m-t-20">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="is-muted">{{ __('Forgot Your Password?') }}</a>
            @endif
        </h5>
    </div>
</div>

@endsection
