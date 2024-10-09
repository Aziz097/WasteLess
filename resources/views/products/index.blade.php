<h1>Produk Diskon di Supermarket Terdekat</h1>

@if($produk_diskon->isEmpty())
    <p>Tidak ada produk diskon di dekat lokasi Anda.</p>
@else
    <ul>
        @foreach($produk_diskon as $product)
            <li>{{ $product->name }} - Harga setelah diskon: Rp{{ number_format($product->produk_diskon, 2) }}</li>
        @endforeach
    </ul>
@endif
