@props(['name'])

<div class="flex items-center mt-10 flex-col">
    <img src="{{ URL('storage/logo.svg') }}"  />
    <div class="flex flex-col items-center mt-72">
        {{ $slot }}
        <p class="text-lg mt-5">{{ $name }}</p>
    </div>
</div>
