<div class="flex justify-between">
    <div class="mt-[40px] ml-[110px]">
        <img src="{{ URL('storage/logo.svg') }}" />

        {{ $slot }}
    </div>

    <div>
        <img src="{{ URL('storage/vaccine.png') }}" />
    </div>
</div>

