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
                        <div class="panel-heading u-fs1p5 u-bold glyph-flip-click"
                             id="clps-click-groups-u{{auth()->user()->id}}"
                             data-glyph-target="glyph-flip-target-groups-u{{auth()->user()->id}}"
                             data-toggle="collapse"
                             href="#clps-target-groups-u{{auth()->user()->id}}"
                             aria-expanded="false"
                             aria-controls="clps-target-groups-u{{auth()->user()->id}}">
                            {{--{{auth()->user()->first_name . "'s"}} --}}Groups
                                    <span class="glyphicon glyphicon-chevron-down u-float-right u-ml1"
                                          id="glyph-flip-target-groups-u{{auth()->user()->id}}"></span>
                            <span class="label label-as-badge label-primary u-float-right">{{count($userGroups)}}</span>
                        </div>
                        <div class="collapse u-maxh30 auto-overflow" id="clps-target-groups-u{{auth()->user()->id}}">
                            <div class="panel-body">
                                <ul class="list-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <a href="{{url('/')}}" class="btn btn-primary u-full-width u-mb1">
                                                Join a new Group
                                            </a>
                                        </div>
                                        <div class="col-xs-6">
                                            <a href="{{url('/create-group')}}" class="btn btn-primary u-full-width u-mb1">
                                                Create a new Group
                                            </a>
                                        </div>
                                    </div>
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
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
@endsection