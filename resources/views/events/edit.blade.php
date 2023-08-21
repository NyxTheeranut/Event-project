@extends('layouts.main')

@section('content')
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
                        <input type="text" id="textbox1" name="textbox1" autocomplete="off"
                            value="{{ old('title','')}}"
                            placeholder="ชื่อกิจกรรมใหม่..." class="border border-gray-300 @error('textbox1') border-red-400 @enderror shadow p-3 w-full rounded mb-2" style="height: 40px; width: 100%;">
                    </div>
                    <div class="mb-2">
                        <label for="description" class="block mb-2 font-bold text-blue-600">คำอธิบายกิจกรรม:</label>
                        @error('description') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <textarea id="description" name="description" autocomplete="off"
                                placeholder="คำอธิบายกิจกรรมใหม่..." class="border border-gray-300 @error('description') border-red-400 @enderror shadow p-3 w-full rounded mb-2" style="height: 120px; width: 100%;">{{ old('description','') }}</textarea>
                    </div>
                    <div class="mt-4">
                        <label class="block font-bold text-blue-600 dark:text-black-300 left-align-label" for="start_date_time" :value="__('วันเริ่มกิจกรรม')">
                            วันเริ่มกิจกรรม:
                        </label>
                        <input class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full text-black"
                           id="start_date_time"
                           type="date"
                           name="start_date_time" :value="old('start_date_time')"
                           required
                           autofocus
                           autocomplete="date" />
                        <x-input-error :messages="$errors->get('start_date_time')" class="mt-2" />
                    </div>
                </div>
                <!-- (right side) -->
                <div class="w-1/2 pl-6 border-l">
                    <div class="mb-2" style = "margin-top:3.6rem;">
                        <label for="title" class="block mb-2 font-bold text-blue-600">งบจัดกิจกรรม:</label>
                        @error('title') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <input type="text" id="textbox2" name="textbox2" autocomplete="off"
                            value="{{ old('title','')}}"
                            placeholder="งบจัดกิจกรรมใหม่..." class="border border-gray-300 @error('textbox1') border-red-400 @enderror shadow p-3 w-full rounded mb-2" style="height: 40px; width: 100%;">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600">รายชื่อผู้จัดทำกิจกรรม:</label>
                    </div>
                    <!-- loop ($staffs as $staff)

                /* staffs */

                -->
                    <button type="submit" class="block bg-blue-500 text-white font-bold p-4 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700"
                    >Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

