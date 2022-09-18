@props(['title'])

<header>
    <div class="flex justify-between p-[10px] border-b">
        <img src="{{ URL('/images/logo.svg') }}" class="md:ml-[100px]" />

        <div class="flex items-center md:mr-[90px]">
            <div class="cursor-pointer mr-[5px] ml-[15px] md:mr-5">
                <a href="{{ app()->getLocale() === 'ka' ? route('change.locale', 'en') : route('change.locale', 'ka') }}">
                    {{ app()->getLocale() === 'ka' ? 'English' : 'ქართული' }}
                </a>
            </div>

            <h2 class="hidden md:block mx-[40px] font-bold">{{ ucwords(auth()->user()->username) }}</h2>
            <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                @csrf
                <div class="border-l px-5">
                    <button class="cursor-pointer h-[40px] font-medium text-sm" type="submit">
                        {{__('general.logout')}}
                    </button>
                </div>
            </form>

            <div x-data="{ open: false }" class="md:hidden relative">
                <img @click="open = ! open" x-show="!open"  src="{{ URL('/images/burger.png') }}" class="cursor-pointer md:hidden"/>

                <i x-show="open" @click="open = false" class="absolute left-3 cursor-pointer fa-solid fa-xmark"></i>

                <div x-show="open" @click.outside="open = false" class="flex flex-col items-center justify-center border-l">
                    <h2 class="ml-[0px] font-bold mt-[10px]">
                        {{ ucwords(auth()->user()->username) }}
                    </h2>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="px-5">
                            <button class="cursor-pointer font-medium text-xs" type="submit">
                                {{__('general.logout')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="mt-[40px] md:ml-[100px] md:w-4/5">
    <h3 class="ml-[20px] md:ml-[0] font-extrabold text-2xl">
        {{ $title }}
    </h3>

    {{ $slot }}
</div>
