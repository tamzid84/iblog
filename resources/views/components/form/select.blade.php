@php
    $nameAttr = $attributes->get('name');
    $id       = $attributes->get('id', $nameAttr);
    $label    = $attributes->get('label') ?? ($nameAttr ? ucwords(str_replace('_',' ', $nameAttr)) : '');
    $options  = $attributes->get('options', []);     // array|Collection
    $selected = old($nameAttr, $attributes->get('selected'));
    if ($options instanceof \Illuminate\Support\Collection) $options = $options->toArray();
@endphp

@if($label !== '')
<label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
@endif

<select
    id="{{ $id }}"
    name="{{ $nameAttr }}"
    {{ $attributes->except(['id','label','name','options','selected'])->merge(['class'=>'mt-1 block w-full border rounded p-2 bg-white']) }}
>
    <option value="">-- Select --</option>
    @foreach($options as $val => $text)
        <option value="{{ $val }}" @selected($selected == $val)>{{ $text }}</option>
    @endforeach
</select>

@error($nameAttr)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror