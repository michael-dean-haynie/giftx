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
                        <div class="panel-heading u-bold u-fs1p5">Edit Profile</div>
                        <div class="panel-body">
                            <form id='edit-profile' role="form" method="POST" action="{{ url('/edit-profile') }}">
                                {!! csrf_field() !!}

                                @include('includes/success')

                                <div class="form-group u-mb1{{ $errors->has('first-name') ? ' has-error' : 'first-name' }}">
                                    <label class="">First Name</label>

                                    <div class="">
                                        <input type="text" class="form-control" name="first-name"
                                               value="{{ auth()->user()->first_name}}">

                                        @if ($errors->has('first-name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first-name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group u-mb1{{ $errors->has('last-name') ? ' has-error' : 'last-name' }}">
                                    <label class="">Last Name</label>

                                    <div class="">
                                        <input type="text" class="form-control" name="last-name"
                                               value="{{ auth()->user()->last_name}}">

                                        @if ($errors->has('last-name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last-name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group u-mb1{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="">E-Mail Address</label>

                                    <div class="">
                                        <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="">
                                <button type="submit" form='edit-profile' class="btn btn-primary">
                                    Update Profile
                                </button>
                                <a href="{{url('/edit-picture')}}" class="u-float-right">
                                    <button class="btn btn-success">
                                        Update Profile Picture
                                    </button>
                                </a>
                                <a href="{{url('/reset-password')}}" class="u-float-right">
                                    <button class="btn btn-link">
                                        Reset Password
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
@endsection