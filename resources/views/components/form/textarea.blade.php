@php
    $nameAttr = $attributes->get('name');
    $id       = $attributes->get('id', $nameAttr);
    $rows     = (int) $attributes->get('rows', 4);
    $label    = $attributes->get('label') ?? ($nameAttr ? ucwords(str_replace('_',' ', $nameAttr)) : '');
    $value    = old($nameAttr, $attributes->get('value'));
@endphp

@if($label !== '')
<label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
@endif

<textarea
    id="{{ $id }}"
    name="{{ $nameAttr }}"
    rows="{{ $rows }}"
    {{ $attributes->except(['id','rows','label','name','value'])->merge(['class'=>'mt-1 block w-full border rounded p-2']) }}
>{{ $value }}</textarea>

@error($nameAttr)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror