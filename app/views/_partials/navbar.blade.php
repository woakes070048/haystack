<!-- Mainbar starts -->
<div class="mainbar">
  <!-- Mainbar head starts -->
  <div class="main-head">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-6">
          <!-- Page title -->
          @yield('page-section')
        </div>
        
        <div class="col-md-3 col-sm-4 col-xs-6"></div>
        
        <div class="col-md-3 col-sm-4 hidden-xs"></div>
        
        <div class="col-md-3 hidden-sm hidden-xs">
          <div class="head-user dropdown pull-right">
            <a href="#" data-toggle="dropdown" id="profile">
              <i class="fa fa-user"></i> {{ $current_user->first_name }}
              <i class="fa fa-caret-down"></i> 
            </a>
            <ul class="dropdown-menu" aria-labelledby="profile">
              <li><a href="/account/settings">Settings</a></li>
              <li><a href="/logout">Sign Out</a></li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>  
    </div>
  </div>
<!-- kept open for content -->