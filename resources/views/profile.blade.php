@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <form class="w-full max-w-lg bg-white p-4" enctype="multipart/form-data" action="/profile" method="POST">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full flex px-3 mb-6 md:mb-0 justify-center">
                    <div class="md:flex md:items-center px-6 py-4">
                        <img class="block h-16 sm:h-24 rounded-full border-4 sm:border-2 border-grey mx-auto mb-4 md:mb-0 md:mr-4 md:ml-0" src="/uploads/avatars/{{ $user->avatar }}">
                        <div class="text-center sm:flex-grow">
                            <div>
                            {{--  <div>   class="mb-4"  --}}
                                <p class="sm:text-2xl md:text-4xl md:tracking-wide">{{ $user->name }}</p>
                                <p class="text-sm leading-tight text-grey-dark">Developer at NothingWorks Inc.</p>
                            </div>
                            {{-- <div>
                                <button class="text-xs font-semibold rounded-full px-4 py-1 leading-normal bg-white border border-purple text-purple hover:bg-purple hover:text-white">Message</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-4">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Full Name
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 leading-tight" id="grid-first-name" type="text" placeholder="Jane Doe">
                    <p class="hidden text-red text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full px-3 mb-4">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Email
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" id="grid-email" type="text" placeholder="my-email@domain.com">
                </div>
                <div class="w-full px-3 mb-4">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="avatar">
                    Update Profile Image
                    </label>
                    <input type="file" class="appearance-none bg-grey-lighter block text-grey-darker w-full rounded py-2 px-4" name="avatar">
                </div>
                <div class="w-full px-3 flex items-center">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="rounded bg-blue text-white py-3 px-4 mx-auto" value="Actualizar mis datos">
                </div>
            </div>
        </form>

    </div>
@endsection
