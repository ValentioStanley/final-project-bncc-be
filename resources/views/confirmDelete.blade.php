<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="card ms-5" style="margin: 1rem";>
        <div class="card-body">
            <h4 class="card-title">{{$item->namaBarang}}</h4>
            <p class="card-text">{{$item->hargaBarang}}</p>
            <p class="card-text">{{$item->jumlahBarang}}</p>
            {{-- <p class="card-text">{{$item->fotoBarang}}</p> --}}

            <h5>are you sure want to delete this item? Your data will be lost and cannot be restored if you delete.</h5>
            <form action ="{{ route('deleteItem', ['id'=>$item->id])}}" method=POST class="mb-3">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Yes, I am sure</button>
            </form>
            <a href="{{route('allItem')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
