<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Patakha | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.material.min.css">

  <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" ></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css"> -->
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="{{asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}"> -->
  <link rel="stylesheet" href="{{asset('assets/admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}"/> 
  <link rel="stylesheet" href="{{asset('assets/admin/richtexteditor/rte_theme_default.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/admin/css/custom.css')}}" />
  <script type="text/javascript" src="{{asset('assets/admin/richtexteditor/rte.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/admin/richtexteditor/plugins/all_plugins.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
        #active{
          width: 40px;
          background: #009688;
          text-align: center;
          border-radius: 50%;
          font-size: 18px;
          color: white;
          padding: 5px 0px 5px 0px;
          height: 35px;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        #inactive{
            width: 40px;
            background: #b7003e;
            text-align: center;
            border-radius: 50%;
            font-size: 18px;
            color: white;
            padding: 5px 0px 5px 0px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .tbl-class{
          text-align: center;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item .welcome-text {
          font-family: "Manrope", sans-serif;
          font-style: normal;
          font-weight: bold;
          font-size: 21px;
          line-height: 38px;
          color: #f95f53!important;
          margin-bottom: 10px;
      }
    </style>
</head>
<body>
<div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    @include('layouts.navigation')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      @include('layouts.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">{{--Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.--}}</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('assets/admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/progressbar.js/progressbar.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('assets/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/admin/js/template.js')}}"></script>
  <script src="{{asset('assets/admin/js/settings.js')}}"></script>
  <script src="{{asset('assets/admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
  <script src="{{asset('assets/admin/js/table.js')}}"></script>
  <script src="{{asset('assets/admin/js/Chart.roundedBarCharts.js')}}"></script> 
  <script src="{{asset('assets/admin/js/custom.js')}}"></script> 

@stack('scripts')
</body>

</html>
