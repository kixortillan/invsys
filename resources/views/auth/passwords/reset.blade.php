@extends('layouts.front')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-3 is-offset-4">
            <div class="card">
                <header class="card-header"><p class="card-header-title">Reset Password</p></header>

                <div class="card-content">
                    @if (session('status'))
                        <div class="notification is-success">
                            <button type="button" class="delete"></button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="columns is-multiline">
                            <!-- <div class="control is-horizontal">
                                <div class="control-label">
                                    <label for="email" class="label">E-Mail Address</label>
                                </div>

                                <div class="control is-grouped">
                                    <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="notification is-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ $email or old('email') }}" placeholder="Email Address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help is-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <!-- <div class="control is-horizontal">
                                <div class="control-label">
                                    <label for="password" class="label">Password</label>
                                </div>

                                <div class="control is-grouped">
                                    <input id="password" type="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="password" type="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help is-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- <div class="control is-horizontal">
                                <div class="control-label">
                                    <label for="password-confirm" class="label">Confirm Password</label>
                                </div>

                                <div class="control is-grouped">
                                    <input id="password-confirm" type="password" class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="password-confirm" type="password" class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" placeholder="Re-type Password" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help is-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- <div class="control is-horizontal">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="button is-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <button type="submit" class="button is-primary is-fullwidth">
                                    Reset Password
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
