@extends('layouts.front')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-3 is-offset-4">
            <div class="card">
                <header class="card-header"><p class="card-header-title">Login</p></header>
                <div class="card-content">
                    @if(session('message'))
                    <div class="notification is-success">
                        <button type="button" class="delete"></button>
                        {{ session('message') }}
                    </div>
                    @endif
                    @if($errors->has('message'))
                    <div class="notification is-danger">
                        <button type="button" class="delete"></button>
                        {{ $errors->first('message') }}
                    </div>
                    @endif
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <!-- <div class="control is-horizontal">
                            <div class="control-label">
                                <label for="email" class="label">E-Mail Address</label>
                            </div>

                            <div class="control is-grouped">
                                <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help is-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

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
                                    <input id="password" type="password" class="input {{ $errors->has('password') ? ' has-error' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="password" type="password" class="input {{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help is-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>

                            <div class="column is-12">
                                <button type="submit" class="button is-primary is-fullwidth is-outlined">
                                    Login
                                </button>
                            </div>

                            <div class="column is-7">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>

                            <div class="column is-5">
                                <a class="" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                </a>
                            </div>

                            <!-- <div class="control is-horizontal">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="button is-primary">
                                        Login
                                    </button>

                                    <a class="button is-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
