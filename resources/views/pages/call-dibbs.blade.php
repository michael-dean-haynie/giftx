@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/call-dibbs.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/call-dibbs.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Calling Dibbs lets others know that you take responsibility for this gift.</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/call-dibbs')}}">
                        {!! csrf_field() !!}

                        @include('includes.success')
                        @include('includes.error')

                        <input type="hidden" name="wish-id" value="{{$wish->wish_id}}">

                        <div class="well">
                            {{$wish->title}}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary u-full-width">Call Dibbs</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('to-master-js')

@endsection