@extends('master')

@section('to-master-css')
    @if(file_exists(asset('css/.css')))
        <link rel="stylesheet" type="text/css" href="{{asset('css/.css')}}">
    @endif
@endsection

@section('to-master-content')
    @include('includes/mod-delete-picture')
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 u-sheet">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading u-bold u-fs1p5">Update Profile Picture</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div id="resize-img-container">
                                        @include('includes/prof-pic',
                                        ['filename' => auth()->user()->prof_pic_filename,
                                         'class' => $class = 'u-fis2'])
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <form id='edit-picture' role="form" method="POST" action="{{ url('/edit-picture') }}"
                                          enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                        @include('includes/success')

                                        <div class="form-group u-mb1{{ $errors->has('file') ? ' has-error' : '' }}">
                                            <label class="">File</label>

                                            <div class="">
                                                <input type="file" class="form-control" name="file">

                                                @if ($errors->has('file'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('file') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </form>

                                    <div class="">
                                        <button type="submit" form="edit-picture" class="btn btn-primary">
                                            Update Profile Picture
                                        </button>
                                        <form id="form-delete-picture" method="post" action="delete-picture" class="u-dib">
                                            {!! csrf_field() !!}
                                        </form>
                                        <button type="submit" class="btn btn-danger" id="btn-delete-picture">
                                            Delete Profile Picture
                                        </button>
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
        $('#btn-delete-picture').click(function(){
            $('#mod-delete-picture').modal();
        });
        $('#confirm-delete-picture').click(function(){
            $('#form-delete-picture').submit();
        });
    </script>
@endsection