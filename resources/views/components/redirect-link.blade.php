@props(['name', 'link', 'title'])

<div class="text-center mt-7">
    <p class="text-custom-grey">
        {{ $name }}
        <a href="{{ $link }}" class="text-black font-bold">
            {{ $title }}
        </a>
    </p>
</div>
