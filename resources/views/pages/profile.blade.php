<?php
use App\Http\Controllers\UtilityController as UC;
?>

@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/profile.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 u-sheet">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3">
                            <div id="resize-img-container">
                                @include('includes/prof-pic',
                                ['filename' => auth()->user()->prof_pic_filename,
                                 'class' => $class = 'u-fis1'])
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <span class="u-fs3">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</span>
                            <hr class="u-hr-high">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="row">
                                        <div class="col-xs-12 u-mb2">
                                            <a href="{{url('/edit-profile')}}">
                                                <button class="btn btn-primary u-full-width u-fs1p5">
                                                    Edit your Profile</button>
                                            </a>
                                        </div>
                                        <div class="col-xs-12 u-mb2">
                                            <a href={{url('/refresh-profile')}}>
                                            <button class="btn btn-primary u-full-width u-fs1p5">
                                                Refresh Profile</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="row">
                                        <div class="col-xs-12 u-mb2">
                                            <a href={{url('/reset-password')}}>
                                                <button class="btn btn-primary u-full-width u-fs1p5">
                                                    Reset Password</button>
                                            </a>
                                        </div>
                                        <div class="col-xs-12 u-mb2">
                                            <a href="{{url('/messages')}}">
                                                <button class="btn btn-success u-full-width u-fs1p5">
                                                    View Messages</button>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 u-spacer2"></div>
                <div class="col-xs-offset-1 col-xs-10 col-md-offset-0 col-md-12">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading u-fs1p5 u-bold  glyph-flip-click"
                                     id="clps-click-wishes-u{{auth()->user()->id}}"
                                     data-glyph-target="glyph-flip-target-wishes-u{{auth()->user()->id}}"
                                     data-toggle="collapse"
                                     href="#clps-target-wishes-u{{auth()->user()->id}}"
                                     aria-expanded="false"
                                     aria-controls="clps-target-wishes-u{{auth()->user()->id}}">
                                    {{--{{auth()->user()->first_name . "'s"}} --}}Wish List
                                    <span class="glyphicon glyphicon-chevron-up u-float-right u-ml1"
                                          id="glyph-flip-target-wishes-u{{auth()->user()->id}}"></span>
                                    <span class="label label-as-badge label-primary u-float-right">{{count($userWishes)}}</span>
                                </div>
                                <div class="collapse u-maxh30 auto-overflow" id="clps-target-wishes-u{{auth()->user()->id}}">
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            <a href="{{url('/add-wish/')}}" class="btn btn-success u-full-width u-mb1">
                                                Add to your Wish List
                                            </a>
                                            @foreach($userWishes as $wish)
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
                                                        @foreach($userNotes as $note)
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
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading u-fs1p5 u-bold glyph-flip-click"
                                     id="clps-click-groups-u{{auth()->user()->id}}"
                                     data-glyph-target="glyph-flip-target-groups-u{{auth()->user()->id}}"
                                     data-toggle="collapse"
                                     href="#clps-target-groups-u{{auth()->user()->id}}"
                                     aria-expanded="false"
                                     aria-controls="clps-target-groups-u{{auth()->user()->id}}">
                                    {{--{{auth()->user()->first_name . "'s"}} --}}Groups
                                    <span class="glyphicon glyphicon-chevron-up u-float-right u-ml1"
                                          id="glyph-flip-target-groups-u{{auth()->user()->id}}"></span>
                                    <span class="label label-as-badge label-primary u-float-right">{{count($userGroups)}}</span>
                                </div>
                                <div class="collapse u-maxh30 auto-overflow" id="clps-target-groups-u{{auth()->user()->id}}">
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            <a href="{{url('/')}}" class="btn btn-success u-full-width u-mb1">
                                                Join a new Group
                                            </a>
                                            @foreach($userGroups as $group)
                                                <li class="list-group-item clps-click-list-item u-sheet2 tap-to-click"
                                                    id="clps-click-group-info-u{{auth()->user()->id}}-g{{$group->group_id}}"
                                                    data-toggle="collapse"
                                                    href="#clps-target-group-info-u{{auth()->user()->id}}-g{{$group->group_id}}"
                                                    aria-expanded="false"
                                                    aria-controls="clps-target-group-info-u{{auth()->user()->id}}-g{{$group->group_id}}">

                                                    <span class="u-bold list-item-title">{{$group->name}}</span>
                                                    <span class=" wish-list-buttons u-float-right">
                                                        {{UC::dateStringToString($group->event_date)}}
                                                    </span>
                                                </li>
                                                <div class="collapse" id="clps-target-group-info-u{{auth()->user()->id}}-g{{$group->group_id}}">
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
                                                            <li class="list-group-item">
                                                                <a class="btn btn-primary u-full-width"
                                                                   href="{{url('/group/'.$group->group_id)}}">
                                                                    Go to Group Page
                                                                </a>
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
                        <div class="col-xs-12 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading u-fs1p5 u-bold glyph-flip-click"
                                     id="clps-click-assignments-u{{auth()->user()->id}}"
                                     data-glyph-target="glyph-flip-target-assignments-u{{auth()->user()->id}}"
                                     data-toggle="collapse"
                                     href="#clps-target-assignments-u{{auth()->user()->id}}"
                                     aria-expanded="false"
                                     aria-controls="clps-target-assignments-u{{auth()->user()->id}}">
                                    {{--{{auth()->user()->first_name . "'s"}} --}}Assignments
                                    <span class="glyphicon glyphicon-chevron-up u-float-right u-ml1"
                                          id="glyph-flip-target-assignments-u{{auth()->user()->id}}"></span>
                                    <span class="label label-as-badge label-primary u-float-right">{{count($userAssignments)}}</span>
                                </div>
                                <div class="collapse u-maxh30 auto-overflow" id="clps-target-assignments-u{{auth()->user()->id}}">
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            @foreach($userAssignments as $assignment)
                                                <li class="list-group-item">
                                                    <span class="u-half-width">
                                                        @include('includes/prof-pic',
                                                                ['filename' => $assignment->assignment_filename,
                                                                'class' => $class = 'u-fis4'])
                                                        <a class="nested-click" href="{{url('/user/'.$assignment->to_id)}}">&nbsp;{{$assignment->assignment_name}}</a>
                                                    </span>
                                                    <span class="u-float-right u-dib">
                                                        <span>{{$assignment->group_name}}</span>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading u-fs1p5 u-bold  glyph-flip-click"
                                     id="clps-click-dibbs-u{{auth()->user()->id}}"
                                     data-glyph-target="glyph-flip-target-dibbs-u{{auth()->user()->id}}"
                                     data-toggle="collapse"
                                     href="#clps-target-dibbs-u{{auth()->user()->id}}"
                                     aria-expanded="false"
                                     aria-controls="clps-target-dibbs-u{{auth()->user()->id}}">
                                    {{--{{auth()->user()->first_name . "'s"}} --}}Dibbs
                                    <span class="glyphicon glyphicon-chevron-up u-float-right u-ml1"
                                          id="glyph-flip-target-dibbs-u{{auth()->user()->id}}"></span>
                                    <span class="label label-as-badge label-primary u-float-right">{{count($userDibbs)}}</span>
                                </div>
                                <div class="collapse u-maxh30 auto-overflow" id="clps-target-dibbs-u{{auth()->user()->id}}">
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            @foreach($userDibbs as $dibb)
                                                <li class="list-group-item clps-click-list-item u-sheet2 tap-to-click"
                                                    id="clps-click-notes-u{{auth()->user()->id}}-d{{$dibb->wish_id}}"
                                                    data-toggle="collapse"
                                                    href="#clps-target-notes-u{{auth()->user()->id}}-d{{$dibb->wish_id}}"
                                                    aria-expanded="false"
                                                    aria-controls="clps-target-notes-u{{auth()->user()->id}}-d{{$dibb->wish_id}}">

                                                    <table class="u-full-width">
                                                        <tbody>
                                                            <tr>
                                                                <td class="u-2thirds-width u-bold">
                                                                    {{$dibb->title}}
                                                                </td>
                                                                <td>
                                                                    <span class="u-float-left">
                                                                        @include('includes/prof-pic',
                                                                        ['filename' => $dibb->prof_pic_filename,
                                                                        'class' => $class = 'u-fis4'])
                                                                    </span>
                                                                    <span class="u-float-left u-mtp75e">
                                                                        <a class="nested-click" href="{{url('/user/'.$dibb->user_id)}}">&nbsp;&nbsp;{{$dibb->user_name}}</a>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </li>
                                                <div class="collapse" id="clps-target-notes-u{{auth()->user()->id}}-d{{$dibb->wish_id}}">
                                                    <ul class="well well-notes">
                                                        @foreach($userDibbNotes as $note)
                                                            @if($note->note_type === 'note' && $note->wish_id === $dibb->wish_id)
                                                                <li>{{$note->note}}</li>
                                                            @endif
                                                        @endforeach
                                                        @foreach($userDibbNotes as $note)
                                                            @if($note->note_type === 'url' && $note->wish_id === $dibb->wish_id)
                                                                <li><a href="{{$note->note}}">Link</a></li>
                                                            @endif
                                                        @endforeach
                                                        <a href="{{url('/give-up-dibbs/'.$dibb->wish_id)}}" class="btn btn-danger u-full-width u-mt1">
                                                            Give up
                                                        </a>
                                                    </ul>
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
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                var target = $('#clps-target-wishes-u'+{{auth()->user()->id}});
                target.collapse('show');
                var target = $('#clps-target-groups-u'+{{auth()->user()->id}});
                target.collapse('show');
                var target = $('#clps-target-assignments-u'+{{auth()->user()->id}});
                target.collapse('show');
                var target = $('#clps-target-dibbs-u'+{{auth()->user()->id}});
                target.collapse('show');
            }, 500)
        });
    </script>
@endsection




























































