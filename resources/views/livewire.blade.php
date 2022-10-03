@extends('layout.master')

@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop

@section('body')
    HTML1
   @livewire('counter')
     HTML2
@stop
