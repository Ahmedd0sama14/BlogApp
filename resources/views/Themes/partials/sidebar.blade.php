@php
    $categories=\App\Models\Category::all();
@endphp
<div class="col-lg-4 sidebar-widgets">
    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif
       <div class="widget-wrap">

           <form method="POST" action="{{ route('subscribers') }}">
              @csrf
               <div class="single-sidebar-widget newsletter-widget">
                   <h4 class="single-sidebar-widget__title">Newsletter</h4>
                   <div class="form-group mt-30">
                       <div class="col-autos">
                           <input type="text" class="form-control" name="email" placeholder="Enter email"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                       </div>
                   </div>
                   <button class="bbtns d-block mt-20 w-100">Subcribe</button>
               </div>
           </form>

           <div class="single-sidebar-widget post-category-widget">
               <h4 class="single-sidebar-widget__title">Catgory</h4>
               <ul class="cat-list mt-20">
                   @foreach ($categories as $category)
                   <li>
                       <a href="{{ route('category', $category->id) }}" class="d-flex justify-content-between">
                           <p>{{ $category->name }}</p>
                           <p>{{ $category->blogs->count() }}</p>
                       </a>
                   </li>
                   @endforeach
               </ul>
           </div>

         
       </div>
   </div>
