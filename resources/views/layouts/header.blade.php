 <!-- Start Header Area -->
 <header class="header_area sticky-header">
     <div class="main_menu">
         <nav class="navbar navbar-expand-lg navbar-light main_box">
             <div class="container">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <a class="navbar-brand logo_h" href="{{ route('spectacles') }}"><img
                         src="{{ asset('img/logo.png') }}" alt="Logo du site"></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                     <ul class="nav navbar-nav menu_nav mr-auto ml-5">
                         @if (Auth::user())
                             @if (Auth::user()->hasRole('admin'))
                                 <li class="nav-item">
                                     <a class="nav-link" href="/admin" target="_blank">
                                         <i class="fa-solid fa-briefcase"></i> Admin
                                     </a>
                                 </li>
                             @endif

                         @endif
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('spectacles') }}">
                                 <i class="fa-solid fa-masks-theater mx-2"></i>Spectacles
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="fa-solid fa-people-group"></i> Artistes
                             </a>

                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('contact') }}">
                                 <i class="fas fa-envelope"></i>Contact
                             </a>
                         </li>
                     </ul>

                     <ul class="nav navbar-nav menu_nav ml-auto">
                         @guest
                             @if (Route::has('login'))
                                 <li class="nav-item">
                                     <a class="nav-link" href="{{ route('login') }}"><i
                                             class="fas fa-sign-in-alt"></i> Connection</a>
                                 </li>
                             @endif

                             @if (Route::has('register'))
                                 <li class="nav-item">
                                     <a class="nav-link" href="{{ route('register') }}"><i
                                             class="fas fa-user-plus mx-1"></i>S'inscrire</a>
                                 </li>
                             @endif
                         @else
                             <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('home') }}"
                                     role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                     v-pre>
                                     {{ Auth::user()->name }}
                                 </a>

                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('home') }}">Mon compte</a>
                                     <a class="dropdown-item" href="{{ route('orders') }}">Mes achats</a>
                                     <div class="dropdown-divider"></div>
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                         <i class="fas fa-sign-out-alt"></i> Se déconnecter
                                     </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                         class="d-none">
                                         @csrf
                                     </form>
                                 </div>
                             </li>
                         @endguest
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('cart.index') }}">
                                 <i class="fas fa-shopping-cart"></i> Panier
                                 @if (Cart::count() > 0)
                                     <span
                                         class="badge badge-pill badge-primary p-1">{{ Cart::count() }}</span>
                                 @endif
                             </a>
                         </li>

                     </ul>
                 </div>
             </div>
         </nav>
     </div>
 </header>
 <!-- End Header Area -->
