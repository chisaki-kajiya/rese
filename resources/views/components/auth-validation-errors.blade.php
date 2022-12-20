@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        @foreach ($errors->all() as $error)
            <p class="red mb10">{{ $error }}</p>
        @endforeach
    </div>
@endif
