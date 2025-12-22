@props([
    'name' => '',
    'label' => '',
    'placeholder' => null,
    'required' => false,
])
<div>
    <label class="block font-semibold mb-2 text-neutral-dark"></label>
    {{ $label }}
    </label>
    
    @if ($required)
    <span class="text-red-600">*</span>
    @endif

    <input
    type="text"
    wire:model.defer={{ $name }}
    class="input p-2"
    @if ($required)
    required
    @endif
    @if ($placeholder)
    placeholder="{{ $placeholder }}"
    @endif
    >

    @error($name)
    <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
    @enderror
</div>