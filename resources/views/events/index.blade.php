@extends('layouts.main')

@section('content')

    {{-- Heading Image --}}
    {{--<div class="relative h-[570px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
        <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.5)] bg-fixed">
    <div class="relative h-[470px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
        <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed">
            <div class="flex h-full items-center justify-left">
                <div class="max-w-[800px] px-6 py-6 text-left text-white md:py-0 md:px-16">

                    <h2 class="mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                        กิจกรรม
                    </h2>

                    @if (Auth::check())
                        @if (Auth::user()->role === "STAFF")
                    @can('create', \App\Models\Event::class)
                        <button id="popupButton" class="inline-block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 focus:outline-none">
                            สร้างกิจกรรม
                        </button>
                    @endcan
                        @endif
                    @endif

                    <!-- Popup Modal (Hidden by default) -->
                    <div id="popupModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-lg p-8">
                            <div class="container mx-auto px-10">
                                <h2 class="header">
                                    หน้าสร้างกิจกรรม
                                </h2>
                                <form method="POST" action="{{ route('event.create') }}">
                                    @csrf

                                    <!-- Title -->
                                    <div>
                                        <label  class="block font-medium text-sm text-gray-700 dark:text-black-300 left-align-label mt-2" for="title" :value="__('ชื่อกิจกรรม')">
                                            ชื่อกิจกรรม
                                        </label>
                                        <input  class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full text-black"
                                                id="title"
                                                type="text"
                                                name="title" :value="old('title')"

                                                autofocus
                                                autocomplete="title"/>
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>

                                    <!-- Start Date Time -->
                                    <div class="mt-4">
                                        <label  class="block font-medium text-sm text-gray-700 dark:text-black-300 left-align-label" for="start_date_time" :value="__('วันเริ่มกิจกรรม')">
                                            วันที่จัดกิจกรรม
                                        </label>
                                        <input  class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full text-black"
                                                id="start_date_time"
                                                type="date"
                                                name="start_date_time" :value="old('start_date_time')"
                                                required
                                                autofocus
                                                autocomplete="date" />
                                        <x-input-error :messages="$errors->get('start_date_time')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center justify-middle mt-6">
                                        <button id="closePopupButton" class="mr-auto btn">Close</button>
                                        <button class="ml-auto btn">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}

    {{-- Event List --}}
{{--    <div class="block shadow-black/20 backdrop-blur-[30px] -mt-[130px] bg-white rounded-md overflow-hidden w-11/12 mx-auto mb-16">--}}
{{--        <ul class="divide-y divide-gray-200">--}}

{{--            --}}{{-- No Event --}}
{{--           @if (count($events) === 0)--}}
{{--                <div class="flex items-center justify-center py-4 px-6">--}}
{{--                    <img class="w-1/6" src="https://static.vecteezy.com/system/resources/previews/003/067/848/original/cartoon-sad-smile-face-emoticon-icon-in-flat-style-free-vector.jpg" alt="Sad face">--}}
{{--                    <p class="text-3xl font-medium text-gray-800">404 Event Not Found</p>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @foreach ($events as $event)--}}
{{--                <a href="{{ route("events.show", ["event" => $event]) }}">--}}
{{--                    <li class="flex items-center py-4 px-6 hover:bg-gray-50">--}}
{{--                        <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>--}}
{{--                        <div class="flex-1">--}}
{{--                            <h3 class="text-lg font-medium text-gray-800">{{ $event->title }}</h3>--}}
{{--                            <p class="text-gray-600 text-base">{{ $event->start_date_time }}</p>--}}
{{--                        </div>--}}

{{--                        <span class="text-gray-400">{{ $event->getDurationToStringAttribute() }}</span>--}}

{{--                    </li>--}}
{{--                </a>--}}
{{--            @endforeach--}}

{{--        </ul>--}}
{{--    </div>--}}
        <div class="max-w-[800px] px-6 py-6 text-left text-white md:py-0 md:px-16 mb-10">

            <h2 class="mb-8 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl mt-20 ml0 "style="color: black;">
            กิจกรรม
            </h2>

        @can('create', \App\Models\Event::class)
            <button id="popupButton" class="inline-block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 focus:outline-none">
                สร้างกิจกรรม
            </button>
        @endcan

        <!-- Popup Modal (Hidden by default) -->
        <div id="popupModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg p-8">
                <div class="container mx-auto px-10">
                    <form method="POST" action="{{ route('event.create') }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <label  class="block font-medium text-sm text-gray-700 dark:text-black-300 left-align-label mt-2" for="title" :value="__('ชื่อกิจกรรม')">
                                ชื่อกิจกรรม
                            </label>
                            <input  class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full text-black"
                                    id="title"
                                    type="text"
                                    name="title" :value="old('title')"

                                    autofocus
                                    autocomplete="title"/>
{{--                            @error() @enderror--}}
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Start Date Time -->
                        <div class="mt-4">
                            <label  class="block font-medium text-sm text-gray-700 dark:text-black-300 left-align-label" for="start_date_time" :value="__('วันเริ่มกิจกรรม')">
                                วันเริ่มกิจกรรม
                            </label>
                            <input  class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full text-black"
                                    id="start_date_time"
                                    type="date"
                                    name="start_date_time" :value="old('start_date_time')"
                                    required
                                    autofocus
                                    autocomplete="date" />
                            <x-input-error :messages="$errors->get('start_date_time')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-middle mt-6">
                            <button id="closePopupButton" class="mr-auto btn">Close</button>
                            <button class="ml-auto btn" type="submit">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-list snipcss-pfK3z ml-20" id="movie-showing1">
        <div class="swiper-wrapper snipcss-nIoro style-3cjh3" id="style-3cjh3" style="display: flex; flex-wrap: wrap;">
            @foreach ($events as $event)
            <div class="swiper-slide swiper-slide-active style-5NyvU" id="style-5NyvU" style="flex: 0 0 33.33%; max-width: 33.33%;">
                <div class="ml-box">
                    <div class="mlb-cover adv_tic style-o54yx bg-[url('https://upload.wikimedia.org/wikipedia/commons/1/14/The_Event_2010_Intertitle.svg')]" id="style-o54yx">
                        <div class="mlbc-hover">
                            <div class="mlbc-name color-black">
                                {{ $event->title }}
                            </div>
                            <div class="mlbc-time">
                                <img src="https://www.majorcineplex.com/public/desktop_new_assets/img/icon-time.svg" class="mlbc-icon">
                                Start: {{ $event->start_date_time }}
                            </div>
                            <div class="mlbc-time">
                                <img src="https://www.majorcineplex.com/public/desktop_new_assets/img/icon-time.svg" class="mlbc-icon">
                                End :{{ $event->end_date_time }}
                            </div>
                            <div class="mlbc-time pt-5">
                                Description :
                                {{ $event->description }}
                            </div>
                            <div class="mlbc-btn">
                                <a href="{{ route("events.show", ["event" => $event]) }}" class="mlbc-btn-mi">
                                    ดูเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mlb-date">
                        {{ $event->title }}
                    </div>
                    <div class="mlb-name">
                        <a href="{{ route("events.show", ["event" => $event]) }}" style="color: grey;">
                            Start: {{ $event->start_date_time }}
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next mr-5" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
            <img src="https://www.majorcineplex.com/public/desktop_new_assets/img/icon-arrow-right.svg" class="icon-arrow-slider">
          </div>
          <div class="swiper-button-prev mr-5" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"><img src="https://www.majorcineplex.com/public/desktop_new_assets/img/icon-arrow-left.svg" class="icon-arrow-slider">
                                      </div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true">
          </span>
        </div>
    </div>




    <script>
        const popupButton = document.getElementById('popupButton');
        const popupModal = document.getElementById('popupModal');
        const closePopupButton = document.getElementById('closePopupButton');

        popupButton.addEventListener('click', function() {
            popupModal.classList.remove('hidden');
        });

        closePopupButton.addEventListener('click', function() {
            popupModal.classList.add('hidden');
        });

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto', // Display as many slides as fit on the screen
        spaceBetween: 20, // Adjust this value to control the gap between slides
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    </script>
@endsection
