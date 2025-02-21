<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    @foreach ($manuals as $manual)

        {{-- Increment the view count.  Important: Do this *before* displaying the manual link --}}
        <?php $manual->views++; $manual->save(); ?>  {{-- Or $manual->views++; $manual->save(); if you prefer --}}

        @if ($manual->locally_available)
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
            ({{$manual->filesize_human_readable}})
        @else
            <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
        @endif

        <br />
    @endforeach
    <p>Weergaven: {{ $manual->views }}</p>
</x-layouts.app>
