<?php
use App\Http\Controllers\UtilityController as UC;
?>

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
                        <div class="panel-heading u-bold u-fs1p5">Members</div>
                        <div class="panel-body u-pad0">
                            <ul id="members-container" class="list-group u-mb0">
                                @foreach($members as $member)
                                    <li class="list-group-item list-item-button member-button
                                    {{$otherUser->id == $member->id ? ' list-item-button-act' : ''}}"
                                            data-user-id="{{$member->id}}">
                                        <div class="u-dib u-2thirds-width u-bold">
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
                        <div class="panel-heading u-bold u-fs1p5">
                            <div class="u-2thirds-width u-dib">
                                {{$group->name}}&nbsp;&nbsp;
                                <span id="group-title-date">({{UC::dateStringToString($group->event_date)}})</span>
                            </div>
                            <div class="u-third-width2 u-dib u-tar">
                                <a href="{{url('/')}}">
                                    <button class="btn btn-danger">Leave Group</button>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body u-pad0">
                            <div class="row">
                                <div class="col-xs-12 u-bold u-fs2 u-tac u-mb1 u-mt1">
                                    <a href="{{url('/user/'.$otherUser->id)}}">{{$otherUser->first_name . " " . $otherUser->last_name}}</a>&nbsp;&nbsp;
                                    @include('includes/prof-pic',
                                    ['filename' => $otherUser->prof_pic_filename,
                                    'class' => $class = 'u-fis4'])
                                </div>
                                <div class="col-xs-offset-1 col-xs-10">
                                    @if($otherUser->id == auth()->user()->id)
                                        <div class="panel panel-default">
                                            <div class="panel-heading u-fs1p5 u-bold">Wish List</div>
                                            <div class="panel-body">
                                                <ul class="list-group">
                                                    <a href="{{url('/add-wish/')}}" class="btn btn-success u-full-width u-mb1">
                                                        Add to your Wish List
                                                    </a>
                                                    @foreach($otherUserWishes as $wish)
                                                        <li class="list-group-item clps-click-list-item u-sheet2 tap-to-click"
                                                            id="clps-click-notes-u{{auth()->user()->id}}-w{{$wish->wish_id}}"
                                                            data-toggle="collapse"
                                                            href="#clps-target-notes-u{{auth()->user()->id}}-w{{$wish->wish_id}}"
                                                            aria-expanded="false"
                                                            aria-controls="clps-target-notes-u{{auth()->user()->id}}-w{{$wish->wish_id}}">

                                                            <div class="u-dib u-2thirds-width">
                                                                <span class="u-bold list-item-title u-full-width">{{$wish->title}}</span>
                                                            </div>
                                                            <div class="u-dib u-third-width2">
                                                    <span class="u-float-right">
                                                        <span class="priority-container">Priority: {{$wish->priority}}&nbsp;&nbsp;&nbsp;</span>
                                                        <span class="u-dib">
                                                            <a href="{{url('/edit-wish/'.$wish->wish_id)}}" class="btn btn-primary btn-glyph nested-click">
                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                            </a>
                                                            <a href="{{url('/delete-wish/'.$wish->wish_id)}}" class="btn btn-danger btn-glyph nested-click">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </a>
                                                        </span>
                                                    </span>
                                                            </div>
                                                        </li>
                                                        <div class="collapse" id="clps-target-notes-u{{auth()->user()->id}}-w{{$wish->wish_id}}">
                                                            <ul class="well well-notes">
                                                                @foreach($otherUserNotes as $note)
                                                                    @if($note->note_type === 'note' && $note->wish_id === $wish->wish_id)
                                                                        <li>{{$note->note}}</li>
                                                                    @endif
                                                                @endforeach
                                                                @foreach($userNotes as $note)
                                                                    @if($note->note_type === 'url' && $note->wish_id === $wish->wish_id)
                                                                        <li><a href="{{$note->note}}">Link</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-heading u-fs1p5 u-bold">Wish List</div>
                                            <div class="panel-body">
                                                <ul class="list-group">
                                                    @foreach($otherUserWishes as $wish)
                                                        <li class="list-group-item clps-click-list-item u-sheet2 tap-to-click"
                                                            id="clps-click-notes-u{{$otherUser->id}}-w{{$wish->wish_id}}"
                                                            data-toggle="collapse"
                                                            href="#clps-target-notes-u{{$otherUser->id}}-w{{$wish->wish_id}}"
                                                            aria-expanded="false"
                                                            aria-controls="clps-target-notes-u{{$otherUser->id}}-w{{$wish->wish_id}}">

                                                            <div class="u-dib u-2thirds-width">
                                                                <span class="u-bold list-item-title u-full-width">{{$wish->title}}</span>
                                                            </div>
                                                            <div class="u-dib u-third-width2">
                                                    <span class="u-float-right">
                                                        @if($wish->has_dibbs_id == 0)
                                                            <a class="nested-click" href="{{url('/call-dibbs/'.$wish->wish_id)}}">
                                                                <button class="btn btn-success">Call Dibbs</button>
                                                            </a>
                                                        @elseif($wish->has_dibbs_id == auth()->user()->id)
                                                            <a class="nested-click" href="{{url('/give-up-dibbs/'.$wish->wish_id)}}">
                                                                <button class="btn btn-danger">Give Up</button>
                                                            </a>
                                                        @else
                                                            <span class="u-blue-text">
                                                                {{$wish->has_dibbs_name}}
                                                            </span>
                                                        @endif
                                                    </span>
                                                            </div>
                                                        </li>
                                                        <div class="collapse" id="clps-target-notes-u{{$otherUser->id}}-w{{$wish->wish_id}}">
                                                            <ul class="well well-notes">
                                                                @foreach($otherUserNotes as $note)
                                                                    @if($note->note_type === 'note' && $note->wish_id === $wish->wish_id)
                                                                        <li>{{$note->note}}</li>
                                                                    @endif
                                                                @endforeach
                                                                @foreach($otherUserNotes as $note)
                                                                    @if($note->note_type === 'url' && $note->wish_id === $wish->wish_id)
                                                                        <li><a href="{{$note->note}}">Link</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
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
    <script>
        $('.member-button').on('click', function(){
            document.location.href='{{url("/group/".$group->group_id)}}'+'/'+$(this).attr('data-user-id');
        })
    </script>
@endsection