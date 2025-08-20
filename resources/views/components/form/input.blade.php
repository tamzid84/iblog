@php
    $nameAttr = $attributes->get('name');        // e.g. "slug"
    $id       = $attributes->get('id', $nameAttr);
    $type     = $attributes->get('type', 'text');
    $value    = $attributes->get('value');
    $label    = $attributes->get('label') ?? ($nameAttr ? ucwords(str_replace('_',' ', $nameAttr)) : '');
@endphp

@if($label !== '')
<label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
@endif

<input
    id="{{ $id }}"
    type="{{ $type }}"
    name="{{ $nameAttr }}"
    value="{{ old($nameAttr, $value) }}"
    {{ $attributes->except(['id','type','value','label','name'])->merge(['class'=>'mt-1 block w-full border rounded p-2']) }}
>

@error($nameAttr)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror