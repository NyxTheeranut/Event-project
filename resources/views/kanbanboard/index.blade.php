@extends('layouts.main')

@section('content')
    <!-- Header -->
    <div class="px-10 mt-6">
        <h1 class="text-2xl font-bold text-align-center">Kanban Board</h1>
    </div>

    <!-- The Board -->
    <div class="flex flex-grow px-10 mt-4 space-x-6 overflow-auto justify-center">

        <!-- Planning Work List -->
        <div class="flex flex-col flex-shrink-0 w-72">
            <div class="flex items-center flex-shrink-0 h-10 px-2">
                <span class="block text-sm font-semibold text-blue-500">กำลังวางแผน</span>
                <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">
                    {{ $planning->count() }}
                </span>
                    <a id="addPlanPopupButton" class="flex items-center justify-center w-6 h-6 ml-auto text-indigo-500 rounded hover:bg-indigo-500 hover:text-indigo-100">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </a>
                    <div id="addPlanPopupModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-lg p-8">
                            <form method="GET" action="{{ route('kanban-board.create') }}">
                                @csrf
                            <div class="flex flex-col justify-center">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <label id="rejectText" class="block font-medium text-sm text-black-700 dark:text-black-300">
                                    วางแผน
                                </label>
                                <label class="block font-medium text-sm text-black-700 dark:text-black-300" for="title" :value="__('เรื่อง')">
                                    เรื่อง
                                </label>
                                <div class="mt-1">
                                    <input class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block w-full"
                                        style="max-width: 350px;"
                                        id="title"
                                        type="text"
                                        name="title" :value="old('title')"
                                        autofocus
                                        autocomplete="title" />
                                </div>
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <label class="block font-medium text-sm text-black-700 dark:text-black-300" for="description" :value="__('คำอธิบาย')">
                                    คำอธิบาย
                            </label>
                            <div class="mt-1">
                                <input class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block w-full"
                                    style="max-width: 350px;"
                                    id="description"
                                    type="text"
                                    name="description" :value="old('description')"
                                    autofocus
                                    autocomplete="description" />
                            </div>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            <div class="flex items-center justify-between mt-4">
                                <button id="closeAddPlanPopupButton" class="mr-10 btn">Close</button>
                                <button class="ml-10 btn">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="flex flex-col pb-2 overflow-auto">
                @foreach($planning as $work)
                    <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100" draggable="false">
                        <span class="flex items-center h-6 px-3 text-xs font-semibold text-blue-500 bg-blue-100 rounded-full">{{ $work->title }}</span>
                        <h4 class="mt-3 text-sm font-medium">{{ $work->description }}</h4>
                        <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
                            <!-- Trash Button -->
                            <form action="{{ route('kanban-board.destroyWork', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <button type="submit" class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </form>
                            <!-- Right Button -->
                            <form action="{{ route('kanban-board.changeStatus', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <input type="hidden" name="new_status" value="{{ $work->numberToStatus($work->statusToNumber() + 1) }}">
                                <button type="submit" class="absolute top-0 right-7 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- In Progress Work List -->
        <div class="flex flex-col flex-shrink-0 w-72">
            <div class="flex items-center flex-shrink-0 h-10 px-2">
                <span class="block text-sm font-semibold text-pink-500">อยู่ระหว่างดำเนินการ</span>
                <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">
                    {{ $in_progress->count() }}
                </span>
            </div>
            <div class="flex flex-col pb-2 overflow-auto">
                @foreach($in_progress as $work)
                    <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100" draggable="false">
                        <span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full">{{ $work->title }}</span>
                        <h4 class="mt-3 text-sm font-medium">{{ $work->description }}</h4>
                        <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
                            <!-- Trash Button -->
                            <form action="{{ route('kanban-board.destroyWork', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <button type="submit" class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </form>
                            <!-- Right Button -->
                            <form action="{{ route('kanban-board.changeStatus', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <input type="hidden" name="new_status" value="{{ $work->numberToStatus($work->statusToNumber() + 1) }}">
                                <button type="submit" class="absolute top-0 right-7 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6"/>
                                    </svg>
                                </button>
                            </form>
                            <!-- Left Button -->
                            <form action="{{ route('kanban-board.changeStatus', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <input type="hidden" name="new_status" value="{{ $work->numberToStatus($work->statusToNumber() - 1) }}">
                                <button type="submit" class="absolute top-0 right-14 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 18l-6-6 6-6"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Reviewing Work List -->
        <div class="flex flex-col flex-shrink-0 w-72">
            <div class="flex items-center flex-shrink-0 h-10 px-2">
                <span class="block text-sm font-semibold text-orange-500">ตรวจสอบ</span>
                <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">
                    {{ $review->count() }}
                </span>
            </div>
            <div class="flex flex-col pb-2 overflow-auto">
                @foreach($review as $work)
                    <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100" draggable="false">
                        <span class="flex items-center h-6 px-3 text-xs font-semibold text-orange-500 bg-orange-100 rounded-full">{{ $work->title }}</span>
                        <h4 class="mt-3 text-sm font-medium">{{ $work->description }}</h4>
                        <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
                            <!-- Trash Button -->
                            <form action="{{ route('kanban-board.destroyWork', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="event" value="{{ $event }}">
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <button type="submit" class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </form>
                            <!-- Right Button -->
                            <form action="{{ route('kanban-board.changeStatus', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <input type="hidden" name="new_status" value="{{ $work->numberToStatus($work->statusToNumber() + 1) }}">
                                <button type="submit" class="absolute top-0 right-7 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6"/>
                                    </svg>
                                </button>
                            </form>
                            <!-- Left Button -->
                            <form action="{{ route('kanban-board.changeStatus', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <input type="hidden" name="new_status" value="{{ $work->numberToStatus($work->statusToNumber() - 1) }}">
                                <button type="submit" class="absolute top-0 right-14 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 18l-6-6 6-6"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Done Work List -->

        <div class="flex flex-col flex-shrink-0 w-72">
            <div class="flex items-center flex-shrink-0 h-10 px-2">
                <span class="block text-sm font-semibold text-green-500">เสร็จสิ้น</span>
                <span class="flex items-center justify-center w-5 h-5 ml-2 text-sm font-semibold text-indigo-500 bg-white rounded bg-opacity-30">
                    {{ $done->count() }}
                </span>
            </div>
            <div class="flex flex-col pb-2 overflow-auto">
                @foreach($done as $work)
                    <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100" draggable="false">
                        <span class="flex items-center h-6 px-3 text-xs font-semibold text-green-500 bg-green-100 rounded-full">{{ $work->title }}</span>
                        <h4 class="mt-3 text-sm font-medium">{{ $work->description }}</h4>
                        <div class="flex items-center w-full mt-3 text-xs font-medium text-gray-400">
                            <!-- Trash Button -->
                            <form action="{{ route('kanban-board.destroyWork', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="event" value="{{ $event }}">
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <button type="submit" class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </form>
                            <!-- Left Button -->
                            <form action="{{ route('kanban-board.changeStatus', ['event' => $event]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="work_id" value="{{ $work->id }}">
                                <input type="hidden" name="new_status" value="{{ $work->numberToStatus($work->statusToNumber() - 1) }}">
                                <button type="submit" class="absolute top-0 right-7 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 18l-6-6 6-6"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex-shrink-0 w-6"></div>

    </div>
    <script>
        const addPlanPopupButton = document.getElementById('addPlanPopupButton');
        const addPlanPopupModal = document.getElementById('addPlanPopupModal');
        const closeAddPlanPopupButton = document.getElementById('closeAddPlanPopupButton');

        addPlanPopupButton.addEventListener('click', function() {
        addPlanPopupModal.classList.remove('hidden');
        });

        closeAddPlanPopupButton.addEventListener('click', function() {
        addPlanPopupModal.classList.add('hidden');
        });
    </script>
@endsection
