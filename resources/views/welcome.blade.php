@extends('layouts.main')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-no-repeat bg-[50%] bg-[url('https://wallpapercrafter.com/th800/223750-planning-your-work.jpg')] h-[800px]">
        <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.5)] bg-fixed">
            <div class="flex h-full items-center justify-left">
                <div class="max-w-[800px] px-6 py-6 text-left text-white md:py-0 md:px-12">
                    <h2 class="mb-8 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                        Beats Event
                    </h2>
                    <p class="text-xl mb-16">insert ข้อความสุดน่าประทับใจ here</p>
                    <a href="{{ route('events.index') }}"
                       class="text-white text-xl bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-900 font-medium rounded-3xl text-sm px-9 lg:px-10 py-3 lg:py-3.5 sm:mr-2 lg:mr-0 focus:outline-none">
                        ไปที่กิจกรรม
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
