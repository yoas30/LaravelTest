<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data API</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    {{-- List Title dari API --}}
    <ul id="productList">
        @if(isset($data['carts']))
            @foreach ($data['carts'] as $cart)
                @foreach ($cart['products'] as $product)
                    <li>{{ $product['title'] }}</li>
                @endforeach
            @endforeach
        @endif
    </ul>
    <br>
    <h1>Data Title</h1>

    {{-- Menampilkan title pertama di H1 --}}
    @if(isset($data['carts']) && count($data['carts']) > 0)
        <h1>{{ $data['carts'][0]['products'][0]['title'] }}</h1>
    @else
        <h1>Data tidak tersedia</h1>
    @endif

    {{-- Dropdown --}}
    {{-- <select>
        <option value="">Pilih Title</option>
        @if(isset($data['carts']))
            @foreach ($data['carts'] as $cart)
                @foreach ($cart['products'] as $product)
                    <option value="{{ $product['title'] }}">{{ $product['title'] }}</option>
                @endforeach
            @endforeach
        @endif
    </select> --}}
    {{-- Menampilkan gambar dari setiap produk dalam dropdown --}}
    {{-- @if(isset($data['carts']))
        <div>
            @foreach ($data['carts'] as $cart)
                @foreach ($cart['products'] as $product)
                    <div>
                        <img src="{{ $product['thumbnail'] }}" alt="{{ $product['title'] }}" width="100">
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif --}}
   
    <h1>Pilih Produk</h1>

    {{-- Dropdown untuk memilih produk --}}
    <select id="productDropdown">
        <option value="" data-image="">Pilih Title</option>
        @if(isset($data['carts']))
            @foreach ($data['carts'] as $cart)
                @foreach ($cart['products'] as $product)
                    <option value="{{ $product['title'] }}" data-image="{{ $product['thumbnail'] }}">
                        {{ $product['title'] }}
                    </option>
                @endforeach
            @endforeach
        @endif
    </select>

    {{-- Tombol Submit --}}
    <button onclick="showImage()">Tampilkan Gambar</button>

    {{-- Tempat menampilkan gambar --}}
    <div id="imageContainer" style="margin-top: 20px;">
        <img id="productImage" src="" alt="Pilih produk terlebih dahulu" width="200" style="display: none;">
    </div>

    <script>
        function showImage() {
            var dropdown = document.getElementById("productDropdown"); // Ambil dropdown
            var image = document.getElementById("productImage"); // Ambil elemen gambar
        
            var selectedOption = dropdown.options[dropdown.selectedIndex]; // Ambil opsi yang dipilih
            var imageUrl = selectedOption.getAttribute("data-image"); // Ambil atribut 'data-image'
        
            if (imageUrl) {
                image.src = imageUrl; // Ubah gambar sesuai pilihan
                image.style.display = "block"; // Tampilkan gambar
            } else {
                alert("Silakan pilih produk terlebih dahulu."); // Jika belum memilih, munculkan alert
                image.style.display = "none"; // Sembunyikan gambar
            }
        }
    </script>
</body>
</html>

