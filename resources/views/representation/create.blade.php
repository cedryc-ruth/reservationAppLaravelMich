<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Representation | Add</title>
</head>

<body>
    <h1 class="text-center">Ajouter une representation </h1>
    <div class="d-flex justify-content-center my-5">
        <a href="{{ route('representation.index') }}" class="btn btn-info mx-4"> Retour en arrière</a>
        <a href="{{ route('representation.create') }} " class="btn btn-primary"> Créer une représentation</a>
    </div>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Ajouter une representation</h4>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('danger'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('danger') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('representation.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 col-md-12">
                        <label for="show_id" class="form-label">Choisir un show</label>
                        <select name="show_id" id="show_id" aria-label="show_id" class="form-select"
                            value="{{ old('show_id') }}">
                            @foreach ($shows as $show)
                                <option value="{{ $show->id }}">{{ $show->title }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="room_id" class="form-label">Choisir une salle</label>
                        <select name="room_id" id="room_id" aria-label="room_id" class="form-select"
                            value="{{ old('room_id') }}">
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }} - {{$room->location->designation}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="when" class="form-label">Date</label>
                        <input type="date" name="when" id="when" class="form-select">

                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</body>

</html>
