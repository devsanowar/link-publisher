 <section class="stand-out-section">
     <div class="container">
         <div class="row">
             <div class="col-md-6">
                 <div class="stand-out-section-left-side">
                     <h3>{{ $linkBuildingSolution->section_title ?? '' }}: <br> {{ $linkBuildingSolution->title ?? '' }}
                     </h3>
                     <p>{!! $linkBuildingSolution->description ?? '' !!}</p>
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="stand-out-section-right-side">
                     <div class="stand-out-box">
                         @foreach ($linkBuildingSolution->features ?? '' as $feature)
                             <div class="single-stand-out-box">
                                 <p> {{ $feature ?? ''}}</p>
                             </div>
                         @endforeach

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
