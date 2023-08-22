@extends('layouts.main')

@section('content')

    <form action="{{ route('events.update', ['event' => $event]) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="relative h-[680px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
        <div class="flex items-center justify-center h-full">
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2 flex">
                <!-- (left side) -->
                <div class="w-1/2 pr-6">
                    <div class="typingTextEvent2 mb-2">
                        Event Edit.
                    </div>
                    <div class="mb-2">
                        <label for="title" class="block mb-2 font-bold text-blue-600">ชื่อกิจกรรม:</label>
                        @error('title') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <input type="text" id="name" name="title" autocomplete="off"
                            value="{{ old('title', $event->title) }}"
                            placeholder="ชื่อกิจกรรม" class="border border-gray-300 @error('textbox1') border-red-400 @enderror shadow p-3 w-full rounded mb-2" style="height: 40px; width: 100%;">
                    </div>
                    <div class="mb-2">
                        <label for="description" class="block mb-2 font-bold text-blue-600">คำอธิบายกิจกรรม:</label>
                        @error('description') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <input id="description" name="description" autocomplete="off"
                                placeholder="คำอธิบายกิจกรรม"
                                   value="{{ old('description', $event->description) }}"

                                  class="border border-gray-300 @error('description') border-red-400 @enderror shadow p-3 w-full rounded mb-2" style="height: 120px; width: 100%;">{{ old('description','') }}</input>
                    </div>
                    <div class="mt-4">
                        <label  class="block font-medium text-sm text-gray-700 dark:text-black-300 left-align-label" for="birthdate" :value="__('วันเกิด')">
                            วันเริ่มกิจกรรม
                        </label>
                        <input  class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full text-black"
                                id="name"
                                type="date"
                                name="start_date_time" :value="old('start_date_time')"
                                value="{{ $event->start_date_time }}"
                                autofocus
                                autocomplete="date" />
                        <x-input-error :messages="$errors->get('start_date_time')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="end_date_time" class="block font-bold text-blue-600 dark:text-black-300 left-align-label" for="start_date_time" :value="__('วันเริ่มกิจกรรม')">
                            วันจบกิจกรรม:
                        </label>
                        <input class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full text-black"
                               id="end_date_time"
                               type="date"
                               name="end_date_time"
                               value="{{ old('end_date_time', $event->end_date_time) }}"
                               required
                               autofocus
                               autocomplete="date" />
                        <x-input-error :messages="$errors->get('end_date_time')" class="mt-2" />
                    </div>
                </div>
                <!-- (right side) -->
                <div class="w-1/2 pl-6 border-l">
                    <div class="mb-2" style = "margin-top:3.6rem;">
                        <label for="title" class="block mb-2 font-bold text-blue-600">งบจัดกิจกรรม:</label>
                        @error('budget') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                        <input type="text" id="name" name="budget" autocomplete="off"
                            value="{{ old('budget', $event->budget)}}"
                            placeholder="งบจัดกิจกรรมใหม่..."
                               class="border border-gray-300 @error('textbox1') border-red-400 @enderror shadow p-3 w-full rounded mb-2"
                               style="height: 40px; width: 100%;" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600">รายชื่อผู้จัดทำกิจกรรม:</label>
                    </div>
                    <!-- loop ($staffs as $staff)

                /* staffs */

                -->
                    <div class="flex justify-between mt-8">
                        <button type="submit" class="btn">Submit</button>
                        <button type="submit" class="btn">
                            ผู้ที่สมัครกิจกรรม
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </form>
@endsection

