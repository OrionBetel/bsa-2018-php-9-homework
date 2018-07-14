@extends('currencies')

@section('title', $currencies[0]['title'])

@section('heading')
    <h1 class="display-4 text-center">{{ $currencies[0]['title'] }}</h1>
@endsection
