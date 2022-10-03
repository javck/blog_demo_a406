@extends('layout.master')

@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop

@section('content')
   <livewire:counter />
@stop
