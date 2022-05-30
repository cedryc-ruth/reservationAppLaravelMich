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


// Home > Contact
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contact', route('show.contact'));
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
    $trail->push($artist->firstname.' '.$artist->lastname, route('artist.index',$artist->id));
});

// Home > Spectacles
Breadcrumbs::for('spectacles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Spectacles', route('show.index'));
});

// Spectacles > Representation (dynamique)
Breadcrumbs::for('representation', function (BreadcrumbTrail $trail, $show) {
    $trail->parent('spectacles');
    $trail->push($show->title, route('show.show',$show->slug));
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


