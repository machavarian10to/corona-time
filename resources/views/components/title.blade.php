@props(['name'])

<h2 {{ $attributes->merge(['class' => 'mt-[60px] text-2xl font-black']) }}>
    {{ $name }}
</h2>
