    
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-category">HOME</li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li> 
          <li class="nav-item nav-category">PRODUCTS</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('category.create')}}">Add Category</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('category.index')}}">View Category</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('sub-category.create')}}">Add Sub Category</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('sub-category.index')}}">View Sub Category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#attrubutes" aria-expanded="false" aria-controls="attrubutes">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Attributes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="attrubutes">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('attribute.create')}}">Add Attribute</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('attribute.index')}}">View Attribute</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('product.create')}}">Add Products </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}">View Products </a></li>
              </ul>
            </div>
          </li> 

          <li class="nav-item nav-category">MANAGEMENT</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#site" aria-expanded="false" aria-controls="site">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Site Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="site">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('page.index')}}">Pages</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('faq.index')}}">Faq's</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('home-page.index')}}">Home Page Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('settings.index')}}">General Settings</a></li>
              </ul>
            </div>
          </li> 
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">User Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('user.index')}}">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact.index')}}">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="">News Letters</a></li>
              </ul>
            </div>
          </li> 
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Order Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="orders">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('admin.orders')}}">Orders</a></li> 
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#apiSettings" aria-expanded="false" aria-controls="apiSettings">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">API Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="apiSettings">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('admin.paymentgateway')}}">Payment Gateway</a></li> 
                <li class="nav-item"><a class="nav-link" href="">Shipping <span id="badge">(comming soon)</span></a> </li> 
              </ul>
            </div>
          </li>
 
        </ul>
      </nav>
      <!-- partial -->