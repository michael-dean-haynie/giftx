@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/leave-group.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/leave-group.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Are you sure you want to leave this group?</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/leave-group')}}">
                        {!! csrf_field() !!}

                        @include('includes.success')
                        @include('includes.error')

                        <input type="hidden" name="group-id" value="{{$group->group_id}}">

                        <div class="well">
                            {{$group->name}}
                            <ul>
                                <li>Assignments in this group that are to or from you will be removed.</li>
                                <li>Your dibbs on wish-list-items for members in this group will remain. If you should like to give them up you can do so from your profile page.</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger u-full-width">Leave Group</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')

@endsection