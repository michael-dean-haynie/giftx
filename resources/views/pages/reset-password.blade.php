@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading u-bold u-fs1p5">Reset Password</div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ url('/reset-password') }}">
                                {!! csrf_field() !!}

                                @include('includes/success')

                                <div class="form-group u-mb1{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="">New Password</label>

                                    <div class="">
                                        <input type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group u-mb1{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label class="">Confirm New Password</label>

                                    <div class="">
                                        <input type="password" class="form-control" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">
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
    </div>
@endsection

@section('to-master-js')
@endsection