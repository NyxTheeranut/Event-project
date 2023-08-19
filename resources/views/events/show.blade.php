@extends('layouts.main')

@section('content')
    <!-- Heading -->
    <div class="container mx-auto px-40 ">
        <h2 class="mt-12 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl">
            {{ $event->title }}
        </h2>
    </div>
@endsection
