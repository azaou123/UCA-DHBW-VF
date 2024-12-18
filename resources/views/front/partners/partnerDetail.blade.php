<!DOCTYPE html>
<html lang="en">

<!-- head Section -->
@include('front.partials.head')

<body>

    <!-- Loading Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar Section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

<!-- <div id="sectionNotification" class="notification2 show"> -->
       
       
    </div>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{$partner->name_company}}</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/partners" class="h5 text-white">Partners</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h4>Address</h4>
                <p>{{$partner->adress}}</p>
        </div>
        <div class="col-md-4">
                <h4>Email</h4>
                    <p><a href="mailto:{{$partner->email}}">{{$partner->email_company}}</a></p>
        </div>
        <div class="col-md-4">
                    <h4>Phone</h4>
                    <p>{{$partner->fax}}</p>
                </div>
        </div>
        <div class="row">
            <div class="col">
                    <h4>Description</h4>
                    <p>{{$partner->description}}</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="mb-4">Workshops</h2>
        <div class="row">
            @foreach($workshops as $workshop)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$workshop->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$workshop->country}} - {{$workshop->city}}</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon">
                                <img width=200px src="{{asset('img/'.$workshop->image)}}">
                            </div>
                            <div class="icon"></div>
                            <div class="icon"></div>
                        </div>
                        <p class="card-text"><strong>University: {{$workshop->university}}</strong><br>
                        {{$workshop->date_start}} to {{$workshop->date_end}}<br>
                        {{$workshop->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container my-5">
        <h2 class="mb-4">Internships</h2>
        <div class="row">
            @foreach($internships as $internship)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$internship->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"> Company : {{$internship->company}}</h6>
                        <div class="d-flex align-items-center mb-3">
                            <!-- <div class="icon">
                                <img width=200px src="{{asset('img/'.$internship->image)}}">
                            </div>
                            <div class="icon"></div>
                            <div class="icon"></div> -->
                        </div>
                        {{$internship->date_start}} to {{$internship->date_end}}<br>
                        <p class="card-text">{{$internship->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container my-5">
        <h2 class="mb-4">Projects</h2>
        <div class="row">
            @foreach($projects as $project)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"> Objective : {{$project->objective}}</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon">
                                <img width=200px src="{{asset('img/'.$project->image)}}">
                            </div>
                            <div class="icon"></div>
                            <div class="icon"></div>
                        </div>
                            Duration: {{$project->duration_in_months}}<br>
                        <p class="card-text"> Description: {{$project->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button-->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include scripts -->
    @include('front.partials.scripts')
                    
    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')
</body>

</html>
