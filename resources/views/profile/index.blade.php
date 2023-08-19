@extends('layouts.main')

@section('content')
    <h1>Well cum! {{ Auth::user()->nickname }}</h1>

@endsection
