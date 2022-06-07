<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>Page Not Found</title>
</head>
<body>

    <section style="padding-top:100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h1 style="font-size:162px;">404</h1>
                    <h2>Page introuvable</h2>
                    <p>La page que vous recherchez n'existe pas! Revenir à la page d'accueil</p>
                    <a href="/" class="btn btn-primary">Revenir à l'accueil</a>
                </div>
            </div>
        </div>
    </section>
    

    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/popper.js') }}"></script>
</body>
</html>