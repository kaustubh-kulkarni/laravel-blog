@extends('layouts.app')

@section('content')

    <h1>Contact Page</h1>
    <!-- To use blade functions we need to use @ and then function name -->
    @if(count($people))
    <ul>
        @foreach($people as $person)
        <li>{{$person}}</li>
        @endforeach
    </ul>
    <!-- To stop the function -->
    @endif

@stop

@section('footer')


@stop