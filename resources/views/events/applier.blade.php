@extends('layouts.main')

@section('content')
<div class="relative h-[680px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
    <div class="container mx-auto px-40 ">
        <h2 class="mt-32 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl text-white">
            ผู้ที่สมัครกิจกรรม
        </h2>
    </div>
</div>
<div class="block shadow-black/20 backdrop-blur-[30px] -mt-[130px] bg-white rounded-md overflow-hidden w-11/12 mx-auto mb-16">
        <ul class="divide-y divide-gray-200">

            {{-- No Event --}}
           

            @foreach ($events as $event)
                <a href="{{ route("events.show", ["event" => $event]) }}">
                    <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                        <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-800">{{ $event->title }}</h3>
                            <p class="text-gray-600 text-base">{{ $event->start_date_time }}</p>
                        </div>

                        <span class="text-gray-400">{{ $event->getDurationToStringAttribute() }}</span>

                    </li>
                </a>
            @endforeach

        </ul>
    </div>




@endsection