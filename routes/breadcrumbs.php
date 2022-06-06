<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('show.index'));
});

// Home > import

Breadcrumbs::for('import', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Import', route('importForm'));
});

// Home > API
Breadcrumbs::for('api', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('API', route('show.api'));
});

// Home > Perso
Breadcrumbs::for('perso', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Page Personnelle', route('home.index'));
});

// Home > Artistes
Breadcrumbs::for('artistes', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Artistes', route('artist.index'));
});

Breadcrumbs::for('artiste', function (BreadcrumbTrail $trail, $artist) {
    $trail->parent('artistes');
    $trail->push($artist->firstname.' '.$artist->lastname, route('artist.index', $artist->id));
});
// Home > Artistes Externes
Breadcrumbs::for('artistes_externes', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Artistes Externes', route('artist_api.index'));
});


// Home > Types

Breadcrumbs::for('types', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Artistes Par Type', route('type.index'));
});



// Home > Spectacles
Breadcrumbs::for('spectacles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Spectacles', route('show.index'));
});

// Spectacles > Representation (dynamique)
Breadcrumbs::for('representation', function (BreadcrumbTrail $trail, $show) {
    $trail->parent('spectacles');
    $trail->push($show->title, route('show.show', $show->slug));
});



// Home > Locations

Breadcrumbs::for('locations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Lieux', route('location.index'));
});

// Home > Locations > Salle
Breadcrumbs::for('location', function (BreadcrumbTrail $trail, $location) {
    $trail->parent('locations');
    $trail->push($location->designation, route('location.show', $location->slug));
});

// Home > Localités

Breadcrumbs::for('localites', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Localites', route('locality.index'));
});

// Home > Localités > locality

Breadcrumbs::for('localite', function (BreadcrumbTrail $trail,$locality) {
    $trail->parent('localites');
    $trail->push($locality->locality, route('locality.show',$locality->id));
});




// Home > Commandes
Breadcrumbs::for('commandes', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Commandes', route('home.orders'));
});

// Home > Panier
Breadcrumbs::for('panier', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Panier', route('cart.index'));
});

// Home > Checkout
Breadcrumbs::for('paiement', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Paiement', route('checkout.index'));
});

Breadcrumbs::for('confirmation', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Confirmation', route('checkout.success'));
});


// forgotPassword

Breadcrumbs::for('forgotPassword', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mot de passe oublié', route('password.email'));
});

// resetPassword

Breadcrumbs::for('resetPassword', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Réinitialiser le mot de passe', route('password.reset'));
});

// Login

Breadcrumbs::for('connexion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Connexion', route('login'));
});


// Register

Breadcrumbs::for('enregistrement', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Enregistrement', route('register'));
});

Breadcrumbs::for('verification', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Verification', route('email.verify'));
});
