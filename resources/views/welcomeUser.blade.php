<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- Icon Google --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('showOrder')}}"></a>
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
    <h3>Please choose these items.</h3>
    <div class="d-flex m-5" style="align-items: center; gap: 30px; text-align: center;">
        @foreach ($items as $item)
        <div class="card" style="width: 18rem;">
            <div class="card p-4">
                <img src="{{asset('/storage/images/'.$item->fotoBarang)}}" width= '50%' height='50%' class="card-img-top" alt="Barang">
                <h5 class="card-title">{{$item->namaBarang}}</h5>
                <a href="{{route('categoryDet', ['id' => $item->category->id])}}" class="card-text">Kategori: {{$item->category->namaKategori}}</a>
                <p class="card-text">Rp{{$item->hargaBarang}},00</p>
                <p class="card-text">Stock: {{$item->jumlahBarang}}</p>
                <a href="{{route('itemDetail', ['id'=>$item->id])}}" class="btn btn-info mb-3">Click to more detail</a>
                    @if (session('error') && $item->jumlahBarang == 0)
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @else
                        <a href="{{route('checkout', ['id'=>$item->id])}}" class="btn btn-primary">Click to add a cart<span class="material-symbols-outlined">add_shopping_cart</span></a>
                    @endif
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
