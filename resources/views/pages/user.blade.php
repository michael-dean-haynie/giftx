<?php
use App\Http\Controllers\UtilityController as UC;
?>
@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/user.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/user.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 u-sheet">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-offset-4 col-xs-4">
                            <div id="resize-img-container">
                                @include('includes/prof-pic',
                                ['filename' => $otherUser->prof_pic_filename,
                                 'class' => $class = 'u-fis1'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-offset-4 col-xs-4">
                            <a href="{{url('/edit-profile')}}">
                                <button class="btn btn-success u-full-width u-fs1p5">
                                    Chat with {{$otherUser->first_name}}</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 u-spacer2"></div>
                <div class="col-xs-offset-1 col-xs-10 col-md-offset-0 col-md-12">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading u-fs1p5 u-bold  glyph-flip-click"
                                     id="clps-click-wishes-u{{$otherUser->id}}"
                                     data-glyph-target="glyph-flip-target-wishes-u{{$otherUser->id}}"
                                     data-toggle="collapse"
                                     href="#clps-target-wishes-u{{$otherUser->id}}"
                                     aria-expanded="false"
                                     aria-controls="clps-target-wishes-u{{$otherUser->id}}">
                                    {{--{{auth()->user()->first_name . "'s"}} --}}Wish List
                                    <span class="glyphicon glyphicon-chevron-down u-float-right u-ml1"
                                          id="glyph-flip-target-wishes-u{{$otherUser->id}}"></span>
                                    <span class="label label-as-badge label-primary u-float-right">{{count($otherUserWishes)}}</span>
                                </div>
                                <div class="collapse u-maxh30 auto-overflow" id="clps-target-wishes-u{{$otherUser->id}}">
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
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading u-fs1p5 u-bold glyph-flip-click"
                                     id="clps-click-groups-u{{$otherUser->id}}"
                                     data-glyph-target="glyph-flip-target-groups-u{{$otherUser->id}}"
                                     data-toggle="collapse"
                                     href="#clps-target-groups-u{{$otherUser->id}}"
                                     aria-expanded="false"
                                     aria-controls="clps-target-groups-u{{$otherUser->id}}">
                                    {{--{{auth()->user()->first_name . "'s"}} --}}Groups
                                    <span class="glyphicon glyphicon-chevron-down u-float-right u-ml1"
                                          id="glyph-flip-target-groups-u{{$otherUser->id}}"></span>
                                    <span class="label label-as-badge label-primary u-float-right">{{count($otherUserGroups)}}</span>
                                </div>
                                <div class="collapse u-maxh30 auto-overflow" id="clps-target-groups-u{{$otherUser->id}}">
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            @foreach($otherUserGroups as $group)
                                                <li class="list-group-item clps-click-list-item u-sheet2 tap-to-click"
                                                    id="clps-click-group-info-u{{$otherUser->id}}-g{{$group->group_id}}"
                                                    data-toggle="collapse"
                                                    href="#clps-target-group-info-u{{$otherUser->id}}-g{{$group->group_id}}"
                                                    aria-expanded="false"
                                                    aria-controls="clps-target-group-info-u{{$otherUser->id}}-g{{$group->group_id}}">

                                                    <span class="u-bold list-item-title">{{$group->name}}</span>
                                                    <span class=" wish-list-buttons u-float-right">
                                                        {{UC::dateStringToString($group->event_date)}}
                                                    </span>
                                                </li>
                                                <div class="collapse" id="clps-target-group-info-u{{$otherUser->id}}-g{{$group->group_id}}">
                                                    <div class="well well-notes">
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <table class="u-full-width">
                                                                    <tr>
                                                                        <td>
                                                                            <span class="u-bold">Leader</span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="u-float-right">
                                                                                @include('includes/prof-pic',
                                                                                ['filename' => $group->group_leader_filename,
                                                                                'class' => $class = 'u-fis4'])
                                                                            </span>
                                                                            <span class="u-float-right u-mtp75e">
                                                                                <a href="{{url('/user/'.$group->group_leader_id)}}">{{$group->group_leader_name}}&nbsp;&nbsp;</a>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <span class="u-bold">Members</span>
                                                                <span class="u-float-right">{{$group->member_count}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
    <script src="{{asset('js/resize-picture.js')}}"></script>
@endsection