<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
@include('front.partials.head')

<body>
    <!-- Loading Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Navbar Section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')
        <!-- Header Section with Workshop Title -->
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{ $workshop->title }}</h1>
                    <a href="/workshop" class="h5 text-white">Workshops</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Workshop Details Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="international_cooperation">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <div class="section-title position-relative pb-3 mb-5">
                            <h1 class="mb-0">{{ $workshop->title }}</h1>
                        </div>
                        <p class="mb-4">{{ $workshop->description }}</p>
                        <div class="row g-0 mb-3">
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><strong>Start Date :</strong> {{ date('M d, Y', strtotime($workshop->date_start)) }}</h5>
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><strong>End Date :</strong> {{ date('M d, Y', strtotime($workshop->date_end)) }}</h5>
                            </div>
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><strong>University :</strong> {{ $workshop->university }}</h5>
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><strong>Type :</strong> {{ $workshop->type }}</h5>
                            </div>
                        </div>
                        @if ($workshop->ppt)
                        <div class="col-12 mt-4">
                            <a href="{{ asset('storage/workshops/' . $workshop->ppt) }}" class="btn btn-primary" download>
                                <i class="fa fa-download me-2"></i> Download PPT
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Right Column: Workshop Image -->
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('storage/workshops/'.$workshop->image) }}" style="object-fit: contain;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Teachers Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="success_story">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0">Teachers</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            @foreach($workshop->teachers as $teacher)
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    <img class="img-fluid rounded-circle" src="{{ asset('storage/teachers/'.$teacher->photo) }}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">{{ $teacher->firstname }} {{ $teacher->lastname }}</h4>
                            
                            <small class="text-uppercase"><strong>University:</strong> {{ $teacher->university }}</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5 p">
                        <strong>Speciality:</strong> {{$teacher->speciality }}</small><br>
                        <strong>Nationality:</strong> {{ $teacher->nationnality }}</small><br>
                        <strong>Email:</strong> {{ $teacher->email }}
                    </div>
                    
                </div>
                @endforeach
            </div>


        </div>
    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')
    <!-- Include scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for form submission and pagination -->
    @include('front.partials.form_script')

    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')

</body>

</html>