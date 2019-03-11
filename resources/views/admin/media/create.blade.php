@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

@endsection

@section('content')

{!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}

{!! Form::close() !!}

<h1>Upload Media</h1>

@stop





@section('scripts')

<!--    {{--My option here is not use the minify version, for a eventual debugging situation--}}
    {{--Links copied from https://cdnjs.com/libraries/dropzone--}}-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

@endsection
