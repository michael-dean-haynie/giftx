@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/create-group.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/create-group.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Create a Group!</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/create-group')}}">
                        {!! csrf_field() !!}

                        @include('includes.success')
                        @include('includes.error')

                        <div class="form-group">
                            <label for="name">Group Name</label>
                            <input type="text" class="form-control" name="name" placeholder="My Awesome Group" value="{{old('name') ? old('name') : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="date">Event Date</label>
                            <input type="text" class="form-control" name="date" placeholder="yyyy/mm/dd" value="{{old('date') ? old('date') : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="key">Group Key <small>(Members will need this key to join the group)</small></label>
                            <input type="text" class="form-control" name="key" placeholder="ex. thisistheawesomegroup" value="{{old('key') ? old('key') : ''}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Group</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('to-master-js')

@endsection