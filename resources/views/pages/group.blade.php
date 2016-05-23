@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/group.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/group.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 u-sheet">
            <div class="row">
                <div class="col-xs-3">
                    <div id="members-panel" class="panel panel-default">
                        <div class="panel-heading">Members</div>
                        <div class="panel-body u-pad0">
                            <ul id="members-container" class="list-group u-mb0">
                                @foreach($members as $member)
                                    <li class="list-group-item">
                                        <div class="u-dib u-2thirds-width">
                                            {{$member->user_name}}
                                        </div>
                                        <div class="u-dib u-third-width2 u-tar">
                                            <span>
                                                @include('includes/prof-pic',
                                                ['filename' => $member->prof_pic_filename,
                                                'class' => $class = 'u-fis4'])
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div id="user-panel" class="panel panel-default">
                        <div id="user-panel-heading" class="panel-heading u-bold u-fs1p5">

                        </div>
                        <div class="panel-body u-pad0">

                        </div>
                        <div id="" class="panel-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
@endsection