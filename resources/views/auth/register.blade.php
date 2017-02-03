@extends('layouts.front')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-3 is-offset-4">
            <div class="card">
                <header class="card-header"><p class="card-header-title">Register</p></header>
                <div class="card-content">
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="columns is-multiline">
                            <!-- <div class="control is-horizontal">
                                <div class="control-label">
                                    <label for="name" class="label">Name</label>
                                </div>

                                <div class="control is-grouped">
                                    <input id="name" type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="notification is-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="name" type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help is-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>

                            <!-- <div class="control is-horizontal">
                                <div class="control-label">
                                    <label for="email" class="label">E-Mail Address</label>
                                </div>

                                <div class="control is-grouped">
                                    <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="notification is-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

                                @if ($errors->has('email'))
                                    <span class="help is-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                                        <span class="notification is-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                    <input id="password" type="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                            </div>

                            <!-- <div class="control is-horizontal">
                                <div class="control-label">
                                    <label for="password-confirm" class="label">Confirm Password</label>
                                </div>

                                <div class="control is-grouped">
                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Re-type Password" required>
                            </div>

                            <!-- <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="button is-primary">
                                        Register
                                    </button>
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <button type="submit" class="button is-primary is-fullwidth">
                                    Register
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
