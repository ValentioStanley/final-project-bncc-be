<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check out Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
    <h1>Checkout order</h1>
    <h5>Nama Barang:</h5>
        <form class="m-2" method="POST" action="{{route('storeOrder', ['id' => $item ->id])}}">
            @csrf
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Invoice</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Alamat Pengiriman</th>
                    <th scope="col">Kode Pos</th>
                    <th scope="col">Sub Harga</th>
                    <th scope="col">Total Harga</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" name="nomorInvoice">{{$order->nomorInvoice}}</th>
                        <td name="kategoriID">{{$item->category->namaKategori}}</td>
                        <td name="namaBarang">{{$item->namaBarang}}</td>
                        <td>
                            <div class="d-flex">
                                <input type="number" class="form-control" id="kuantitas" name="kuantitas" style="width: 70px;" placeholder="12">
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamatPengiriman" rows="3" placeholder="Jl. Kebun Jeruk"></textarea>
                        </td>
                        <td>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="kodePos" style="width: 80px;" placeholder="11530">
                        </td>
                        <td name="hargaBarang">Rp{{$item->hargaBarang}},00</td>
                        <td>Rp<span id="totalHarga" name="totalHarga">{{$order->totalHarga}}</span>,00</td>
                        <script>
                            const hargaBarang = {{ $item->hargaBarang }};
                            const inputKuantitas = document.getElementById('kuantitas');
                            const getTotalHarga = document.getElementById('totalHarga');

                            inputKuantitas.addEventListener('input', function() {
                                const kuantitas = parseInt(inputKuantitas.value);
                                const totalHarga = hargaBarang * kuantitas;
                                getTotalHarga.textContent = totalHarga;
                            });
                        </script>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('user')}}" class="btn btn-dark">Cancel</a>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
