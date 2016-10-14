@extends('layouts.auth')

<!-- Main Content -->
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <span><b>{{config('company.COMPANY_NAME')}}</b></span>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{trans('custom.reset_password')}}</p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input required type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{trans('custom.email')}}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{trans('custom.reset_password_button_label')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="{{ url('login') }}">{{trans('custom.sign_in')}}</a><br>
            <a href="{{url('register')}}" class="text-center">{{trans('custom.new_register')}}</a>

        </div>
    </div>
@endsection
