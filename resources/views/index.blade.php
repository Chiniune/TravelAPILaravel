<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel Agency Management</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <style>
        td{
    max-height: 3; /* Số dòng tối đa là 3 */
    overflow: hidden;
    text-overflow: ellipsis;
        }
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                    </a>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Asset('assets\img\travel.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Travel agency</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Travel Agency Management</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-11">
                           
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Tickets Management</h3>
                                    <div class="card-tools">

                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Ticket</th>
                                                <th>Price Adult</th>
                                                <th>Price Child</th>
                                                <th>Image Folder</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tickets as $tic)
                                            <tr>
                                                <td> 
                                                    <img src="{{ asset("assets/img/$tic->ticket_image.png") }}" alt=""
                                                        class="img-circle img-size-32 mr-2">
                                                    {{ $tic->ticket_name }}
                                                </td>
                                                <td> 
                                                    {{ $tic->ticket_price_adult }}
                                                </td>
                                                <td> 
                                                    {{ $tic->ticket_price_child }}
                                                </td>
                                                <td> 
                                                    {{ $tic->ticket_image }}
                                                </td>
                                                <td>
                                                    <a href=""
                                                        class="text-muted">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href=""
                                                        class="text-muted ml-3">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-lg-11">
                            <!-- cart -->
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Hotels Management </h3>
                                </div>
                                <div class="card-body  p-0">
                                    <!-- /.d-flex -->
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Hotels</th>
                                                <th>Rating</th>
                                                <th>Desctiption</th>
                                                <th>Image Folder</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hotels as $hotel)
                                            <tr>
                                                <td>
                                                <img src="{{ asset("assets/img/$hotel->hotel_image.png") }}" alt=""
                                                        class="img-circle img-size-32 mr-2">
                                                    {{ $hotel->hotel_name }}
                                                </td>
                                                <td>{{ $hotel->hotel_rating }}</td>
                                                <td style="width: 40%;">{{ $hotel->hotel_description }}</td>
                                                <td>{{ $hotel->hotel_image }}</td>
                                                <td><a href=""
                                                        class="text-muted">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href=""
                                                        class="text-muted ml-3">
                                                        <i class="fas fa-edit"></i>
                                                    </a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Restaurants Management</h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-user-plus"></i>
                                        </a>
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                            <th>Restaurant</th>
                                                <th>Rating</th>
                                                <th>Desctiption</th>
                                                <th>Image Folder</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($restaurants as $res)
                                            <tr>
                                            <td><img src="{{ asset("assets/img/$res->restaurant_image.png") }}" alt=""
                                                        class="img-circle img-size-32 mr-2">
                                                    {{ $res->restaurant_name }}
                                             </td>
                                            <td>{{ $res -> restaurant_rating}}</td>
                                            <td style="width: 40%; max-height: 3em;  overflow: hidden;">{{ $res -> restaurant_description}}</td>
                                            <td>{{ $res ->restaurant_image }}</td>
                                            <td><a href=""
                                                        class="text-muted">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href=""
                                                        class="text-muted ml-3">
                                                        <i class="fas fa-edit"></i>
                                                    </a></td>
</tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/js/pages/dashboard3.js') }}"></script>

</body>

</html>