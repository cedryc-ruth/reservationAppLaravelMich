<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <style>
        #show {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        #show td,
        #show th {
            border: 1px solid #ddd;
            padding: 15px;
        }

        #show th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
        }

    </style>
</head>

<body>
    <table class="table table-striped d-flex justify-content-center" id="show">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Bookable</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shows as $show)
                <tr>
                    <td>{{ $show->id }}</td>
                    <td>{{ $show->title }}</td>
                    <td>{{ $show->summary }}</td>
                    <td>{{ $show->bookable }}</td>
                    <td>{{ $show->price }}&euro;</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</body>

</html>
