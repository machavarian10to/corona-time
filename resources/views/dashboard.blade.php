<x-layout>
    <x-dashboard-template title="{{ __('general.world_stats') }}">
        <div class="border-b my-[50px]">
            <div class="flex w-[250px] justify-between ">
                <p class="font-bold border-b-4 border-b-black h-[40px]">
                    {{ __('general.worldwide')  }}
                </p>
                <a href="{{ route('country') }}">
                    <p>{{__('general.country')}}</p>
                </a>
            </div>
        </div>

        <div class="flex justify-between">
            <x-statistic-card
                bg="{{ URL('storage/indigo-block.png') }}"
                stat_img="{{ URL('storage/new.png') }}"
                title="{{ __('general.new_cases') }}" amount="{{ $statistic->pluck('confirmed')->sum() }}" color="text-custom-indigo"
            />

            <x-statistic-card
                bg="{{ URL('storage/green-block.png') }}"
                stat_img="{{ URL('storage/recovered.png') }}"
                title="{{ __('general.recovered') }}" amount="{{ $statistic->pluck('recovered')->sum() }}" color="text-custom-green"
            />

            <x-statistic-card
                bg="{{ URL('storage/yellow-block.png') }}"
                stat_img="{{ URL('storage/death.png') }}"
                title="{{ __('general.deaths') }}" amount="{{ $statistic->pluck('deaths')->sum() }}" color="text-custom-yellow"
            />
        </div>
    </x-dashboard-template>
</x-layout>
