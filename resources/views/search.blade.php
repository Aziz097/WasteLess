<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
</head>
<body>
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" placeholder="Search Products" value="{{ request()->input('search') }}">
        <button type="submit">Search</button>
    </form>

    @if (count($results) > 0)
        @foreach ($results as $result)
            <p>Produk Ditemukan</p>
        @endforeach
    @else
        <p>Produk Tidak Ditemukan</p>
    @endif
</body>
</html>
