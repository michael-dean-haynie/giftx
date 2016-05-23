@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/edit-group-leader.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/edit-group-leader.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Change Group Leader</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/edit-group-leader')}}">
                        {!! csrf_field() !!}

                        @include('includes/success')
                        @include('includes/error')

                        <input type="hidden" name="group-id" value="{{$group->group_id}}">
                        <input type="hidden" name="user-id" value="{{auth()->user()->id}}">


                        <p>This will remove you as group leader, and promote the selected member as the new group leader.</p>

                        <div class="form-group u-mb1">
                            <label for="new-leader-id"></label>
                            <select name="new-leader-id" class="form-control">
                                @foreach($members as $member)
                                    <option value="{{$member->id}}"{{$member->id == auth()->user()->id ? ' selected' : ""}}>{{$member->user_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Change Leader</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
@endsection