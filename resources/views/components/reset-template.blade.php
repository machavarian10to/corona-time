@props(['name', 'link'])

<div class="flex items-center mt-10 flex-col">
    <img src="{{ URL('storage/logo.svg') }}"  />
    {{ $slot }}
</div>

<form method="POST" action="{{ $link }}">
    <div class="text-center mt-5">
            <button type="submit" class="mt-6 w-[392px] h-[56px] bg-custom-green
                        rounded-lg text-white font-black hover:bg-opacity-90"
            >
                {{ $name }}
            </button>
    </div>
</form>
