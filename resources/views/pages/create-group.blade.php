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
                            <input type="text" class="form-control" name="date" placeholder="yyyy-mm-dd" value="{{old('date') ? old('date') : ''}}">
                        </div>

                        <div class="form-group">
                            <label for="key">Group Key <small>(Members will need this key to join the group)</small></label>
                            <input type="text" class="form-control" name="key" placeholder="ex. thisistheawesomegroup" value="{{old('key') ? old('key') : ''}}">
                        </div>

                        <div id="rules-cntn" class="well">
                            <label>Rules</label>
                            <button id="add-rule-button" class="btn btn-primary">Add Rule</button>
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
    <script>
        function addRuleInput(ruleNo){
            var html = '\
            <div id="rule-input-cntn-'+ruleNo+'" class="rule-input-cntn row u-mb1">\
                <div class="col-xs-9">\
                    <input type="text" class="form-control" name="rule'+ruleNo+'" data-rule-no="'+ruleNo+'">\
                </div>\
                <div class="col-xs-3">\
                    <button id="remove-rule-input-'+ruleNo+'"  class="btn btn-danger remove-rule-button u-full-width" data-rule-no="'+ruleNo+'">Remove Rule</button>\
                </div>\
            </div>\
            ';
            $('#add-rule-button').before(html);
        }


        function bindRemoveButtonEvents(){
            $('.remove-rule-button').on('click', function(event){
                event.preventDefault();
                var ruleNo = $(this).attr('data-rule-no');
                console.log(ruleNo);
                $('#rule-input-cntn-'+ruleNo).remove();
            });
        }

        //==============================================================================
        //==============================================================================

        // adding a rule input
        $('#add-rule-button').on('click', function(event){
            event.preventDefault();
            var nextRuleNo = $('#rules-cntn .rule-input-cntn').length + 1
            addRuleInput(nextRuleNo);
            bindRemoveButtonEvents();
        });

        // on document ready
        $(document).ready(function(){
            bindRemoveButtonEvents();
        });

    </script>
@endsection