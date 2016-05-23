@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/add-wish.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/add-wish.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Make a Wish</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/add-wish')}}">
                        {!! csrf_field() !!}

                        @include('includes/success')
                        @include('includes/error')

                        <div class="form-group u-mb1}">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Name the wish">
                        </div>

                        <div class="form-group u-mb1}">
                            <label for="priority">Priority</label>
                            <select class="form-control" name="priority">
                                <option value="1">(1) THE FATE OF THE WORLD DEPENDS UPON ME RECEIVING THIS!</option>
                                <option value="2">(2) This would be nice.</option>
                                <option value="3">(3) Eh, don't sweat it.</option>
                            </select>
                        </div>

                        <div id="links-cntn" class="well">
                            <label>Links</label>

                            <div id="link-input-cntn-1" class="link-input-cntn row u-mb1">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="link1" data-link-no="1" placeholder="ex. http://amazon.com/some-item">
                                </div>
                                <div class="col-xs-3">
                                    <button id="remove-link-input-1" class="btn btn-danger remove-link-button u-full-width" data-link-no="1">Remove Link</button>
                                </div>
                            </div>

                            <button id="add-link-button" class="btn btn-primary">Add Link</button>
                        </div>

                        <div id="notes-cntn" class="well">
                            <label>Details</label>

                            <div id="note-input-cntn-1" class="note-input-cntn row u-mb1">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="note1" data-note-no="1" placeholder="If it comes in green, that'd be great. But the color doesn't matter much.">
                                </div>
                                <div class="col-xs-3">
                                    <button id="remove-note-input-1" class="btn btn-danger remove-note-button u-full-width" data-note-no="1">Remove Detail</button>
                                </div>
                            </div>

                            <button id="add-note-button" class="btn btn-primary">Add Detail</button>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
    <script>
        function addLinkInput(linkNo){
            var html = '\
            <div id="link-input-cntn-'+linkNo+'" class="link-input-cntn row u-mb1">\
                <div class="col-xs-9">\
                    <input type="text" class="form-control" name="link'+linkNo+'" data-link-no="'+linkNo+'">\
                </div>\
                <div class="col-xs-3">\
                    <button id="remove-link-input-'+linkNo+'"  class="btn btn-danger remove-link-button u-full-width" data-link-no="'+linkNo+'">Remove Link</button>\
                </div>\
            </div>\
            ';
            $('#add-link-button').before(html);
        }

        function addNoteInput(noteNo){
            var html = '\
            <div id="note-input-cntn-'+noteNo+'" class="note-input-cntn row u-mb1">\
                <div class="col-xs-9">\
                    <input type="text" class="form-control" name="note'+noteNo+'" data-note-no="'+noteNo+'">\
                </div>\
                <div class="col-xs-3">\
                    <button id="remove-note-input-'+noteNo+'"  class="btn btn-danger remove-note-button u-full-width" data-note-no="'+noteNo+'">Remove Note</button>\
                </div>\
            </div>\
            ';
            $('#add-note-button').before(html);
        }


        function bindRemoveButtonEvents(){
            $('.remove-link-button').on('click', function(event){
                event.preventDefault();
                var linkNo = $(this).attr('data-link-no');
                console.log(linkNo);
                $('#link-input-cntn-'+linkNo).remove();
            });

            $('.remove-note-button').on('click', function(event){
                event.preventDefault();
                var noteNo = $(this).attr('data-note-no');
                console.log(noteNo);
                $('#note-input-cntn-'+noteNo).remove();
            });
        }

        //==============================================================================
        //==============================================================================

        // adding a link input
        $('#add-link-button').on('click', function(event){
            event.preventDefault();
            var nextLinkNo = $('#links-cntn .link-input-cntn').length + 1
            addLinkInput(nextLinkNo);
            bindRemoveButtonEvents();
        });

        // adding a note input
        $('#add-note-button').on('click', function(event){
            event.preventDefault();
            var nextNoteNo = $('#notes-cntn .note-input-cntn').length + 1
            addNoteInput(nextNoteNo);
            bindRemoveButtonEvents();
        });

        // on document ready
        $(document).ready(function(){
           bindRemoveButtonEvents();
        });

    </script>
@endsection