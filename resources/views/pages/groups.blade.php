<?php
use App\Http\Controllers\UtilityController as UC;
?>

@extends('master')

@section('to-master-css')
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 u-sheet">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading u-fs1p5 u-boldk">
                            Groups
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="{{url('/create-group')}}" class="btn btn-primary u-full-width u-mb1">
                                    Create a new Group
                                </a>
                                @foreach($allGroups as $group)
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
                                                    @if(UC::userInGroup($group->group_id))
                                                        <a class="btn btn-primary u-full-width"
                                                           href="{{url('/group/'.$group->group_id)}}">
                                                            Go to Group Page
                                                        </a>
                                                    @else
                                                        <a class="btn btn-primary u-full-width"
                                                           href="{{url('/join-group/'.$group->group_id)}}">
                                                            Join Group
                                                        </a>
                                                    @endif
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
@endsection

@section('to-master-js')
@endsection