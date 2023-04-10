{{ $produk }}
<br><br>
Kategori: {{ $produk->category->name }}
<br>
Nama Produk: {{ $produk->name }}
<br>
Harga: {{ number_format($produk->price, 0, ',', '.') }}
<br>
Deskripsi: {{ $produk->description }}
<br>
Gambar Produk : <br>
<img src="{{ asset('storage/images/' . $produk->image) }}" alt="gambar kategori {{ $produk->name }}" width="60" height="60">
<br>
Gambar Kategori : <br>
<img src="{{ asset('storage/images/' . $produk->category->image) }}" alt="gambar kategori {{ $produk->category->name }}" width="60" height="60">
<br>
Dibuat pada : {{ $produk->created_at->format('d M Y H:i:s') }}
<br>
Diupdate pada : {{ $produk->updated_at->format('d M Y H:i:s') }}