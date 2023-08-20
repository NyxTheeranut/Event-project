@extends('layouts.main')

@section('content')
    <div class="relative h-[680px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
        <div class="flex items-center justify-center h-full">
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2 flex">
                <!-- mew and smart(left side) -->
                <div class="w-1/2 pr-6">
                    <div class="typingTextEvent mb-5">
                        Event Details.
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600">Event Name:</label>
                        <span class="font-normal text-black-600">{{ $event->title }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600">Description:</label>
                        <span class="font-normal text-black-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600">Start:</label>
                        <span class="font-normal text-black-600">{{ $event->start_date_time }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600">End:</label>
                        <span class="font-normal text-black-600">{{ $event->end_date_time }}</span>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="block bg-blue-500 text-white font-bold p-4 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700">Apply</button>
                    </div>
                </div>
                <!-- smart (right side) -->
                <div class="w-1/2 pl-6 border-l">
                    <div class="mb-3"style="margin-top: 3.6rem;">
                        <label for="name" class="block font-bold text-blue-600">Budget:</label>
                        <span class="font-normal text-black-600">1000 baht</span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="block font-bold text-blue-600">Staff List:</label>
                    </div>
                <!-- loop ($staffs as $staff)
                
                /* staffs */

                -->
                </div>
            </div>
        </div>
    </div>
@endsection
