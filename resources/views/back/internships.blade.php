<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UCA-DHBW Portail/ Internships</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="back/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="back/css/style.css" rel="stylesheet">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">UCA-DHBW</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{session('admin')["name"]}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <!-- <a href="{{ route('admin') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> -->
                    <a href="{{ route('students') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-graduation-cap me-2"></i>Students</a>
                    <a href="{{ route('teachers') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-chalkboard-user me-2"></i>Teachers</a>
                    <a href="{{ route('exchanges') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-arrow-right-arrow-left me-2"></i>Exchanges</a>
                    <a href="{{ route('partners')  }}" class="nav-item nav-link"><i
                            class="fa-solid fa-arrow-right-arrow-left me-2"></i>Partners</a>
                    <a href="{{ route('internships') }}" class="nav-item nav-link active"><i
                            class="fa-solid fa-arrow-right-arrow-left mx-3"></i>internships</a>
                    <a href="{{ route('workshops') }}" class="nav-item nav-link "><i
                            class="fa-solid fa-laptop-file me-2"></i>Workshops</a>
                    <a href="{{ route('projects') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-diagram-project me-2"></i>Projects</a>
                    <a href="{{ route('fablabs') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-group-arrows-rotate me-2"></i>Fablabs</a>
                    <a href="{{ route('programs') }}" class="nav-item nav-link"><i
                            class="fa-solid fa-list me-2"></i>Programs</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{session('admin')["name"]}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logout">Log out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4 my-5">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row">
                    <h2 class="col-10">Internships</h2>
                    <div class="col-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_input">
                            <i class="fa-solid fa-plus text mt-1 fs-5"></i>
                            Add internship
                        </button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <hr>
                    <tbody>
                    @foreach($internships as $internship)
                        <tr>
                            <td>{{ $internship['title'] }}</td>
                            <td>{{ $internship['date_start'] }}</td>
                            <td>{{ $internship['date_end'] }}</td>
                            <td>
                                <a href="{{ route('internship_show', $internship->id) }}" class="btn btn-info">View</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Add New Student Modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="modal_input" tabindex="-1" role="dialog"
                    aria-labelledby="addStudentModalLabel">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTeacherModalLabel" style="color:black;">Add Internship
                                </h5>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!-- Your form goes here -->
                                <form action="{{ route('internships.add') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                    <div class="alert alert-danger text-light">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <span>{{ $error }}</span> <br>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control"
                                                    style="background-color:#ffffff;" id="title" name="title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <select class="form-select" 
                                                        style="background-color: #ffffff;" 
                                                        id="type" 
                                                        name="type" 
                                                        required>
                                                    <option value="" disabled selected>Choose a type</option>
                                                    <option value="on-site">On-Site</option>
                                                    <option value="online">Online</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                           
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_start">Start Date</label>
                                                <input type="date" class="form-control"
                                                    style="background-color:#ffffff;" id="date_start" name="date_start"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_end">End Date</label>
                                                <input type="date" class="form-control"
                                                    style="background-color:#ffffff;" id="date_end" name="date_end"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company">Company</label>
                                                <input type="text" class="form-control"
                                                    style="background-color:#ffffff;" id="company" name="company"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="partner_id">Partner</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    style="background-color:#ffffff;" id="partner_id" name="partner_id">
                                                    <option value="" disabled selected>Choose a partner</option>
                                                    @foreach($partners as $partner)
                                                    <option value="{{$partner->id}}">{{$partner->name_company}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" 
                                                          style="background-color: #ffffff;" 
                                                          id="description" 
                                                          name="description" 
                                                          rows="4" 
                                                          required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Report Link</label>
                                                <input class="form-control" 
                                                          style="background-color: #ffffff;" 
                                                          id="report_link" 
                                                          name="report_link" 
                                                          rows="4" 
                                                          required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="close btn btn-danger float-end mt-3"
                                        data-dismiss="modal" style="margin-left:10px !important;">Cancel</button>
                                    <button type="submit" class="btn btn-success float-end mt-3">Add internship</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                


            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">UCA-DHBW Portail</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Start Update  Modal -->
    
   

    <!-- End Update  Modal -->
    @include('back/confirmation_modal')
    @include('back/logout_confirmation')
    <!-- JavaScript Libraries -->
    <!-- Add these to your layout file -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="back/lib/chart/chart.min.js"></script>
    <script src="back/lib/easing/easing.min.js"></script>
    <script src="back/lib/waypoints/waypoints.min.js"></script>
    <script src="back/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="back/lib/tempusdominus/js/moment.min.js"></script>
    <script src="back/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="back/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="back/js/main.js"></script>
</body>

</html>