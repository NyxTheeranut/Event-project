@extends('layouts.main')

@section('content')
    @inject('Application', 'App\Models\Application')
    <div class="relative h-[570px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
        <div class="flex items-center justify-center h-full">
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2 flex">
                <!-- mew and smart(left side) -->
                <div class="w-1/2 pr-6">
                    <div class="typingTextEvent mb-2" style="color: black;">
                        Event Details.
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600" style="color: black;">ชื่อกิจกรรม:</label>
                        <span class="font-normal text-black-600" style="color: black;">{{ $event->title }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600" style="color: black;">คำอธิบายกิจกรรม:</label>
                        <span class="font-normal text-black-600" style="color: black;">{{ $event->description }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600" style="color: black;">วันที่จัดกิจกรรม:</label>
                        <span class="font-normal text-black-600" style="color: black;">{{ $event->start_date_time }}</span>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="name" class="block font-bold text-blue-600">วันสิ้นสุดกิจกรรม:</label>--}}
{{--                        <span class="font-normal text-black-600">{{ $event->end_date_time }}</span>--}}
{{--                    </div>--}}

                    @if (Auth::check())
                        @if(Auth::user()->role === "MEMBER")
                    <div class="mt-3">
                        @if ($applications->find(Auth::user()->id))
                            <button type="submit" class="btn hover:bg-red-500">
                                คุณสมัครกิจกรรมนี้ไปแล้ว
                            </button>
                        @else
                        <form method="GET" action="{{ route('events.applications.create', ['event' => $event]) }}">
                            <button type="submit" class="btn">
                                สมัคร
                            </button>
                        </form>
                        @endif
                    </div>
                    </div>
                @else
                    <div class="mt-3">

                    </div>
            </div>
                @endif
                @if (Auth::user()->role === "MEMBER")
                    <!-- smart (right side) -->
                            <div class="w-1/2 pl-6 border-l">
                                <div class="mb-3"style="margin-top: 3.6rem;">
                                    <label for="name" class="block font-bold text-blue-600"></label>
                                    <span class="font-normal text-black-600"></span>
                                </div>
                        @else
                    <div class="w-1/2 pl-6 border-l">
                        <div class="mb-3"style="margin-top: 3.6rem;">
                            <label for="name" class="block font-bold text-blue-600" style="color: black;">งบจัดกิจกรรม:</label>
                            <span class="font-normal text-black-600" style="color: black;">{{ $event->budget }}</span>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="name" class="block font-bold text-blue-600">ผู้จัดทำกิจกรรม:</label>
                            <a href="{{ route('profile.show', ['user'=>$event->user]) }}">
                                <span class="font-normal text-black-600">{{ $event->user->nickname }}</span>
                            </a>
                        </div>
                        @endif
                    <!-- loop ($staffs as $staff)

                    /* staffs */

                    -->
                    @if (Auth::check())
                        @if (Auth::user()->role === 'STAFF')
                    <div class="flex justify-left mt-8">

                        <a href="{{ route('kanban-board.index', ['event' => $event]) }}" class="btn mr-2">
                            วางแผน
                        </a>

                        <a href="{{ route('events.edit', ['event' => $event]) }}" class="btn">
                            แก้ไข
                        </a>

                    </div>

                    <div class="flex justify-between mt-2">
                        <a href="{{ route('event.applier', ['event' => $event]) }}" class="btn">
                            ผู้ที่สมัครกิจกรรม
                        </a>
                    </div>

                    <div class="flex justify-between mt-2">
                        <a href="{{ route('event.applier', ['event' => $event]) }}" class="btn">
                            ยื่นเรื่องของอนุมัติงบประมาณ
                        </a>

                    </div>
                        @endif

                        @if (Auth::user()->role === "ACCOUNTANT")

                    <div class="flex justify-between mt-1">

                        <a id="acceptPopupButton"  class="bg-green-500 hover:bg-green-700 mr-1 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                            อนุมัติกิจกรรมนี้
                        </a>

                        <button id="rejectPopupButton" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                            ไม่อนุมัติกิจกรรมนี้
                        </button>
                    </div>
                    <div class="flex justify-right mt-5">
                        <a href="{{ route('budgetrequests.index') }}" class="bg-blue-500 hover:bg-blue-700 mr-1 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
                            กลับ
                        </a>
                    </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- accept popup -->
    <form method="GET" action="{{ route('budgetrequest.update') }}">
        <div id="acceptPopupModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg p-8">
                @csrf
                <div class="flex flex-col">
                    <input hidden
                           id="event"
                           type="text"
                           name="event"
                           value="{{ $event->id }}"/>
                    @php
                        $status = "APPROVED";
                    @endphp
                    <input hidden
                           id="status"
                           type="text"
                           name="status"
                           value="{{ $status }}"/>
                    <label id="rejectText" class="block font-medium text-sm text-black-700 dark:text-black-300" style="color: black;" for="reason" :value="__('เหตุผลการปฏิเสธ')">
                        เหตุผลที่อนุมัติกิจกรรมนี้
                    </label>
                    <div class="mt-1">
                        <input class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block w-full"
                        style="max-width: 350px; color: black;"
                               id="reason"
                               type="text"
                               name="reason" :value="old('reason')"
                               autofocus
                               autocomplete="reason"
                               required/>
                    </div>
                    <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between mt-4">
                    <button id="closeAcceptPopupButton" class="btn" type="button">Close</button>
                    <button class="btn" type="submit">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- reject popup -->
    <form method="GET" action="{{ route('budgetrequest.update') }}">
        <div id="rejectPopupModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg p-8">
                @csrf
                <div class="flex flex-col">
                    <input hidden
                           id="event"
                           type="text"
                           name="event"
                           value="{{ $event->id }}"/>
                    @php
                        $status = "REJECTED";
                    @endphp
                    <input hidden
                           id="status"
                           type="text"
                           name="status"
                           value="{{ $status }}"/>
                    <label id="rejectText" class="block font-medium text-sm text-black-700 dark:text-black-300" style="color: black;" for="reason" :value="__('เหตุผลการปฏิเสธ')">
                        เหตุผลที่ไม่อนุมัติกิจกรรมนี้
                    </label>
                    <div class="mt-1">
                        <input class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block w-full"
                               style="max-width: 350px; color: black;"
                               id="reason"
                               type="text"
                               name="reason" :value="old('reason')"
                               autofocus
                               autocomplete="reason"
                               required
                                />
                    </div>
                    <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between mt-4">
                    <button id="closeRejectPopupButton" class="btn" type="button">Close</button>
                    <button class="btn" type="submit">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script>
        const rejectPopupButton = document.getElementById('rejectPopupButton');
        const rejectPopupModal = document.getElementById('rejectPopupModal');
        const closeRejectPopupButton = document.getElementById('closeRejectPopupButton');
        const acceptPopupButton = document.getElementById('acceptPopupButton');
        const acceptPopupModal = document.getElementById('acceptPopupModal');
        const closeAcceptPopupButton = document.getElementById('closeAcceptPopupButton');

        rejectPopupButton.addEventListener('click', function() {
            rejectPopupModal.classList.remove('hidden');
        });

        closeRejectPopupButton.addEventListener('click', function() {
            rejectPopupModal.classList.add('hidden');
        });

        acceptPopupButton.addEventListener('click', function() {
            acceptPopupModal.classList.remove('hidden');
        });

        closeAcceptPopupButton.addEventListener('click', function() {
            acceptPopupModal.classList.add('hidden');
        });
    </script>
@endsection
