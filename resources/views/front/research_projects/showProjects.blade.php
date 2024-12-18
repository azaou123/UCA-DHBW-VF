<!DOCTYPE html>
<html lang="en">

<!-- head Start -->
@include('front.partials.head')
<!-- head End -->

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Research Projects</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/research_projects" class="h5 text-white">Research Projects</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Full Screen Search Start -->
    @include('front.partials.screen_search')
    <!-- Full Screen Search End -->

    <!-- Project Details Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 align-items-start">
                <!-- Project Information Column -->
                <div class="col-lg-7">
                    <div class="card shadow-sm border-0 p-4 h-100">
                        <!-- Header -->
                        <div class="container-fluid bg-light py-4 border-bottom mb-4">
                            <div class="">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Badge-style header -->
                                        <span class="badge bg-primary text-uppercase mb-3 px-4 py-3" style="font-size: 1rem;">
                                            Research Project
                                        </span>
                                        <!-- Project title -->
                                        <h1 class=" fw-bold text-dark mb-0" style="font-size: 30px;">
                                            {{ $projects->title }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-2">Description</h6>
                            <div class="p-3 bg-light rounded-3">
                                {{ $projects->description }}
                            </div>
                        </div>

                        <!-- Objective -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-2">Objective</h6>
                            <div class="p-3 bg-light rounded-3">
                                {{ $projects->objective }}
                            </div>
                        </div>

                        <!-- Partners -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-2">Partners</h6>
                            <div class="p-3 bg-light rounded-3">
                                <ul class="list-unstyled mb-0">
                                    @forelse($projects->partners as $partner)
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class="bi bi-building me-2 text-primary"></i>
                                        {{ $partner->name_company }}
                                    </li>
                                    @empty
                                    <li class="text-muted">No partners available.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <!-- Team -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-2">Team</h6>
                            <div class="p-3 bg-light rounded-3">
                                <div class="mb-3">
                                    <h6 class="text-dark mb-2">Teachers</h6>
                                    <ul class="list-unstyled ms-3 mb-3">
                                        @foreach($projects->teachers as $teacher)
                                        <li class="mb-2 d-flex align-items-center">
                                            <i class="bi bi-person-fill me-2 text-primary"></i>
                                            {{ $teacher->firstname }} {{ $teacher->lastname }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="text-dark mb-2">Students</h6>
                                    <ul class="list-unstyled ms-3 mb-0">
                                        @foreach($projects->students as $student)
                                        <li class="mb-2 d-flex align-items-center">
                                            <i class="bi bi-person me-2 text-primary"></i>
                                            {{ $student->firstname }} {{ $student->lastname }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-2">Project Duration</h6>
                            <div class="p-3 bg-light rounded-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar-event me-2 text-primary"></i>
                                            <div>
                                                <small class="text-muted d-block">Start Date</small>
                                                <strong>{{ $projects->created_at->format('Y-m-d') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-clock me-2 text-primary"></i>
                                            <div>
                                                <small class="text-muted d-block">Duration</small>
                                                <strong>{{ $projects->duration_in_months }} {{ Str::plural('month', $projects->duration_in_months) }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div>
                            <h6 class="text-primary fw-bold mb-2">Project Details</h6>
                            <div class="p-3 bg-light rounded-3">
                                <a href="{{ url('storage/projects/project_details/'.$projects->project_details) }}"
                                    class="btn btn-primary btn-sm d-inline-flex align-items-center"
                                    target="_blank">
                                    <i class="bi bi-file-pdf me-2"></i>
                                    View Project Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Image Column -->
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <img class="rounded shadow-sm wow zoomIn img-fluid"
                            data-wow-delay="0.9s"
                            src="{{ asset('storage/projects/'.$projects->image) }}"
                            alt="{{ $projects->title }}"
                            style="object-fit: cover; width: 100%; height: 100%; min-height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Details End -->

    <!-- Footer Start -->
    @include('front.partials.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Import custom scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>

</body>

</html>