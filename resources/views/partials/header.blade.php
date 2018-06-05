<nav class="flex items-center justify-between flex-wrap bg-red p-6">
    <div class="flex items-center flex-no-shrink text-white mr-6">
        <a class="font-semibold text-2xl font-title capitalize text-white tracking-wide uppercase no-underline" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-red-lighter border-red-light hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div class="w-full block lg:flex lg:items-center lg:w-auto">
        @auth
            <div class="text-sm lg:flex-grow">
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-red-lighter hover:text-white mr-4">
                    Docs
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-red-lighter hover:text-white mr-4">
                    Examples
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-red-lighter hover:text-white">
                    Blog
                </a>
            </div>
        @else
            <div class="flex flex-wrap -mx-3 mb-2">
                {{-- <div class="relative mr-2">
                    <select class="inline-block appearance-none rounded bg-orange-dark text-white py-1 px-4 pr-8 hover:text-orange-dark hover:bg-white" id="grid-state">
                        <option>New Mexico</option>
                        <option class="hover:bg-white">Missouri</option>
                        <option>Texas</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div> --}}
                {{--
                @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    --}}
                <a href="{{ route('login') }}" class="mr-2 inline-block text-sm px-4 py-2 leading-none border text-white border-white no-underline hover:border-transparent hover:text-orange-dark hover:bg-white mt-4 lg:mt-0">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border text-white border-white no-underline rounded hover:border-transparent hover:text-orange-dark hover:bg-white mt-4 lg:mt-0">{{ __('Register') }}</a>
                {{-- <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0">Download</a> --}}
            </div>
        @endauth
    </div>
</nav>
