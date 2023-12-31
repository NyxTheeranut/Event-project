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
                        <div>
                        <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                        <span class="flex-1">
                            <h3 class="text-lg font-medium text-gray-800">{{ $application->user->nickname }}</h3>
                            <p class="text-gray-600 text-base">{{ $application->user->firstname }} {{ $application->user->lastname }}</p>
                        </span>


                        @if ($application->status === "PENDING")
                        <div class="text-gray-400 flex justify-between" >

                            <form class="mr-2" method="get" action="{{ route("events.applications.update", ['event'=>$application->event]) }}">
                                <input type="text" id="status" name="status" hidden value="ACCEPTED"/>
                                <input type="text" id="application_id" name="application_id" hidden value="{{ $application->id }}"/>
                                <button class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                                    รับเข้ากิจกรรม
                                </button>
                            </form>
                            <form method="get" action="{{ route("events.applications.update", ['event'=>$application->event]) }}">
                                <input type="text" id="status" name="status" hidden value="REJECTED"/>
                                <input type="text" id="application_id" name="application_id" hidden value="{{ $application->id }}"/>
                                <button href="{{ route("home") }}" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                                    ไม่รับเข้ากิจกรรม
                                </button>
                            </form>
                        </div>
                        </div>
                        @else
                            <div class="text-gray-400">
                                <button class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                                    {{ $application->status }}
                                </button>
                            </div>
                            <div class="text-gray-400 mt-2"></div>
                        @endif

                    </li>
                </a>
            @endforeach

        </ul>
    </div>




@endsection
