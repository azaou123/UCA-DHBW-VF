<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Settings</title>
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
                    <a href="{{ route('students') }}" class="nav-item nav-link"><i class="fa-solid fa-graduation-cap me-2"></i>Students</a>
                    <a href="{{ route('teachers') }}" class="nav-item nav-link"><i class="fa-solid fa-chalkboard-user me-2"></i>Teachers</a>
                    <a href="{{ route('exchanges') }}" class="nav-item nav-link"><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>Exchanges</a>
                    <a href="{{ route('partners') }}" class="nav-item nav-link"><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>Partners</a>
                    <a href="{{ route('internships') }}" class="nav-item nav-link"><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>internships</a>
                    <a href="{{ route('workshops') }}" class="nav-item nav-link"><i class="fa-solid fa-laptop-file me-2"></i>Workshops</a>
                    <a href="{{ route('projects') }}" class="nav-item nav-link"><i class="fa-solid fa-diagram-project me-2"></i>Projects</a>
                    <a href="{{ route('fablabs') }}" class="nav-item nav-link"><i class="fa-solid fa-group-arrows-rotate me-2"></i>Fablabs</a>
                    <a href="{{ route('programs') }}" class="nav-item nav-link"><i class="fa-solid fa-list me-2"></i>Programs</a>
                    <a href="{{ route('settings') }}" class="nav-item nav-link active"><i class="fa-solid fa-cogs mx-3"></i>Settings</a>
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
                    <h2 class="col-10">Settings</h2>
                    <div class="col-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_input">
                            <i class="fa-solid fa-plus text mt-1 fs-5"></i>
                            Add Setting
                        </button>
                    </div>
                </div>
                <div class="modal fade" tabindex="-1" role="dialog" id="modal_input" aria-labelledby="addSettingModalLabel">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="addSettingModalLabel" style="color:black;">Add Setting</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:black;">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form action="{{ route('settings.add') }}" method="post">
                                  @csrf
                                  @if ($errors->any())
                                      <div class="alert alert-danger text-light">
                                          <ul>
                                              @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  @endif

                                  <div class="form-group">
                                      <label for="title">Title</label>
                                      <input type="text" class="form-control" style="background-color:#ffffff;" id="title" name="key" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="value">Value</label>
                                      <input type="text" class="form-control" style="background-color:#ffffff;" id="value" name="value" required>
                                  </div>

                                  <div class="form-group text-center mt-3">
                                      <button type="button" class="btn btn-danger float-end mt-3" data-dismiss="modal" style="margin-left:10px !important;">Cancel</button>
                                      <button type="submit" class="btn btn-success float-end mt-3">Add Setting</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Value</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <hr>
                    <tbody>
                      @foreach($settings as $setting)
                          <tr id="setting_{{ $setting->id }}" data-id="{{ $setting->id }}">
                              <td>{{ $setting->key }}</td>
                              <td>{{ $setting->value }}</td>
                              <td class="text-end d-flex align-items-center">
                                  <button type="button" class="btn btn-info"  data-toggle="modal" 
                                                            data-target="#editSettingModal"
                                                            data-id="{{ $setting->id }}"
                                                            data-key="{{ $setting->key }}"
                                                            data-value="{{ $setting->value }}">
                                      Edit
                                  </button>
                                  <form action="{{ route('settings.destroy', $setting->id) }}" method="POST" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="editSettingModal" aria-labelledby="editSettingModalLabel">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editSettingModalLabel" style="color:black;">Edit Setting</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:black;">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                      <form action="{{ route('settings.update', ['setting' => ':id']) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <input type="hidden" id="edit_id" name="id">

                              @if ($errors->any())
                                  <div class="alert alert-danger text-light">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif

                              <div class="form-group">
                                  <label for="edit_title">Title</label>
                                  <input type="text" class="form-control" style="background-color:#ffffff;" id="edit_title" name="key" required>
                              </div>
                              <div class="form-group">
                                  <label for="edit_value">Value</label>
                                  <input type="text" class="form-control" style="background-color:#ffffff;" id="edit_value" name="value" required>
                              </div>

                              <div class="form-group text-center mt-3">
                                  <button type="button" class="btn btn-danger float-end mt-3" data-dismiss="modal" style="margin-left:10px !important;">Cancel</button>
                                  <button type="submit" class="btn btn-success float-end mt-3">Update Setting</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>



            <!-- Footer -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">UCA-DHBW Portail</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="back/js/main.js"></script>
    <script>
    $(document).ready(function() {
          $('#editSettingModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget); // Button that triggered the modal
              var settingId = button.data('id'); // Extract setting ID
              var settingKey = button.data('key');
              var settingValue = button.data('value');
              var modal = $(this);

              modal.find('#edit_id').val(settingId);
              modal.find('#edit_title').val(settingKey);
              modal.find('#edit_value').val(settingValue);

              var formAction = "{{ route('settings.update', ':id') }}".replace(':id', settingId);
              modal.find('form').attr('action', formAction);
          });
      });

    </script>

</body>
</html>
