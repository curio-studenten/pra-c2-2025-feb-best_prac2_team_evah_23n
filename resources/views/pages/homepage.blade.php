<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>
    <a href="{{ route('top.manuals') }}">Top 10 Handleidingen</a>
    <a href="{{ route('forum') }}">Vul een form in</a>

    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    {{ $name }}

    <div class="container">
        <!-- Example row of columns -->
        <div class="brands-container">
            @foreach($brands->groupBy(fn($brand) => strtoupper(substr($brand->name, 0, 1))) as $letter => $chunk)
                <div class="brand-group">
                    <h2>{{ $letter }}</h2>
                    <div class="brands-grid">
                        @foreach($chunk as $brand)
                            <div class="brand-item">
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                                    {{ $brand->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
