@props(['bg', 'stat_img', 'title', 'amount', 'color'])

<div class="bg-[url('/public/storage/{{$bg}}-block.png')]
            {{ $bg === 'indigo' ? 'basis-[343px]' : 'basis-[164px]' }}
            h-[193px] md:basis-auto md:h-[255px] md:w-[392px]
            rounded-2xl flex flex-col justify-center items-center" >

        <div class="w-[90px] h-[65px]">
            <img src="{{ $stat_img }}" class="w-full h-full" alt="statistic" />
        </div>

        <h2 class="font-medium text-sm md:text-xl my-[10px]">
            {{ $title }}
        </h2>

        <h2 class="{{ $color }} font-black text-[25px] md:text-[39px]">
            {{ number_format($amount)  }}
        </h2>
</div>

