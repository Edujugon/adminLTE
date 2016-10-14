@extends('layouts.auth')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <span><b>{{config('company.COMPANY_NAME')}}</b></span>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{trans('custom.reset_password')}}</p>

            <form role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input required type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{trans('custom.email')}}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <input type="password" class="form-control" id="password" name="password" required placeholder="{{trans('custom.password')}}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{trans('custom.repeat_password')}}" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{trans('custom.reset_password')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
@endsection
