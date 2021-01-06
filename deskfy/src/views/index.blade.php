@extends('deskfy::layouts.app', ['header' => 'Dashboard'])
@section('content')
    <div class="container mx-auto px-4 bg-red-300">
        <x-breath::hello/>
    </div>
@endsection

<x-breath::app>