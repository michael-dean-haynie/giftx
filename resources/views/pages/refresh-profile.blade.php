@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/refresh-profile.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/refresh-profile.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Refresh Profile</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/refresh-profile')}}">
                        {!! csrf_field() !!}

                        @include('includes/success')
                        @include('includes/error')

                        <div class="form-group u-mb1">
                            <p class="u-bold">Select the features you would like to refresh</p>

                            <div class="well">
                                <input type="checkbox" name="reset-wishes" value="reset-wishes"> Empty Wish List<br>
                                <input type="checkbox" name="reset-dibbs" value="reset-dibbs"> Give up all dibbs<br>
                                <input type="checkbox" name="reset-groups" value="reset-groups"> Remove from all Groups<br>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Refresh Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
@endsection