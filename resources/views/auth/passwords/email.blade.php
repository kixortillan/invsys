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

                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="columns is-multiline">
                            <!-- <div class="control is-horizontal">
                                <div class="control-label">
                                    <label for="email" class="label">E-Mail Address</label>
                                </div>

                                <div class="control is-grouped">
                                    <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="notification is-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

                                @if ($errors->has('email'))
                                    <span class="help is-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <!-- <div class="control is-horizontal">
                                <div class="">
                                    <button type="submit" class="button is-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div> -->
                            <div class="column is-12">
                                <button type="submit" class="button is-primary is-fullwidth">
                                    Send Password Reset Link
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
