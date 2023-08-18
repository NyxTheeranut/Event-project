<nav class="bg-white border-gray-200 py-2.5">
    <div class="flex flex-wrap items-center justify-between max-w-screen-2xl px-4 mx-auto">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="data:image/png;base64,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"
                 class="-rotate-90 h-6 mr-3 sm:h-9" alt="Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap">Beats Event</span>
        </a>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span></span>
            </div>

            <div class="flex items-center">

                @if(Auth::check())
{{--                    <div class="mx-4 font-semibold">--}}
{{--                        {{ Auth::user()->name }}--}}
{{--                    </div>--}}
{{--                    <div class="mx-4 font-semibold">--}}

{{--                        <form action="{{ route('logout') }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <button type="submit">--}}
{{--                                Logout--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}

                @else
                    <div class="mx-4 font-semibold">
{{--                        <a href="{{ route('login') }}">--}}
                            เข้าสู่ระบบ
{{--                        </a>--}}
                    </div>
                    <div class="mx-4 font-semibold">
{{--                        <a href="{{ route('register') }}">--}}
                            สมัคร
{{--                        </a>--}}
                    </div>

                @endif
            </div>

            <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="mobile-menu-2" aria-expanded="true">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-semibold lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ url('/') }}"
                       class="nav-menu {{ request()->is('/') ? 'active hover-button' : 'hover-button' }}">
                        หน้าหลัก
                    </a>
                </li>
                <li>
                    <a href="{{ route('events.index') }}"
                       class="nav-menu {{ Route::currentRouteName() === 'events.index' ? 'active hover-button' : 'hover-button' }}">
                        กิจกรรม
                    </a>
                </li>
                <li>
                    <a href="{{ route('about.index') }}"
                       class="nav-menu {{ Route::currentRouteName() === 'about.index' ? 'active hover-button' : 'hover-button' }}">
                        เกี่ยวกับเรา
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
