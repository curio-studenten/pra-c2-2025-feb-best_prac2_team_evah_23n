<x-layouts.app>

    <h1>Top 10 Meest Bekeken Handleidingen</h1>

    <ul>
        @foreach($topManuals as $manual)
            <li>{{ $manual->name }} ({{ $manual->views }} views)</li>
        @endforeach
    </ul>

</x-layouts.app>
