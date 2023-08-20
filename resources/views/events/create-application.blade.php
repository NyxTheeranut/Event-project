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
                        <label for="name" class="block mb-3 font-bold text-blue-600">Event Name</label>
                        <span>{{ $event->title }}</span>
                    </div>
                    <div class="mb-5">
                        <label for="title" class="block mb-2 font-bold text-green-600">URL</label>
                        @error('title') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <input required type="text" id="textbox1" name="textbox1" autocomplete="off"
                            value="{{ old('title','')}}"
                           placeholder="URL link" class="border border-gray-300 @error('textbox1') border-red-400 @enderror shadow p-3 w-full rounded mb-2">
                    </div>
                    <div class="mb-5">
                        <label for="title" class="block mb-2 font-bold text-red-600">Feedback</label>
                        @error('title') <div class="text-red-600 text-sm">{{$message}}</div> @enderror
                        <input required type="text" id="textbox2" name="textbox2" autocomplete="off"
                            value="{{ old('title','')}}"
                           placeholder="Details" class="border border-gray-300 @error('textbox2') border-red-400 @enderror shadow p-3 w-full rounded mb-2">
                    </div>
                    <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700">Submit</button>
            </div>
        </div>
    </div>
@endsection

