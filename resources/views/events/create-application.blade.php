@extends('layouts.main')

@section('content')
    <div class="relative h-[680px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
        <div class="flex items-center justify-center h-full">
            <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
                <div class="waviy mb-10">
                    <span style="--i:1; color: #000000;">E</span>
                    <span style="--i:2; color: #000000;">v</span>
                    <span style="--i:3; color: #000000;">e</span>
                    <span style="--i:4; color: #000000;">n</span>
                    <span style="--i:5; color: #000000;">t</span>
                    <span style="--i:6;">&nbsp;</span>
                    <span style="--i:6;">&nbsp;</span>
                    <span style="--i:6; color: #000000;">R</span>
                    <span style="--i:7; color: #000000;">e</span>
                    <span style="--i:8; color: #000000;">g</span>
                    <span style="--i:9; color: #000000;">i</span>
                    <span style="--i:10; color: #000000;">s</span>
                    <span style="--i:11; color: #000000;">t</span>
                    <span style="--i:12; color: #000000;">e</span>
                    <span style="--i:13; color: #000000;">r</span>
                </div>
                    <div class="mb-5">
                        <label for="name" class="block mb-3 font-bold text-blue-600">ชื่อกิจกรรม:</label>
                        <span style="color: black;">{{ $event->title }}</span>
                    </div>
                <form method="GET" action="{{ route('events.applications.store', ['event' => $event]) }}">
                    <div class="mb-5">
                        <label for="video_url" class="block mb-2 font-bold text-green-600">ลิงก์วิดีโอแนะนำตัวของคุณ:</label>
                        @error('video_url') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <input style="color: black;" type="video_url" id="video_url" name="video_url" autocomplete="off"
                            value="{{ old('video_url','')}}"
                           placeholder="URL link" class="border border-gray-300 @error('video_url') border-red-400 @enderror shadow p-3 w-full rounded mb-2">
                    </div>
                    <div class="mb-5">
                        <label for="message" class="block mb-2 font-bold text-red-600">ข้อความถึงผู้จัดกิจกรรม:</label>
                        @error('message') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <input style="color: black;" type="text" id="message" name="message" autocomplete="off"
                            value="{{ old('message','')}}"
                           placeholder="Details" class="border border-gray-300 @error('message') border-red-400 @enderror shadow p-3 w-full rounded mb-2">
                    </div>
                    <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

