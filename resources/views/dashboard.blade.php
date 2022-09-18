<x-layout>
    <x-dashboard-template title="{{ __('general.world_stats') }}">
        <div class="border-b ml-[20px] md:ml-0 my-[40px]">
            <div class="flex w-[250px] justify-between ">
                <p class="font-bold border-b-4 border-b-black h-[40px]">
                    {{ __('general.worldwide')  }}
                </p>
                <a href="{{ route('country') }}">
                    <p>{{__('general.country')}}</p>
                </a>
            </div>
        </div>

        <div class="flex justify-center flex-wrap gap-3 p-2
                    md:flex-nowrap md:items-baseline md:p-0 md:justify-between ">

            <div class="bg-indigo-block basis-[343px]
            h-[193px] md:basis-auto md:h-[255px] md:w-[392px]
            rounded-2xl flex flex-col justify-center items-center">
                <x-statistic-card
                    stat_img="{{ URL('images/new.png') }}"
                    title="{{ __('general.new_cases') }}"
                    amount="{{ $statistic->pluck('confirmed')->sum() }}"
                    color="text-custom-indigo"
                />
            </div>

            <div class="bg-green-block basis-[164px]
            h-[193px] md:basis-auto md:h-[255px] md:w-[392px]
            rounded-2xl flex flex-col justify-center items-center">
                <x-statistic-card
                    stat_img="{{ URL('images/recovered.png') }}"
                    title="{{ __('general.recovered') }}"
                    amount="{{ $statistic->pluck('recovered')->sum() }}"
                    color="text-custom-green"
                />
            </div>

            <div class="bg-yellow-block basis-[164px]
            h-[193px] md:basis-auto md:h-[255px] md:w-[392px]
            rounded-2xl flex flex-col justify-center items-center">
                <x-statistic-card
                    stat_img="{{ URL('images/death.png') }}"
                    title="{{ __('general.deaths') }}"
                    amount="{{ $statistic->pluck('deaths')->sum() }}"
                    color="text-custom-yellow"
                />
            </div>
        </div>
    </x-dashboard-template>
</x-layout>
