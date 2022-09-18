@props(['name', 'value', 'sort'])


<form method="GET" action="{{ route('country') }}" class="flex justify-around">
    <button name="sortby" value="{{ $value }}" type="submit" class="flex items-center">
{{--        {{ strlen($name) }}--}}
        {{
            app()->getLocale() === 'ka' && strlen($name) > 27
            ? Str::of($name)->limit(7)
            : $name
         }}

        <div class="ml-1">
            <svg class="mb-1" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z"
                      fill="{{ request('sortby') === $sort && request('direction') === 'asc' ? 'black' : '#BFC0C4' }}"
                />
            </svg>
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 5.5L0 0.5H10L5 5.5Z"
                      fill="{{ request('sortby') === $sort && request('direction') === 'desc' ? 'black' : '#BFC0C4' }}"
                />
            </svg>
        </div>
    </button>
    <input
        name="direction"
        type="hidden"
        value="{{ request('direction') === 'asc' ? 'desc' : 'asc' }}"
    />
</form>
