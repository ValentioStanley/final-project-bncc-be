<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$item->namaBarang}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="card ms-5" style="margin: 1rem";>
        <div class="card-body">
            <img src="{{asset('/storage/images/'.$item->fotoBarang)}}" style="width: 18rem;">
            <h5 class="card-title">Nama Barang: {{$item->namaBarang}}</h5>
            <a href="{{route('categoryDet', ['id' => $item->category->id])}}" class="card-text">Kategori: {{$item->category->namaKategori}}</a>
            <p class="card-text">Harga Barang: {{$item->hargaBarang}}</p>
            <p class="card-text">Jumlah Barang: {{$item->jumlahBarang}}</p>
            <a href="{{route('editItem', ['id'=>$item->id])}}" class="btn btn-success">Edit Item</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
