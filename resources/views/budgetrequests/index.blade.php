@extends('layouts.main')

@section('content')
<div class="relative h-[680px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
    <div class="container mx-auto px-40 ">
        @if (Auth::user()->role === 'ACCOUNTANT')
        <h2 class="mt-32 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl text-white">
            กิจกรรมที่รอการอนุมัติงบประมาณ
        </h2>
        @else
            <h2 class="mt-32 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl text-white">
                สถานะกิจกรรมที่ขออนุมัติงบประมาณ
            </h2>
        @endif
    </div>
</div>

<div class="block shadow-black/20 backdrop-blur-[30px] -mt-[430px] bg-white rounded-md overflow-hidden w-11/12 mx-auto mb-16">
    <ul class="divide-y divide-gray-200">

        {{-- No Event --}}
        @if (count($budgetrequests) === 0)
            <div class="flex items-center justify-center py-4 px-6">
                <img class="w-1/6" src="https://static.vecteezy.com/system/resources/previews/003/067/848/original/cartoon-sad-smile-face-emoticon-icon-in-flat-style-free-vector.jpg" alt="Sad face">
                <p class="text-3xl font-medium text-gray-800">ยังไม่มีกิจกรรมที่ขออนุมัติงบประมาณ</p>
            </div>
        @endif

        @foreach ($budgetrequests as $budgetrequest)

            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-800">{{ $budgetrequest->event->title }}</h3>
                    @if ($budgetrequest->event->budget === null)
                        <p class="text-gray-600 text-base mt-4">{{ "ยังไม่ได้กำหนดงบประมาณ" }}</p>
                    @else
                        <p class="text-gray-600 text-base mt-4">
                            งบประมาณขอเบิก ทั้งหมด: {{$budgetrequest->event->budget}} บาท
                        </p>
                    @endif
                </div>
                <span class="text-gray-400">
                    <button class="bg-gray-300 px-4 py-2 rounded" style="{{ $budgetrequest->getStatusTextColor() }}"> {{ $budgetrequest->getStatusMessage() }} </button>
                    @if (Auth::user()->role === "ACCOUNTANT")
                        <a href="/events/{{ $budgetrequest->event->id }}" class="bg-blue-500 hover:bg-green-700 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                            คลิกที่นี่ เพื่อดูรายละเอียดเพิ่มเติ่ม และตัดสินใจ
                        </a>
                    @endif
                </span>
            </li>

        @endforeach

    </ul>
</div>
@endsection
