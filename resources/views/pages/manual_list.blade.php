<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    <h2>Populaire Handleidingen</h2>

    @if($topManuals->isNotEmpty())
        <ul>
            @foreach($topManuals as $manual)
                <li>{{ $manual->name }} ({{$manual->views}} weergaven)</li>
            @endforeach
        </ul>
    @else
        <p>Er zijn nog geen populaire handleidingen voor dit merk.</p>
    @endif

    @foreach ($manuals as $manual)
        <?php
            $manual->increment('views');
        ?>

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
