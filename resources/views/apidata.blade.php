{{-- @if(isset($data))
    @foreach ($data as $key => $value)
        <p>{{ $key }}: {{ json_encode($value) }}</p>
    @endforeach
@else
    <p>Data tidak tersedia</p>
@endif --}}


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data API</title>
</head>
<body>
    <h1>Data Title</h1>

    {{-- Menampilkan title pertama di H1 --}}
    @if(isset($data['carts']) && count($data['carts']) > 0)
        <h1>{{ $data['carts'][0]['products'][0]['title'] }}</h1>
    @else
        <h1>Data tidak tersedia</h1>
    @endif

    {{-- Dropdown --}}
    <select>
        <option value="">Pilih Title</option>
        @if(isset($data['carts']))
            @foreach ($data['carts'] as $cart)
                @foreach ($cart['products'] as $product)
                    <option value="{{ $product['title'] }}">{{ $product['title'] }}</option>
                @endforeach
            @endforeach
        @endif
    </select>
</body>
</html>

