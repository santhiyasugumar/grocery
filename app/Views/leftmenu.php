 <!-- Side Navbar -->
 <nav class="side-navbar menu" style="display:none">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?php echo base_url('img/avatar-7.jpg')?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Admin</h2>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">   
            <!-- <li id="menuCity"><a href="<?php echo base_url('/home')?>"> <i class="icon-grid"></i>Home</a></li>               
            <li id="menuNews"><a href="<?php echo base_url('/news')?>"> <i class="icon-form"></i>News</a></li> -->
            <li id="menuCategory"><a href="<?php echo base_url('/category')?>"> <i class="icon-grid"></i>Category</a></li>
            <li id="menuCategory"><a href="<?php echo base_url('/product')?>"> <i class="icon-grid"></i>Product</a></li>
            <!-- <li id="menuMagazine"><a href="<?php echo base_url('/magazine')?>"> <i class="icon-grid"></i>Magazine</a></li> -->
          </ul>
        </div>
      </div>
  </nav>