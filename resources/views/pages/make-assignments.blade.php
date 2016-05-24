@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/make-assignments.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/make-assignments.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Make Assignments</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/make-assignments')}}">
                        {!! csrf_field() !!}

                        @include('includes/success')
                        @include('includes/error')

                        <input type="hidden" name="group-id" value="{{$group->group_id}}">
                        <input type="hidden" name="user-id" value="{{auth()->user()->id}}">

                        <div class="well">
                            <p class="u-bold">Important things to know:</p>
                            <ul>
                                <li>Clicking "Make Assignments" will assign every group member a partner, much like drawing names out of a hat.</li>
                                <li>If previous assignments were made in this group, they will be removed.</li>
                                <li>This should only happen once everyone has joined the group, so everyone gets a partner.</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Make Assignments</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
@endsection