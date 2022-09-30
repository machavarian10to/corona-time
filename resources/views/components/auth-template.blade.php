<div class="flex justify-between">
    <div class="p-1 mt-[40px] mx-auto md:ml-[5%]">
        <div class="flex justify-between items-center">
            <img src="{{ URL('/images/logo.svg') }}" />

            <div class="m-5">
                <x-change-language />

            </div>
        </div>

        {{ $slot }}

    </div>

    <div class="hidden md:block md:ml-[30px] md:w-[625px]">
        <img src="{{ URL('/images/vaccine.png') }}" class="w-full h-full" />
    </div>

</div>

