@extends('layouts.main')

@section('content')
<div class="relative h-[680px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
    <div class="container mx-auto px-40 ">
        <h2 class="mt-32 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl text-white">
            กิจกรรมที่รองบประมาณ
        </h2>
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
{{--            <form id="rejectPopupModal" method="POST" action="{{ route('budgetrequest.update', $budgetrequest) }}">--}}
{{--                <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">--}}
{{--                    <div class="bg-white rounded-lg p-8">--}}
{{--                        @csrf--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <input type="hidden" id="status" name="status" value="REJECTED">--}}
{{--                            <input type="hidden" id="budgetrequest_id" name="budgetrequest_id" value="{{ $budgetrequest }}">--}}
{{--                            <label id="rejectText" class="block font-medium text-sm text-black-700 dark:text-black-300" for="reason" :value="__('เหตุผลการปฏิเสธ')">--}}
{{--                                เหตุผลของการปฏิเสธ--}}
{{--                            </label>--}}
{{--                            <div class="mt-1">--}}
{{--                                <input class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block w-full"--}}
{{--                                       style="max-width: 350px;"--}}
{{--                                       id="reason"--}}
{{--                                       type="text"--}}
{{--                                       name="reason" :value="old('reason')"--}}
{{--                                       autofocus--}}
{{--                                       autocomplete="reason" />--}}
{{--                            </div>--}}
{{--                            <x-input-error :messages="$errors->get('reason')" class="mt-2" />--}}
{{--                        </div>--}}
{{--                        <div class="flex items-center justify-between mt-4">--}}
{{--                            <button id="closeRejectPopupButton" class="btn">Close</button>--}}
{{--                            <button class="btn">--}}
{{--                                {{ __('Submit') }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

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
                    <a href="/events/{{ $budgetrequest->event->id }}" class="bg-blue-500 hover:bg-green-700 text-white px-4 py-2 rounded transition duration-300 ease-in-out">คลิกที่นี่ เพื่อดูรายละเอียดเพิ่มเติ่ม และตัดสินใจ</a>
                </span>
            </li>

        @endforeach

    </ul>
</div>
@endsection
