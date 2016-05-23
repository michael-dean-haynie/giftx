@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/edit-wish.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/edit-wish.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="panel panel-default">
                <div class="panel-heading u-bold u-fs1p5">Edit Wish</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/edit-wish/')}}">
                        {!! csrf_field() !!}

                        @include('includes/success')
                        @include('includes/error')

                        <input type="hidden" name="wish-id" value="{{$wish->wish_id}}">

                        <div class="form-group u-mb1}">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$wish->title}}">
                        </div>

                        <div class="form-group u-mb1}">
                            <label for="priority">Priority</label>
                            <select class="form-control" name="priority">
                                <option value="1"{{$wish->priority == 1 ? ' selected' : ''}}>(1) THE FATE OF THE WORLD DEPENDS UPON ME RECEIVING THIS!</option>
                                <option value="2"{{$wish->priority == 2 ? ' selected' : ''}}>(2) This would be nice.</option>
                                <option value="3"{{$wish->priority == 3 ? ' selected' : ''}}>(3) Eh, don't sweat it.</option>
                            </select>
                        </div>

                        <div id="links-cntn" class="well">
                            <label>Links</label>

                            @for($noteIndex = 0; $noteIndex < count($notes); $noteIndex++)
                                <?php $note = $notes[$noteIndex];?>
                                @if($note->note_type == 'url')
                                    <div id="link-input-cntn-{{$noteIndex}}" class="link-input-cntn row u-mb1">
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="link{{$noteIndex}}" data-link-no="{{$noteIndex}}" value="{{$notes[$noteIndex]->note}}">
                                        </div>
                                        <div class="col-xs-3">
                                            <button id="remove-link-input-{{$noteIndex}}" class="btn btn-danger remove-link-button u-full-width" data-link-no="{{$noteIndex}}">Remove Link</button>
                                        </div>
                                    </div>
                                @endif
                            @endfor

                            <button id="add-link-button" class="btn btn-primary">Add Link</button>
                        </div>

                        <div id="notes-cntn" class="well">
                            <label>Details</label>

                            @for($noteIndex = 0; $noteIndex < count($notes); $noteIndex++)
                                <?php $note = $notes[$noteIndex];?>
                                @if($note->note_type == 'note')
                                    <div id="note-input-cntn-{{$noteIndex}}" class="note-input-cntn row u-mb1">
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="note{{$noteIndex}}" data-note-no="{{$noteIndex}}" value="{{$notes[$noteIndex]->note}}">
                                        </div>
                                        <div class="col-xs-3">
                                            <button id="remove-note-input-{{$noteIndex}}" class="btn btn-danger remove-note-button u-full-width" data-note-no="{{$noteIndex}}">Remove Detail</button>
                                        </div>
                                    </div>
                                @endif
                            @endfor

                            <button id="add-note-button" class="btn btn-primary">Add Detail</button>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
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
                    <button id="remove-note-input-'+noteNo+'"  class="btn btn-danger remove-note-button u-full-width" data-note-no="'+noteNo+'">Remove Detail</button>\
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