<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Product</title>
</head>
<body>
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" placeholder="Search Product" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    
    <div style="margin-top: 20px;">
        <!-- Filter Buttons -->
        <a href="{{ route('search', ['search' => request('search'), 'filter' => 'terdekat']) }}" class="btn btn-primary {{ request('filter') == 'terdekat' ? 'active' : '' }}">Terdekat</a>
        <a href="{{ route('search', ['search' => request('search'), 'filter' => 'termurah']) }}" class="btn btn-primary {{ request('filter') == 'termurah' ? 'active' : '' }}">Termurah</a>
        <a href="{{ route('search', ['search' => request('search'), 'filter' => 'terlaris']) }}" class="btn btn-primary {{ request('filter') == 'terlaris' ? 'active' : '' }}">Terlaris</a>
    </div>
    
    <!-- Results -->
    @if (count($results) > 0)
        <ul>
            @foreach ($results as $result)
                <li>{{ $result->nama }} - Harga: {{ $result->harga }} - Jumlah terjual: {{ $result->jumlah_beli }}</li>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif    
</body>
</html>
