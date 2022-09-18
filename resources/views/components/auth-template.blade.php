<div class="flex justify-between">
    <div class="p-1 mt-[40px] mx-auto md:ml-[30px] xl:ml-[40px]">
        <img src="{{ URL('storage/logo.svg') }}" />

        {{ $slot }}
    </div>

    <div class="hidden md:block md:ml-[30px] md:w-[550px] xl:w-[600px]">
        <img src="{{ URL('storage/vaccine.png') }}" class="w-full h-full" />
    </div>
</div>

