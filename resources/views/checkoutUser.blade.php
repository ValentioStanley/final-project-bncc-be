<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check out Cart</title>
</head>
<body>
    @foreach ($items as $item)
        <h1>Checkout order</h1>
        <h5>Nama Lengkap: </h5>
        <p class="card-text">Nomor Invoice: {{$item->jumlahBarang}}</p>
        <img src="{{asset($item->fotoBarang)}}" class="card-text">
        <h5 class="card-title">Nama Barang: {{$item->namaBarang}}</h5>
        <a href="{{route('categoryDet', ['id' => $item->category->id])}}" class="card-text">Kategori: {{$item->category->namaKategori}}</a>
        <p class="card-text">Harga Barang: {{$item->hargaBarang}}</p>
        <div class="d-flex">
            <p class="card-text">Kuantitas Barang:</p><button type="button" class="btn btn-secondary"><span class="material-symbols-outlined">add_circle</span></button><div class="card" style="width: 50px; text-align:center;"> {{$item->jumlahBarang}}</label></div><button type="button" class="btn btn-secondary"><span class="material-symbols-outlined">do_not_disturb_on</span></button>
        </div>
        <p class="card-text">Alamat Pengiriman: {{$item->jumlahBarang}}</p>
        <p class="card-text">Kode Pos: {{$item->jumlahBarang}}</p>
        <p class="card-text">Total Harga: {{$item->jumlahBarang}}</p>
    @endforeach

    {{-- tambah tulis are you sure --}}
    <a href="" class="btn btn-success">Order Now</a>
</body>
</html>
