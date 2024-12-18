<!DOCTYPE html>
<html lang="en">

    <!-- Include head partial -->
    @include('front.partials.head')

    <body>
        <!-- Loading spinner -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner"></div>
        </div>

        <!-- Navbar section -->
        <div class="container-fluid position-relative p-0">
            @include('front.partials.navbar')

            <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
                <div class="row py-5">
                    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-4 text-white animated zoomIn">Details</h1>
                        <a href="/" class="h5 text-white">Home</a>
                        <i class="far fa-circle text-white px-2"></i>
                        <a href="/news" class="h5 text-white">Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full Screen Search section -->
        @include('front.partials.screen_search')

        <!-- News Section-->


    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    @if($news instanceof \App\Models\Workshop)
                        <h5 class="fw-bold text-primary text-uppercase" id="latest_news">Workshops</h5>
                    @elseif($news instanceof \App\Models\Project)
                        <h5 class="fw-bold text-primary text-uppercase" id="latest_news">Research Projects</h5>
                    @elseif($news instanceof \App\Models\Internship)
                        <h5 class="fw-bold text-primary text-uppercase" id="latest_news">Internships</h5>
                    @elseif($news instanceof \App\Models\Program)
                        <h5 class="fw-bold text-primary text-uppercase" id="latest_news">Programs</h5>
                    @elseif($news instanceof \App\Models\Fablab)
                        <h5 class="fw-bold text-primary text-uppercase" id="latest_news">Achievements</h5>
                    @endif

                    <h1 class="mb-0">{{ $news->title }}</h1>
                </div>

                <div class="mb-4">
                    <h5>Description</h5>
                    <p>{{ $news->description }}</p>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="position-relative h-100">
                    <img class="w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('img/IMG_0326.JPG') }}" style="object-fit: cover;">
                </div>
            </div>
            </div>
            <div class="row mb-4">
             
    @if($news->date_start)
    <div class="col-md-3 wow fadeInUp" data-wow-delay="0.5s" >
        <h5>Start Date</h5>
        <p>{{ $news->date_start }}</p>
    </div>
    @endif

    @if($news->date_end)
    <div class="col-md-3 wow fadeInUp" data-wow-delay="0.5s">
        <h5>End Date</h5>
        <p>{{ $news->date_end }}</p>
    </div>
    @endif
 @if($news->type)
 <div class="col-md-3 wow fadeInUp" data-wow-delay="0.5s">
     <h5>Type</h5>
     <p>
         @if($news->type === 'on_site')
             On site
         @else
             {{ $news->type }}
         @endif
     </p>
 </div>
@endif


</div>

  <!-- Additional Information -->



                    <div class="row mb-4">

                    @if($news->company)
                    <div class="col-md-3 wow fadeInUp" data-wow-delay="0.8s">
                        <h5>Company</h5>
                        <p>{{ $news->company }}</p>
                    </div>
                    @endif

                    <div class="col-md-3 wow fadeInUp" data-wow-delay="0.8s">
                    <h5>Partner</h5>
                     <p>{{ $news->partner_name ?? 'None' }}</p>
                     </div>
                     
</div>

    <div class="row mb-4">
    @if($news->students->count() > 0)
    <div class="col-md-3 wow fadeInUp" data-wow-delay="1s">
        <h5>Affected Students</h5>
        <ul>
            @foreach($news->students as $student)
            <li>{{ $student->firstname }} {{ $student->lastname }}</li>
            @endforeach
        </ul>
    </div>
    @else
    <div class="col-md-3 wow fadeInUp" data-wow-delay="1s">
        <h5>Affected Students</h5>
        <p>No students assigned to this internship.</p>
    </div>
    @endif


<!-- Superviseurs affectés-->

    @if($news->teachers->count() > 0)
    <div class="col-md-3 wow fadeInUp" data-wow-delay="1s">
        <h5>Supervisors</h5>
        <ul>
            @foreach($news->teachers as $supervisor)
            <li>{{ $supervisor->firstname }} {{ $supervisor->lastname }}</li>
            @endforeach
        </ul>
    </div>
    @else
    <div class="col-md-6">
        <h5>Supervisors</h5>
        <p>No supervisors assigned to this internship.</p>
    </div>
    @endif 


    
 
</div>
@if($news->report_link)
<div class="col-md-3 wow fadeInUp" data-wow-delay="1.2s">
    <h5>Report</h5>
    <a href="{{ $news->report_link }}" target="_blank" class="btn btn-outline-primary">
        <i class="fas fa-file-alt"></i> View Report
    </a>
</div>
@else
<div class="col-md-3 wow fadeInUp" data-wow-delay="1.2s">
    <h5>Report</h5>
    <p>No report available for this internship.</p>
</div>
@endif



</div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- Footer Section -->
    @include('front.partials.footer')

    <!--Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!--Include Scripts -->
    @include('front.partials.scripts')


    </body>

</html>
