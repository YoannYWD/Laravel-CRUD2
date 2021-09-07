<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <a href="{{route('personnage.create')}}" class="btn btn-primary">Ajouter un personnage</a>        
    </div>


    <div class="container mt-5">
        <div class="row">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif

            <h1 class="text-center mb-5">Liste des personnages</h1>
            @foreach($personnages as $personnage)
            <div class="col-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{$personnage->image}}" class="card-img-top" alt="Image de {{$personnage->nom}}" style="height: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$personnage->nom}}</h5>
                        <p>#{{$personnage->id}}</p>
                        <form action="{{route('personnage.destroy', $personnage->id)}}" method="POST">
                            <a href="{{route('personnage.edit', $personnage->id)}}" class="btn btn-primary">Editer</a>
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</a>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>