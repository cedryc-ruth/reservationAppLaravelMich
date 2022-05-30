
 {{-- resources/views/partials/breadcrumbs.blade.php --}}

 @if ($breadcrumbs)
     <section class="banner-area organic-breadcrumb">
         <div class="container">
             <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                 <div class="col-first">
                    <h1>{{ ($breadcrumbs[count($breadcrumbs)-1])->title }}</h1>
                     @foreach ($breadcrumbs as $breadcrumb)
                         @if (!$loop->last)
                             <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a><i class="fas fa-arrow-right mx-2"></i>
                         @else
                             <a href="" class="inactive">{{ $breadcrumb->title }}</a>
                         @endif
                     @endforeach
                 </div>
             </div>
         </div>
     </section>
 @endif
