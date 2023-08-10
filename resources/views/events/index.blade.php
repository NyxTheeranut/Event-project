@extends('layouts.main')

@section('content')
    <div class="relative h-[400px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]"></div>
    <div class="block shadow-black/20 backdrop-blur-[30px] bg-zinc-800 rounded-md overflow-hidden max-w-3xl mx-auto mb-16">
        <div class="bg-red-400 py-2 px-4">
            <h2 class="text-xl font-semibold text-zinc-800">กิจกรรม</h2>
        </div>
        <ul class="divide-y divide-zinc-600">
            @foreach ($events as $event)
                <li class="flex items-center py-4 px-6 hover:bg-zinc-700">
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-white">{{ $event->name }}</h3>
                        <p class="text-zinc-400 text-base">{{ $event->date }}</p>
                    </div>
                    <span class="text-zinc-500">{{ $event->duration }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
