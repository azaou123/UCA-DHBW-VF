<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UCA-DHBW Portail/ Projects</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

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
    <style>
        #dropdownCheckbox {
            border-radius: 6px;
            border: rgb(228, 226, 226) solid 2px;
        }
    </style>
    @include('back/confirmation_modal')
    @include('back/logout_confirmation')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{session('admin')["name"]}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <!-- <a href="{{ route('admin') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> -->
                    <a href="{{ route('students') }}" class="nav-item nav-link"><i class="fa-solid fa-graduation-cap me-2"></i>Students</a>
                    <a href="{{ route('teachers') }}" class="nav-item nav-link"><i class="fa-solid fa-chalkboard-user me-2"></i>Teachers</a>
                    <a href="{{ route('exchanges') }}" class="nav-item nav-link"><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>Exchanges</a>
                    <a href="{{ route('partners') }}" class="nav-item nav-link "><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>Partners</a>
                    <a href="{{ route('internships') }}" class="nav-item nav-link"><i class="fa-solid fa-laptop-file me-2"></i>Internships</a>
                    <a href="{{ route('workshops') }}" class="nav-item nav-link"><i class="fa-solid fa-laptop-file me-2"></i>Workshops</a>
                    <a href="{{ route('projects') }}" class="nav-item nav-link active"><i class="fa-solid fa-diagram-project mx-3"></i>Projects</a>
                    <a href="{{ route('fablabs') }}" class="nav-item nav-link"><i class="fa-solid fa-group-arrows-rotate me-2"></i>Fablabs</a>
                    <a href="{{ route('programs') }}" class="nav-item nav-link"><i class="fa-solid fa-list me-2"></i>Programs</a>
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
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
                    <h2 class="col-10">Projects</h2>
                    <div class="col-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_input">
                            <i class="fa-solid fa-plus text mt-1 fs-5"></i>
                            Add Project
                        </button>
                    </div>
                </div>
                <!-- Add New Student Modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTeacherModalLabel" style="color:black;">Add Project</h5>

                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">

                                <!-- Your form goes here -->
                                <form action="{{ route('projects.add') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var addProjectModal = new bootstrap.Modal(document.getElementById('modal_input'));
                                            addProjectModal.show();
                                        });
                                    </script>
                                    <div class="alert alert-danger text-light">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <span>{{ $error }}</span><br>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="lastname">Title</label>
                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="description" name="description" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="objective">Objective</label>
                                        <input type="text" class="form-control" style="background-color:#ffffff;" id="objective" name="objective" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="duration_in_months">Duration in months</label>
                                        <input type="number" class="form-control" style="background-color:#ffffff;" id="duration_in_months" name="duration_in_months" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="partners">Partners</label>
                                        <div class="container mb-2 form-control">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownCheckbox" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Select Options
                                                </button>
                                                <ul class="dropdown-menu p-3" style="width: 300px;" aria-labelledby="dropdownCheckbox">
                                                    <li>
                                                        <input type="text" autofocus class="form-control mb-2" id="dropdownSearchPartners" placeholder="Search..."
                                                            onkeyup="filterCheckboxDropdown('dropdownSearchPartners', 'partner')" style="background-color: white;">
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    @foreach($partners as $partner)
                                                    <li>
                                                        <div class="form-check partner">
                                                            <input class="form-check-input" type="checkbox" name="partners[]" value="{{ $partner->id }}"
                                                                id="partner_{{ $partner->id }}" style="background-color: rgb(169, 158, 158);">
                                                            <label class="form-check-label" for="partner_{{ $partner->id }}">
                                                                {{ $partner->name_company }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="teachers">Teachers participating</label>
                                        <div class="container mb-2 form-control">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownCheckbox" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Select Options
                                                </button>
                                                <ul class="dropdown-menu p-3" style="width: 300px;" aria-labelledby="dropdownCheckbox">
                                                    <li>
                                                        <input type="text" autofocus class="form-control mb-2" id="dropdownSearchTeachers" placeholder="Search..."
                                                            onkeyup="filterCheckboxDropdown('dropdownSearchTeachers', 'teacher')" style="background-color: white;">
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    @foreach($teachers as $teacher)
                                                    <li>
                                                        <div class="form-check teacher">
                                                            <input class="form-check-input" type="checkbox" name="teachers[]" value="{{ $teacher->id }}"
                                                                id="teacher_{{ $teacher->id }}" style="background-color: rgb(169, 158, 158);">
                                                            <label class="form-check-label" for="teacher_{{ $teacher->id }}">
                                                                {{ $teacher->firstname }} {{ $teacher->lastname }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="students">Students participating</label>
                                        <div class="container mb-2 form-control">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownCheckbox" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Select Options
                                                </button>
                                                <ul class="dropdown-menu p-3" style="width: 300px;" aria-labelledby="dropdownCheckbox">
                                                    <li>
                                                        <input type="text" autofocus class="form-control mb-2" id="dropdownSearchStudents" placeholder="Search..."
                                                            onkeyup="filterCheckboxDropdown('dropdownSearchStudents', 'student')" style="background-color: white;">
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    @foreach($students as $student)
                                                    <li>
                                                        <div class="form-check student">
                                                            <input class="form-check-input" type="checkbox" name="students[]" value="{{ $student->id }}"
                                                                id="student_{{ $student->id }}" style="background-color: rgb(169, 158, 158);">
                                                            <label class="form-check-label" for="student_{{ $student->id }}">
                                                                {{ $student->firstname }} {{ $student->lastname }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_project">Project Image</label>
                                        <input type="file" class="form-control" id="image_project" name="image_project" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="project_details">Project Details</label>
                                        <input type="file" class="form-control" id="project_details" name="project_details" required>
                                    </div>

                                    <button type="button" class="btn btn-danger float-end mt-3" data-dismiss="modal" style="margin-left:10px !important;">Cancel</button>
                                    <button type="submit" class="btn btn-success float-end mt-3">Add</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table for Students -->
                <table class="table my-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Objective</th>
                            <th>Duration</th>
                            <th>Equipe</th>
                            <th>Partners</th>
                            <th>Project image</th>
                            <th>Project details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                        <tr id="{{ $project->id }}">
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <!-- <td>{{ $project->description }}</td> -->
                            <td>
                                <div class="description-short">
                                    {{ Str::limit($project->description, 30) }} <!-- Résumé initial (30 caractères) -->
                                </div>
                                <div class="description-full" style="display: none;">
                                    {{ $project->description }} <!-- Description complète -->
                                </div>
                                <a href="#" class="show-more">...</a> <!-- Lien pour afficher le reste -->
                            </td>
                            <!-- <td>{{ $project->objective }}</td> -->
                            <td>
                                <div class="description-short">
                                    {{ Str::limit($project->objective, 30) }} <!-- Résumé initial (30 caractères) -->
                                </div>
                                <div class="description-full" style="display: none;">
                                    {{ $project->objective }} <!-- Description complète -->
                                </div>
                                <a href="#" class="show-more">...</a> <!-- Lien pour afficher le reste -->
                            </td>
                            <td>{{ $project->duration_in_months }}
                                {{ $project->duration_in_months > 1 ? 'months' : 'month' }}
                            </td>
                            <td>
                                <ul>
                                    @foreach($project->teachers as $teacher)
                                    <li>{{ $teacher->firstname }} {{ $teacher->lastname }}</li>
                                    @endforeach
                                    @foreach($project->students as $student)
                                    <li>{{ $student->firstname }} {{ $student->lastname }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach($project->partners as $partner)
                                    <li>{{ $partner->name_company }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if($project->image)
                                <img src="{{ url('storage/projects/'.$project->image) }}" alt="project image" class="rounded-circle" style="width: 65px; height: 65px;">
                                @else
                                No image
                                @endif
                            </td>
                            <td>
                                @if($project->project_details)
                                <a href="{{ url('storage/projects/project_details/'.$project->project_details) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Details</a>
                                @else
                                No file
                                @endif
                            </td>
                            <td>
                                <div class="d-inline">
                                    <button type="button" class="btn-sm btn-danger" onclick="show_confirmation_message('Are you sure you want to delete this project ?', {{ $project->id }})">
                                        <i class="fa-solid fa-trash mx-1 fs-5"></i>
                                    </button>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="post" style="display: inline-block; width: auto;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-sm btn-danger" id="delete_confirm_{{ $project->id }}" hidden>Delete</button>
                                    </form>
                                </div>
                                <div class="d-inline">
                                    <button type="button" class="btn-sm btn-warning" onclick="openUpdateModal({{ $project->id }})">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">No projects found</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

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
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeacherModalLabel" style="color:black;">Update exchange</h5>

                </div>
                <div class="modal-body">

                    <form action="{{ route('projects.update',1) }}" method="POST" enctype="multipart/form-data" id="update_form">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Automatically open the modal if there are validation errors
                                var updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
                                updateModal.show();
                            });
                        </script>
                        <div class="alert alert-danger text-light ">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span> <br>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- row goes here -->
                        <div class="form-group">
                            <label for="lastname">Title</label>
                            <input type="text" class="form-control" style="background-color:#ffffff;" id="title_update" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" style="background-color:#ffffff;" id="description_update" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Objective</label>
                            <input type="text" class="form-control" style="background-color:#ffffff;" id="objective_update" name="objective" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Duration in months</label>
                            <input type="number" class="form-control" style="background-color:#ffffff;" id="duration_in_months_update" name="duration_in_months" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Partners</label>
                            <div class="container mb-2 form-control">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownCheckbox" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Options
                                    </button>
                                    <ul class="dropdown-menu p-3" style="width: 300px;" aria-labelledby="dropdownCheckbox">
                                        <li>
                                            <input type="text"
                                                autofocus
                                                class="form-control mb-2"
                                                id="dropdownSearchPartners_update"
                                                placeholder="Search..."
                                                onkeyup="filterCheckboxDropdown('dropdownSearchPartners_update', 'partner')"
                                                style="background-color: white;">
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        @foreach($partners as $partner)
                                        <li>
                                            <div class="form-check partner">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    name="partners[]"
                                                    value="{{ $partner->id }}"
                                                    id="partner_{{ $partner->id }}_update"
                                                    style="background-color: rgb(169, 158, 158);">
                                                <label class="form-check-label" for="partner_{{ $partner->id }}_update">
                                                    {{ $partner->name_company }}
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Teachers participating</label>
                            <div class="container mb-2 form-control">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownCheckbox" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Options
                                    </button>
                                    <ul class="dropdown-menu p-3" style="width: 300px;" aria-labelledby="dropdownCheckbox">
                                        <li>
                                            <input type="text"
                                                autofocus
                                                class="form-control mb-2"
                                                id="dropdownSearchTeachers_update"
                                                placeholder="Search..."
                                                onkeyup="filterCheckboxDropdown('dropdownSearchTeachers_update', 'teacher')"
                                                style="background-color: white;">
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        @foreach($teachers as $teacher)
                                        <li>
                                            <div class="form-check teacher">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    style="background-color: rgb(169, 158, 158);"
                                                    name="teachers[]"
                                                    value="{{ $teacher->id }}"
                                                    id="teacher_{{ $teacher->id }}_update">
                                                <label class="form-check-label" for="teacher_{{ $teacher->id }}_update">
                                                    {{ $teacher->firstname }} {{ $teacher->lastname }}
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Students participating</label>
                            <div class="container mb-2 form-control">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownCheckbox" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Options
                                    </button>
                                    <ul class="dropdown-menu p-3" style="width: 300px;" aria-labelledby="dropdownCheckbox">
                                        <li>
                                            <input type="text"
                                                autofocus
                                                class="form-control mb-2"
                                                id="dropdownSearchStudents_update"
                                                placeholder="Search..."
                                                onkeyup="filterCheckboxDropdown('dropdownSearchStudents_update', 'student')"
                                                style="background-color: white;">
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        @foreach($students as $student)
                                        <li>
                                            <div class="form-check student">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    name="students[]"
                                                    value="{{ $student->id }}"
                                                    id="student_{{ $student->id }}_update"
                                                    style="background-color: rgb(169, 158, 158);">
                                                <label class="form-check-label" for="student_{{ $student->id }}_update">
                                                    {{ $student->firstname }} {{ $student->lastname }}
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_project">Project Image</label>
                            <input type="file" class="form-control" id="image_project_update" name="image_project">
                        </div>
                        <div class="form-group">
                            <label for="project_details">Project Datails</label>
                            <input type="file" class="form-control" id="project_details" name="project_details">
                        </div>
                        <button type="button" class="close btn btn-danger float-end mt-3" data-dismiss="modal" style="margin-left:10px !important;">Cancel</button>
                        <button type="submit" class="btn btn-warning float-end mt-3">Update Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Update  Modal -->


    <!-- JavaScript Libraries -->
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
    <script>
        function openUpdateModal(projectId) {
            // Find the table row with the corresponding projectId
            let tableRow = $("#" + projectId);

            // Extract data from the table row
            let durationText = tableRow.find("td:eq(4)").text().trim();
            let listItems = tableRow.find("td:eq(5) ul li");
            let listItemsPartners = tableRow.find("td:eq(6) ul li");

            let projectData = {
                id: tableRow.find("td:eq(0)").text(),
                title: tableRow.find("td:eq(1)").text(),
                description: tableRow.find("td:eq(2)").text(),
                objective: tableRow.find("td:eq(3)").text(),
                duration_in_months: parseInt(durationText.split(" ")[0]),
            };

            let form = document.getElementById("update_form");
            let action = form.getAttribute("action");
            form.setAttribute("action", action.substring(0, action.lastIndexOf("/")) + "/" + projectId);

            // Update modal fields
            $("#title_update").val(projectData.title);
            $("#description_update").val(projectData.description);
            $("#objective_update").val(projectData.objective);
            $("#duration_in_months_update").val(projectData.duration_in_months);
            listItems.each(function() {
                let itemText = $(this).text().trim(); // Get the text of the current <li>

                // Iterate over each teacher checkbox
                $("input[name='teachers[]']").each(function() {
                    let teacherLabel = $(this).siblings("label").text().trim(); // Get the text next to the checkbox (teacher name)

                    // If the teacher name matches the text from the <li>, check the checkbox
                    if (teacherLabel === itemText) {
                        $(this).prop('checked', true); // Check the checkbox
                    }
                });
                // Iterate over each student checkbox
                $("input[name='students[]']").each(function() {
                    let studentLabel = $(this).siblings("label").text().trim(); // Get the text next to the checkbox (student name)

                    // If the student name matches the text from the <li>, check the checkbox
                    if (studentLabel === itemText) {
                        $(this).prop('checked', true); // Check the checkbox
                    }
                });
            });

            listItemsPartners.each(function() {
                let itemText = $(this).text().trim(); // Get the text of the current <li>

                // Iterate over each partner checkbox
                $("input[name='partners[]']").each(function() {
                    let partnerLabel = $(this).siblings("label").text().trim(); // Get the text next to the checkbox (partner name)

                    // If the partner name matches the text from the <li>, check the checkbox
                    if (partnerLabel === itemText) {
                        $(this).prop('checked', true); // Check the checkbox
                    }
                });
            });

            // Open the modal
            $("#updateModal").modal("show");
        }
    </script>
    <script>
        function filterCheckboxDropdown(inputId, itemsClass) {
            const input = document.getElementById(inputId);
            const filter = input.value.toLowerCase();
            const items = document.querySelectorAll('.form-check.' + itemsClass);

            items.forEach((item) => {
                const label = item.querySelector('label').textContent.toLowerCase();
                item.style.display = label.includes(filter) ? '' : 'none';
            });
        }
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        $(document).ready(function() {
            // Lorsque l'utilisateur clique sur "..."
            $('.show-more').click(function(e) {
                e.preventDefault(); // Empêche le comportement par défaut du lien

                // Récupère les éléments parents
                var $short = $(this).siblings('.description-short');
                var $full = $(this).siblings('.description-full');

                // Bascule entre le résumé et la description complète
                if ($full.is(':visible')) {
                    $full.hide();
                    $short.show();
                    $(this).text('...'); // Réaffiche les points de suspension
                } else {
                    $short.hide();
                    $full.show();
                    $(this).text('Réduire'); // Change le texte pour "Réduire"
                }
            });
        });
    </script>

</body>

</html>