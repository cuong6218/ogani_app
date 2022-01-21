<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="admin/assets/css/style.css" />
    <link rel="stylesheet" href="admin/assets/css/custom.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.layout.sidebar')
        <div class="container-fluid page-body-wrapper">
          @include('admin.layout.header')
          <div class="main-panel">
            <div class="content-wrapper">
              @include('admin.home.breadcrumb')
              @yield('content')
              @include('admin.layout.footer')
            </div>
            
          </div>
          
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="admin/assets/vendors/flot/jquery.flot.js"></script>
    <script src="admin/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="admin/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="admin/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="admin/assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="admin/assets/vendors/flot/jquery.flot.pie.js"></script>
    <script src="admin/assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    
    <script src="admin/assets/js/select2.js"></script>
    <script src="admin/assets/js/file-upload.js"></script>
    <script src="admin/assets/js/custom.js"></script>
    <!-- End custom js for this page -->
    
  </body>
</html>