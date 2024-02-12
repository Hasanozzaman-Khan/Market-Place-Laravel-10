<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic-category" aria-expanded="false" aria-controls="ui-basic-category">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">Add Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">Manage Category</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic-subcategory" aria-expanded="false" aria-controls="ui-basic-subcategory">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Subcategory</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-subcategory">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.create')}}">Add Subcategory</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.index')}}">Manage Subcategory</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic-childcategory" aria-expanded="false" aria-controls="ui-basic-childcategory">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Childcategory</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-childcategory">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('childcategory.create')}}">Add Childcategory</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('childcategory.index')}}">Manage Childcategory</a></li>
          </ul>
        </div>
      </li>


      <!-- <li class="nav-item2">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">UI Elements 2</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons1</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography1</a></li>
          </ul>
        </div>
      </li> -->


      <li class="nav-item">
        <a class="nav-link" href="{{route('all-ads.index')}}">
          <i class="mdi mdi-account-multiple"></i>
          <span class="menu-title"> All Advertisement</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('all-reported-ads.index')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">All Reported Ads</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li> -->

      <!-- <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li> -->

      <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li> -->

      <!-- <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> -->

    </ul>
  </nav>
