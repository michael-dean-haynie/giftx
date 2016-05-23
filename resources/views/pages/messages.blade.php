<?php
use App\Http\Controllers\UtilityController as UC;
?>

@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/.css')}}">
    @endif
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 u-sheet">
            <div class="row">
                <div class="col-xs-3">
                    <div id="search-panel" class="panel panel-default">
                        <div class="panel-heading">
                            <input class="form-control u-full-width" id="user-search" autocomplete="off"
                                   name="user-search" type="text" placeholder="Find your friends!">
                        </div>
                        <div class="panel-body u-pad0">
                            <ul id="search-results-container" class="list-group u-mb0">
                            </ul>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div id="chat-panel" class="panel panel-default">
                        <div id="chat-heading" class="panel-heading u-bold u-fs1p5">
                            User/Group Name
                        </div>
                        <dib class="panel-body u-pad0">
                            <div id="chat-scroll-container">
                                <div class="older-messages-container u-tac">
                                    <a id="load-older-messages" class="btn btn-link">View older messages</a>
                                </div>
                                <div id="chat-container" class="list-group u-pad1 u-mb0">
                                </div>
                            </div>
                        </dib>
                        <div id="send-container" class="panel-footer">
                                <div id="send-input-container" class="u-2thirds-width u-dib">
                                    <input class="form-control u-full-width" id="send-input" autocomplete="off"
                                           name="send-input" type="text" placeholder="Say something!">
                                </div>
                                <div id="send-button-container" class="u-dib u-third-width2">
                                    <button id="send-button" class="btn btn-default u-full-width">Send</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
    <script>
        function searchUsers(input){
            $.ajax({
                url: "{{url('/ajax/messages/search-users')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    input: input
                },
                type: "POST",
                dataType : "json"
            })
            .done(function( json ) {
                var searchResultsContainer = $('#search-results-container');
                searchResultsContainer.empty();
                for(var i = 0; i < json.users.length; i++){
                    if (i === 0) searchResultsContainer.append("<li class='list-group-item search-category'>Users</li>");
                    addSearchResult(json.users[i], searchResultsContainer);

                }
                for(var i = 0; i < json.groups.length; i++){
                    if (i === 0) searchResultsContainer.append("<li class='list-group-item search-category'>Groups</li>");
                    addSearchResult(json.groups[i], searchResultsContainer);
                }

                setChatOptionEvents();
            }).fail(function() {
                searchUsers(input);

            });
        }

        function addSearchResult(row, searchResultsContainer){
            var filename = (row.prof_pic_filename === 'null' ? '/default.png' : '/'+row.prof_pic_filename);
            searchResultsContainer.append(
                    "<li class='list-group-item list-item-button chat-option' "+
                    "data-chat-type='"+row.chat_type+"' "+
                    "data-chat-id='"+row.chat_id+"' "+
                    ">"+
                        (row.chat_type === 'user' ? "<img src='{{asset('img/profile')}}"+filename+"'"+
                            "class='img-rounded u-fis5' "+
                            ">&nbsp;&nbsp;" : "")+
                        row.name+
                    "</li>"
            );
        }

        function setChatOptionEvents(){
            $('.chat-option').on('click', function(){
                updateChat($(this).attr('data-chat-type'), $(this).attr('data-chat-id'));
            });
        }

        function addMessage(row, fromID, filename, message, chatContainer, prepend){
            var html = "\
                    <div class='message-container message-container-"+(fromID != {{auth()->user()->id}} ? 'them' : 'me' )+
                    "' data-chat-type='"+row.chat_type+"'"+
                    "' data-chat-id='"+row.chat_id+"'"+
                    "' data-message-id='"+row.message_id+"'>"+
                    (fromID != {{auth()->user()->id}} ? "<div class='message-pic-container u-dib'>\
                            <img src='{{asset('img/profile')}}"+filename+"'\
                            class='img-rounded u-fis5' \
                            >&nbsp;&nbsp;\
                        </div>" : "")+
                    "<span class='message-text-container u-dib'>\
                        "+message+"<br>\
                            <span class='u-dib message-info u-float-right'><a href=''>"+row.from_name+"</a> at "+row.created_at+"</span>\
                        </span>"+
                    "&nbsp;&nbsp;"+
                    (fromID == {{auth()->user()->id}} ? "<div class='message-pic-container u-dib'>\
                            <img src='{{asset('img/profile')}}"+filename+"'\
                            class='img-rounded u-fis5'>\
                        </div>" : "")+
                    "</div>\
                    ";

            if (prepend){
                chatContainer.prepend(html);
            }else{
                chatContainer.append(html);
            }
        }

        function updateChat(chatType, chatID){
            $.ajax({
                url: "{{url('/ajax/messages/update-chat')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    'chat-type': chatType,
                    'chat-id': chatID
                },
                type: "POST",
                dataType : "json"
            })
            .done(function( json ) {
                $('#chat-heading').empty().append(json.chatName);
                var chatContainer = $('#chat-container');
                $('.message-container').remove();
                for(var m = 0; m < json.messages.length; m++){
                    var row = json.messages[m];
                    var message = json.messages[m].message;
                    var fromID = json.messages[m].from_id;
                    var filename = (row.from_filename === 'null' ? '/default.png' : '/'+row.from_filename);
                    addMessage(row, fromID, filename, message, chatContainer, true);
                }
                scrollToBottom(false);
            })
            .fail(function(){
                console.log('Ajax failure');
            })
        }

        function loadOlderMessages(){
            var first_message = $('#chat-container .message-container:first-child');
            var messageID = first_message.attr('data-message-id');
            var chatType = first_message.attr('data-chat-type');
            var chatID = first_message.attr('data-chat-id');
            $.ajax({
                url: "{{url('/ajax/messages/load-older-messages')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    'message-id': messageID,
                    'chat-type': chatType,
                    'chat-id': chatID
                },
                type: "POST",
                dataType : "json"
            })
                    .done(function( json ) {
                        var chatContainer = $('#chat-container');
                        for(var m = 0; m < json.messages.length; m++) {
                            var row = json.messages[m];
                            var message = json.messages[m].message;
                            var fromID = json.messages[m].from_id;
                            var filename = (row.from_filename === 'null' ? '/default.png' : '/' + row.from_filename);
                            addMessage(row, fromID, filename, message, chatContainer, true);
                        }
                    });

        }

        function scrollToBottom(slow){
            var target = $("#chat-scroll-container");
            var time = (slow ? 0 : 0);
            target.animate({ scrollTop: target[0].scrollHeight }, time);
        }


        function sendMessage(){
            var inputElement = $('#send-input');
            var message = inputElement.val();
            inputElement.val('');

            var last_message = $('#chat-container .message-container:last-child');
            var messageID = last_message.attr('data-message-id');
            var chatType = last_message.attr('data-chat-type');
            var chatID = last_message.attr('data-chat-id');
            $.ajax({
                url: "{{url('/ajax/messages/send-message')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    'message-id': messageID,
                    'chat-type': chatType,
                    'chat-id': chatID,
                    'message': message
                },
                type: "POST",
                dataType : "json"
            })
                    .done(function(json){
                        var chatContainer = $('#chat-container');
                        for(var m = 0; m < json.messages.length; m++) {
                            var row = json.messages[m];
                            var message = json.messages[m].message;
                            var fromID = json.messages[m].from_id;
                            var filename = (row.from_filename === 'null' ? '/default.png' : '/' + row.from_filename);
                            addMessage(row, fromID, filename, message, chatContainer, false);
                        }
                        scrollToBottom(true);
            });

        }

        function autoUpdateChat(){
            var last_message = $('#chat-container .message-container:last-child');
            var messageID = last_message.attr('data-message-id');
            var chatType = last_message.attr('data-chat-type');
            var chatID = last_message.attr('data-chat-id');
            $.ajax({
                url: "{{url('/ajax/messages/auto-update-chat')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    'message-id': messageID,
                    'chat-type': chatType,
                    'chat-id': chatID
                },
                type: "POST",
                dataType : "json"
            })
                    .done(function(json){
                        var chatContainer = $('#chat-container');
                        console.log(json);
                        if(json.messages.length > 0){
                            for(var m = 0; m < json.messages.length; m++) {
                                var row = json.messages[m];
                                var message = json.messages[m].message;
                                var fromID = json.messages[m].from_id;
                                var filename = (row.from_filename === 'null' ? '/default.png' : '/' + row.from_filename);
                                addMessage(row, fromID, filename, message, chatContainer, false);
                            }
                            scrollToBottom(true);
                        }
                    });
        }


        //        functions^^^^^
        //---------------------------------------------------------------------------------

        // on ready
        $(document).ready(function(){
            searchUsers(' ');
            setTimeout(function(){
                $('#search-results-container li:nth-child(2)').click();
            }, 1000)
        });
        var pageHeight = jQuery(window).height();
        var navHeight = pageHeight - 375;
        $('#chat-scroll-container').css({ "height": navHeight + 'px' });
        $('#search-results-container').css({ "height": navHeight + 'px' });
        $('#search-panel').css({ "height": $('#chat-panel').height() + 'px' });
        $('#search-panel > .panel-footer').css({ "height":  '3.85em' });


        // calling searchUsers()
        $('#user-search').on('input', function(){
            searchUsers($(this).val());
        });

        //loading older messages
        $("#load-older-messages").on('click', function(){
            loadOlderMessages();
        });

        //sending new message
        $('#send-button').on('click', function(){
            sendMessage();
        });

        // auto update
        setInterval(function(){
            autoUpdateChat();
        }, 2000);




    </script>
@endsection
