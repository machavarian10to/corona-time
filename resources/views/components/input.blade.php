@props(['type', 'name', 'title', 'placeholder'])

<div class="mb-5">
    <label
        for="{{ $name }}"
        class="font-bold"
    >
        {{ $title }}
    </label>

    <div class="mt-2">
        <input
            required
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($name) }}"
            placeholder="{{ $placeholder }}"
            class=" w-[400px] h-[60px] appearance-none rounded-md border
            border-gray-300 px-6 py-2 shadow-sm focus:border-custom-indigo
            focus:outline-none focus:custom-indigo"
        />
    </div>

    @error($name)
        <div class="flex">
            <p class="text-red-600 text-xl mt-5">
                <i class="fa-solid fa-circle-exclamation text-red-600"></i>
                {{ $message }}
            </p>
        </div>
    @enderror
</div>
