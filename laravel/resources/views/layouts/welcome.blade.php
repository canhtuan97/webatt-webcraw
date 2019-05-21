<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title>WebSosanh.com</title>
  <link rel="stylesheet" href="/css/css.css">
  <link rel="stylesheet" href="/css/Thumbnails.css">
  <script src="/js/bootstrap.js"></script>
  <script src="/js/popper.js" ></script>
  <script src="/js/jquery.js" ></script>
  <link href="/js/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">
  
 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WebSosanh.com</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" >
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Danh mục
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            
          <span>Điện thoại</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Thống kê</h6>
            <a class="collapse-item" href="{{route('max')}}" >Giá cao nhất</a>
            <a class="collapse-item" href="{{route('min')}}" >Giá thấp nhất</a>
            
            
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          
          <span>Ipad</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Thống kê</h6>
            <a class="collapse-item" href="{{route('max.ipad')}}" >Giá cao nhất</a>
            <a class="collapse-item" href="{{route('min.ipad')}}" >Giá thấp nhất</a>
            
            
          </div>
        </div>
      </li>
    </ul>
  


    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Search -->
          <form action="{{route('timkiem')}}" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            {{ csrf_field() }}
            <div class="input-group">
              <input type="text" name="key" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>   
          
         <form class="form-inline" action="{{route('min.max')}}" method="get">
           {{ csrf_field() }}
          <label for="price">Giá từ:</label>
          <input class="form-control" name="min">
          <label for="pwd">đến:</label>
          <input class="form-control"  name="max">
          
         
        </form>
        </nav>
        <br>
        <div class="container  bg-white" style="height: auto;">
            <div class="row">
              @yield('content')
          
            </div>
        
        <br>
        <br>
        <br>
     <hr>
      <!-- Footer -->
     <!-- Footer -->
<footer class="page-footer font-small teal pt-4">

  <!-- Footer Text -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Address</h5>
        <p>Đại học Bách Khoa Hà Nội</p>
        <p>Viện công nghệ thông tin và truyền thông</p>
        <p>Môn học:Web an toàn</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-6 mb-md-0 mb-3">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">link</h5>
        <a href="https://soict.hust.edu.vn/"><p>https://soict.hust.edu.vn/</p></a>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://soict.hust.edu.vn/"> Hà Nội 5/2019</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <script src="/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
  // Using jQuery.

  $(function() {
      $('form').each(function() {
          $(this).find('input').keypress(function(e) {
              // Enter pressed?
              if(e.which == 10 || e.which == 13) {
                  this.form.submit();
              }
          });

          $(this).find('input[type=submit]').hide();
      });
  });


  </script>

  


</body>

</html>
