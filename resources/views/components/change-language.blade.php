<a href="{{ app()->getLocale() === 'ka' ? route('change.locale', 'en') : route('change.locale', 'ka') }}">
    {{ app()->getLocale() === 'ka' ? 'English' : 'ქართული' }}
</a>
