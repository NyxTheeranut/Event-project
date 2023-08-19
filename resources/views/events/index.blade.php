@extends('layouts.main')

@section('content')
    {{-- Heading Image --}}
    <div class="relative h-[570px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('https://images.pexels.com/photos/2747449/pexels-photo-2747449.jpeg?cs=srgb&dl=pexels-wolfgang-2747449.jpg&fm=jpg')]">
        <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.5)] bg-fixed">
            <div class="flex h-full items-center justify-left">
                <div class="max-w-[800px] px-6 py-6 text-left text-white md:py-0 md:px-16">

                    <h2 class="mb-8 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-7xl">
                        กิจกรรม
                    </h2>

                    <!-- Event Create (Auth coming soon) -->
                    <a id="popupButton" class="inline-block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 focus:outline-none no-select">
                        สร้างกิจกรรม
                    </a>

                    <!-- Popup Modal (Hidden by default) -->
                    <div id="popupModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-lg p-8">
                            <div class="container mx-auto px-40">
                                <h2 class="mt-12 mb-12 text-5xl font-bold leading-tight tracking-tight md:text-6xl xl:text-5xl text-gray-800">
                                    Create Event Page


                                    <!--ใส่เนื้อหา Create Events-->


                                </h2>
                            </div>
                            <button id="closePopupButton" class="mt-4 bg-gray-300 hover:bg-gray-400 px-3 py-2 rounded-lg">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Event List --}}
    <div class="block shadow-black/20 backdrop-blur-[30px] -mt-[130px] bg-white rounded-md overflow-hidden w-11/12 mx-auto mb-16">
        <ul class="divide-y divide-gray-200">

            {{-- No Event --}}
           @if (count($events) === 0)
                <div class="flex items-center justify-center py-4 px-6">
                    <img class="w-1/6" src="https://static.vecteezy.com/system/resources/previews/003/067/848/original/cartoon-sad-smile-face-emoticon-icon-in-flat-style-free-vector.jpg" alt="Sad face">
                    <p class="text-3xl font-medium text-gray-800">404 Event Not Found</p>
                </div>
            @endif

            @foreach ($events as $event)
                <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                    <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-800">{{ $event->name }}</h3>
                        <p class="text-gray-600 text-base">{{ $event->date }}</p>
                    </div>
                    <span class="text-gray-400">{{ $event->duration }}</span>
                </li>
            @endforeach

        </ul>
    </div>
    <script>
        const popupButton = document.getElementById('popupButton');
        const popupModal = document.getElementById('popupModal');
        const closePopupButton = document.getElementById('closePopupButton');
    
        popupButton.addEventListener('click', function() {
            popupModal.classList.remove('hidden');
        });
    
        closePopupButton.addEventListener('click', function() {
            popupModal.classList.add('hidden');
        });
    </script>
@endsection
