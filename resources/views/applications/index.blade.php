@extends('layouts.main')

@section('content')
<div class="relative h-[680px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
    <div class="container mx-auto px-40 ">
        <h2 class="mt-32 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl text-white">
            กิจกรรมที่ลงทะเบียน
        </h2>
    </div>
</div>



<div class="block shadow-black/20 backdrop-blur-[30px] -mt-[230px] bg-white rounded-md overflow-hidden w-11/12 mx-auto mb-16">
    <ul class="divide-y divide-gray-200">

        {{-- No Application --}}
        @if (count($applications->where('user_id', Auth::user()->id)) === 0)
            <div class="flex items-center justify-center py-4 px-6">
                <img class="w-1/6" src="https://static.vecteezy.com/system/resources/previews/003/067/848/original/cartoon-sad-smile-face-emoticon-icon-in-flat-style-free-vector.jpg" alt="Sad face">
                <p class="text-3xl font-medium text-gray-800">คุณยังไม่ได้ส่งใบสมัครกิจกรรมใดๆ เลย</p>
            </div>
            <div class="flex items-center justify-center py-4 px-6">
                <p class="text-2xl font-medium text-gray-800 mt-4">หากการสมัครเข้าร่วมกิจกรรม คุณสามารถดูกิจกรรมที่สนใจได้ที่หน้า</p>
                <p class="text-2xl font-medium text-gray-800 mt-4">-></p>
                <a href="{{ route('events.index') }}" class="text-2xl font-medium text-blue-600 hover:underline">[กิจกรรม]</a>
            </div>
        @endif

        @foreach ($applications->where('user_id', Auth::user()->id) as $application)

            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-800">{{ $events->find($application->event_id)->title }}</h3>
                    @if ($application->status === 'PENDING')
                        <p class="text-gray-600 text-base">กำลังรอการตอบรับ</p>
                    @elseif ($application->status === 'APPROVED')
                        <p class="text-gray-600 text-base">ยินดีด้วย! คุณถูกคัดเลือกเข้ากิจกรรมแล้ว</p>
                    @elseif ($application->status === "REJECTED")
                        <p class="text-gray-600 text-base">ถูกปฏิเสธ</p>
                    @endif
                </div>

                <span class="text-gray-400">{{ $events->find($application->event_id)->getDurationToStringAttribute() }}</span>

            </li>

        @endforeach

    </ul>
</div>
@endsection
