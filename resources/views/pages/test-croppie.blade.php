@extends('master')

@section('to-master-css')
        <link type='text/css' rel="stylesheet" href="{{asset('Croppie-2.1.0/croppie.css')}}"/>
@endsection

@section('to-master-content')
    <div id="test-croppie"></div>
    <button class="btn btn-default" id="result">Result</button>
    <form id="upload-cropped-image" method="post" action="{{url('/upload-cropped-image')}}">
        {{ csrf_field() }}
        <input type="hidden" name="cropped-image" id="cropped-image">
    </form>
@endsection

@section('to-master-js')
    <script src="{{asset('Croppie-2.1.0/croppie.js')}}"></script>
    <script>
        var testCroppie = $('#test-croppie').croppie({
            boundary: {
                width: 500,
                height: 500
            },
            viewport: {
                width: 300,
                height: 300,
                type: 'circle'
            }
        });
        testCroppie.croppie('bind', {
            url: '{{asset("img/profile/user2.jpg")}}'/*,
            points: [77,469,280,739]*/
        });
    </script>
    <script>
        $('#result').click(function(){
            testCroppie.croppie('result', 'canvas').then(function(resp){
                $('#cropped-image').attr('value', resp);
                $('#upload-cropped-image').submit();
            })
        });
    </script>
@endsection