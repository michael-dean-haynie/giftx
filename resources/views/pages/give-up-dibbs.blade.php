@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/give-up-dibbs.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/give-up-dibbs.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Are you sure you want to give up dibbs on this wish?</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/give-up-dibbs/')}}">
                        {!! csrf_field() !!}

                        @include('includes.success')
                        @include('includes.error')

                        <input type="hidden" name="wish-id" value="{{$wish->wish_id}}">

                        <div class="well">
                            {{$wish->title}}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger u-full-width">Give up dibbs</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('to-master-js')

@endsection