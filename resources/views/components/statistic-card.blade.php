@props(['stat_img', 'title', 'amount', 'color'])

<div class="w-[90px] h-[65px]">
    <img src="{{ $stat_img }}" class="w-full h-full" alt="statistic" />
</div>

<h2 class="font-medium text-sm md:text-xl my-[10px]">
    {{ $title }}
</h2>

<h2 class="{{ $color }} font-black text-[25px] md:text-[39px]">
    {{ number_format($amount)  }}
</h2>

