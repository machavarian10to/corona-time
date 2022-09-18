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

            <x-statistic-card
                bg="{{'indigo'}}"
                stat_img="{{ URL('storage/new.png') }}"
                title="{{ __('general.new_cases') }}"
                amount="{{ $statistic->pluck('confirmed')->sum() }}"
                color="text-custom-indigo"
            />

            <x-statistic-card
                bg="{{'green'}}"
                stat_img="{{ URL('storage/recovered.png') }}"
                title="{{ __('general.recovered') }}"
                amount="{{ $statistic->pluck('recovered')->sum() }}"
                color="text-custom-green"
            />

            <x-statistic-card
                bg="{{'yellow'}}"
                stat_img="{{ URL('storage/death.png') }}"
                title="{{ __('general.deaths') }}"
                amount="{{ $statistic->pluck('deaths')->sum() }}"
                color="text-custom-yellow"
            />
        </div>
    </x-dashboard-template>
</x-layout>
