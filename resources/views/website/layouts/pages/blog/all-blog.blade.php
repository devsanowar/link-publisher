 <div class="row g-4">

     @foreach ($posts as $post)
         <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
             <!-- Card 1 -->
             <div class="card h-100">
                 <img src="{{ asset($post->image) }}" loading="lazy" width="100%" height="200"
                 style="object-fit: cover; object-position: center;" class="card-img-top"   
                     class="card-img-top" alt="Casino Link Building" />
                 <div class="card-body">
                     <span class="badge bg-warning text-dark mb-2">{{ $post->category->category_name }}</span>
                     <h6 class="card-title">
                         <a href="{{ route('blog_page.details', $post->id) }}">{{ $post->post_title }}</a>
                     </h6>
                     <p class="card-text text-muted">By {{ $post->user_name }} • {{ $post->views }}</p>
                 </div>
             </div>
         </div>
     @endforeach

 </div>
