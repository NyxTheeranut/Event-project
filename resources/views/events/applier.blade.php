@extends('layouts.main')

@section('content')
<div class="relative h-[480px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
    <div class="container mx-auto px-40 ">
        <h2 class="mt-32 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl text-white">
            ผู้ที่สมัครกิจกรรม
        </h2>
    </div>
</div>

<div class="block shadow-black/20 backdrop-blur-[30px] -mt-[130px] bg-white rounded-md overflow-hidden w-11/12 mx-auto mb-16">
        <ul class="divide-y divide-gray-200">

            {{-- No Event --}}
            @if (count($applications->where('event', $event)) === 0)
                <div class="flex items-center justify-center py-4 px-6">
                    <img class="w-1/6" src="https://static.vecteezy.com/system/resources/previews/003/067/848/original/cartoon-sad-smile-face-emoticon-icon-in-flat-style-free-vector.jpg" alt="Sad face">
                    <p class="text-3xl font-medium text-gray-800">ยังไม่มีใครสมัครเข้าร่วมกิจกรรมนี้</p>
                </div>
            @endif

{{--            --}}
            @foreach ($applications->where('event', $event) as $application)
                <a href="{{ route("profile.show", ['user'=>($application->user)]) }}">
                    <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                        <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-800">{{ $application->user->nickname }}</h3>
                            <p class="text-gray-600 text-base">{{ $application->user->firstname }} {{ $application->user->lastname }}</p>
                        </div>
                        <div class="ml-auto">
                        <span class="text-gray-400">
                            <a href="{{ route("home") }}" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded transition duration-300 ease-in-out">รับเข้ากิจกรรม</a>
                        </span>
                        <span class="text-gray-400">
                            <a href="{{ route("home") }}" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded transition duration-300 ease-in-out">ไม่รับเข้ากิจกรรม</a>
                        </span>
                        </div>
                    </li>
                </a>
            @endforeach

        </ul>
    </div>




@endsection