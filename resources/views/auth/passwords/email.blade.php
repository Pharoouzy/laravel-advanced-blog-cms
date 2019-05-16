@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-150">
        <div class="card">
            <div class="card-content">
                <h1 class="title">{{ __('Reset Password') }}</h1>
                @if (session('status'))
                    <div class="notification is-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" role="form">
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
                    <button type="submit" class="button is-success is-outlined is-fullwidth m-t-30">{{ __('Get Reset Link') }}</button>
                </form>
            </div>
        </div>
        <h5 class="has-text-centered m-t-20">
            @if (Route::has('password.request'))
                <a href="{{ route('login') }}" class="is-muted"><i class="fa fa-caret-left m-r-10"></i>{{ __('Back to Login') }}</a>
            @endif
        </h5>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
