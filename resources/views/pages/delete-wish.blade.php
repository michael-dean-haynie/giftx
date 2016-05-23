@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/delete-wish.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/delete-wish.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Are you sure you want to delete this wish?</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/delete-wish/')}}">
                        {!! csrf_field() !!}

                        @include('includes/success')
                        @include('includes/error')

                        <input type="hidden" name="wish-id" value="{{$wish->wish_id}}">

                        <div class="well">
                            {{$wish->title}}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger u-full-width">Detele</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('to-master-js')

@endsection