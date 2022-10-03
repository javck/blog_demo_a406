@extends('layout.master')

@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop

@section('content')
    HTML1
   @livewire('counter',['msg'=>'Hello Zack'])
     HTML2
@stop
