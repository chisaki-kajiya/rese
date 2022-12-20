@props(['status'])

@if ($status)
<div {{ $attributes->merge(['class' => '']) }} class="red mb10">
    {{ $status }}
</div>
@endif