@extends('master')

@section('to-master-css')
    <link type='text/css' rel="stylesheet" href="{{asset('Croppie-2.1.0/croppie.css')}}"/>
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-12 u-sheet">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading u-bold u-fs1p5">Get your picture looking just right!</div>
                        <div class="panel-body">
                            <div id="croppie-container"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-offset-1 col-xs-10">
                                <button id="result" class="btn btn-primary u-full-width u-mb2">Crop</button>
                                <form id="upload-cropped-image" method="post" action="{{url('/crop-picture')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="cropped-image" id="cropped-image">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('to-master-js')
    <script src="{{asset('Croppie-2.1.0/croppie.js')}}"></script>
    <script>
        var testCroppie = $('#croppie-container').croppie({
            boundary: {
                width: 450,
                height: 500
            },
            viewport: {
                width: 300,
                height: 300,
                type: 'circle'
            }
        });
        testCroppie.croppie('bind', {
            url: '{{asset("img/profile/".auth()->user()->prof_pic_filename)}}'/*,
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