@props(['bg', 'stat_img', 'title', 'amount', 'color'])

<div class="relative">
    <img src="{{ $bg }}" alt="block"/>
    <img src="{{ $stat_img }}" class="absolute top-12 left-[150px]" alt="statistic"/>
    <h2 class="absolute top-[120px] left-36 font-medium text-xl">
        {{ $title }}
    </h2>
    <h2 class="{{ $color }} absolute top-[160px] left-28 font-black text-[39px]">
        {{ $amount }}
    </h2>
</div>
