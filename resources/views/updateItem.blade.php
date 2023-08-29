<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <h1>Update Item</h1>
    <form class="m-5" method="POST" action="{{route('updateItem', ['id' => $item->id])}}">
        @csrf
        @method('PATCH')
        {{-- <div class="mb-3">
            <label for="kategoriBarang" class="form-label">Kategori Barang</label>
            <select class="form-select" aria-label="category" id="category" name="category">
                <option selected>Open this select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->namaKategori}}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="mb-3">
            <label for="namaBarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="namaBarang" name="namaBarang" value="{{$item->namaBarang}}" placeholder="Samsung A52s">
        </div>
        <div class="mb-3">
            <label for="hargaBarang" class="form-label">Harga Barang</label>
            <input type="text" class="form-control" id="hargaBarang" name="hargaBarang" value="{{$item->hargaBarang}}" placeholder="Rp120.000,00">
        </div>
        <div class="mb-3">
            <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlahBarang" name="jumlahBarang" value="{{$item->jumlahBarang}}" placeholder="Kuantitas">
        </div>
        <div class="mb-3">
            <label for="fotoBarang" class="form-label">Foto Barang</label>
            <input type="file" class="form-control" id="fotoBarang" name="fotoBarang" value="{{$item->fotoBarang}}" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        {{-- <button class="btn btn-dark"><a href="{{route('allItem')}}">Cancel</a></button> --}}
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    {{-- <script src="addItem.js"></script> --}}
</body>
</html>
