@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/join-group.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/join-group.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Join Group: {{$group->name}}</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/join-group/'.$group->group_id)}}">
                        {!! csrf_field() !!}

                        @include('includes.success')
                        @include('includes.error')

                        <input type="hidden" name="group-id" value="{{$group->group_id}}">

                        <div class="form-group">
                            <label for="key">Group Key <small>(Contact the group leader for the group key)</small></label>
                            <input type="password" class="form-control" name="key" placeholder="Group Key" value="{{old('key') ? old('key') : ''}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Join Group</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
@endsection