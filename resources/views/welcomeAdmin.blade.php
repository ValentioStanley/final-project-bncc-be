<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Home</title>
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


        <h3>Welcome to our item, Admin. Please don't forget to do your job!</h3>
        <div class="d-flex m-5" style="align-items: center; gap: 30px; text-align: center;">
            @foreach ($items as $item)
            <div class="card" style="width: 18rem;">
                <div class="card p-4">
                    <img src="{{ asset('/storage/images/'.$item->fotoBarang) }}" width= '50%' height='50%' class="card-img-top" alt="Barang">
                    <h5 class="card-title">{{$item->namaBarang}}</h5>
                    <p class="card-text">Rp{{$item->hargaBarang}},00</p>
                    <div class="">
                        <a href="{{route('itemDetail', ['id'=>$item->id])}}" class="btn btn-primary">Click to more detail</a>
                    </div>
                    <div class="mt-2">
                        <a href="{{route('editItem', ['id'=>$item->id])}}" class="btn btn-success">Edit Item</a>
                        <a href="{{route ('confirmDelete',['id'=>$item->id])}}" class="btn btn-danger">Delete Item</a>
                    </div>
                </div>
            </div>
            @endforeach
            <a href="{{route('addItem')}}" class="btn btn-info text-light">Create a item</a>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
