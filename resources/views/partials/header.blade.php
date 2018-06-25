<nav class="flex items-center justify-between flex-wrap bg-grey-darkest p-3 mb-8 shadow">
    <div class="flex items-center flex-no-shrink text-white mr-6">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
        <span class="text-xl tracking-wide">
            <a href="{{ url('/') }}" class="no-underline text-teal-lighter hover:text-white">
                {{ config('app.name', 'Laravel') }}
            </a>
        </span>
    </div>
    <div class="block sm:hidden">
        <button @click="toggle" class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div>
        <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="text-sm sm:flex-grow mr-4 flex items-center">
                @guest
                    <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ url('/login') }}">Login</a>
                    <a class="no-underline hover:underline text-grey-darker text-sm" href="{{ url('/register') }}">Register</a>
                @else
                    <a href="#responsive-header" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-yellow-dark hover:text-white mr-4">
                        Examples
                    </a>
                    <a href="home" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-teal-lighter hover:text-white mr-4">
                        Home
                    </a>
                    <a href="home" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-teal-lighter hover:text-white mr-4">
                        Comunicados
                    </a>
                    <a href="#responsive-header" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-teal-lighter hover:text-white mr-8">
                        Blog
                    </a>

                    {{--  a new button dropdown start  --}}

                    <div class="flex items-center">
                        <img class="w-8 h-8 rounded-full -mr-3" src="/uploads/avatars/{{ Auth::user()->avatar }}">
                        <div class="block sm:inline-block py-4 px-4 cursor-pointer text-teal-lighter relative flex justify-between dropdown">
                            {{ Auth::user()->name }}
                            &nbsp;<i class="fa fa-chevron-down fa-sm text-teal font-hairline"></i>
                            <div class="hidden absolute w-full pin-l sm:pin-r mt-8 sm:mt-4 z-30 bg-grey-darkest dropdown-content">
                                <div class="border-b border-grey">
                                    <a href="profile" class="block px-4 py-3 hover:text-white no-underline text-teal-lighter">
                                        <i class="fa fa-user fa-sm"></i>&nbsp;
                                        Your Profile
                                    </a>
                                </div>
                                <div class="bg-red">
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-red-dark no-underline text-white"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-sm"></i>&nbsp;
                                        Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  a new button dropdown end  --}}

                @endguest
            </div>
        </div>
    </div>
</nav>
