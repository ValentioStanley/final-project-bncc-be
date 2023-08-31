<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('welcomeAdmin')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('addItem')}}">Add Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('addCategory')}}">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('showCategory')}}">Show Category</a>
                    </li>
                </ul>
                @auth
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{route('login')}}" class="btn btn-outline-success">Login</a>
                @endauth
            </div>
        </div>
    </nav>
    <h1>Add Item</h1>
    <form class="m-5" method="POST" action="{{route('storeItem')}}" enctype="multipart/form-data">
        @csrf
        {!! csrf_field() !!}
        <div class="mb-3">
            <label for="kategoriBarang" class="form-label">Kategori Barang</label>
            <select class="form-select" aria-label="category" id="category" name="kategoriID">
                <option value="">Open this select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->namaKategori}}</option>
                @endforeach
            </select>
            @error('kategoriID')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <a href="{{route('addCategory')}}">No more category? Click here to add category</a>
        </div>
        <div class="mb-3">
            <label for="namaBarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Samsung A52s">
            @error('namaBarang')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hargaBarang" class="form-label">Harga Barang</label>
            <input type="text" class="form-control" id="hargaBarang" name="hargaBarang"  placeholder="Rp120.000,00">
            @error('hargaBarang')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlahBarang" name="jumlahBarang" placeholder="Kuantitas">
            @error('jumlahBarang')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fotoBarang" class="form-label">Foto Barang</label>
            <input type="file" class="form-control" id="fotoBarang" name="fotoBarang">
            @error('fotoBarang')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('welcomeAdmin')}}" class="btn btn-dark">Cancel</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    {{-- <script src="addItem.js"></script> --}}
</body>
</html>
