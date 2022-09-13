@props(['title'])

<header>
    <div class="flex justify-between p-6 border-b">
        <img src="{{ URL('storage/logo.svg') }}" class="ml-[100px]" />

        <div class="flex items-center mr-[90px]">
            <div class="cursor-pointer">
                English<i class="fa-sharp fa-solid fa-chevron-down ml-2"></i>
            </div>
            <h2 class="mx-[40px] font-bold">{{ auth()->user()->username }}</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="border-l px-5">
                    <button class="cursor-pointer h-[40px] font-medium text-sm" type="submit">
                        Log Out
                    </button>
                </div>
            </form>
        </div>
    </div>
</header>

<div class="mt-[50px] ml-[100px] w-4/5">
    <h3 class="font-extrabold text-2xl">
        {{ $title }}
    </h3>

    {{ $slot }}
</div>
