<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Representation</title>
</head>

<body>
    <h1 class="text-center">Representations</h1>
    <div class="d-flex justify-content-center my-5">
        <a href="{{ route('show.index') }}" class="btn btn-info mx-4"> Retour à l'index des spectacles</a>
        <a href="{{ route('representation.create') }} " class="btn btn-primary"> Créer une représentation</a>
    </div>
    <div class="container my-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Show</th>
                    <th scope="col">Date</th>
                    <th scope="col">Room</th>
                    {{-- <th scope="col">Action</th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach ($representations as $representation)
                    <tr>
                        <th scope="row">{{ $representation->id }}</th>
                        <td>{{ $representation->show->title }}</td>
                        <td>{{ $representation->when->format('d-M-Y') }}</td>
                        <td>{{ $representation->room->name }} - {{ $representation->room->location->designation}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   





    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
