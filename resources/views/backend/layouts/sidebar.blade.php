


<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{ route('dashboard') }}"> <img src="{{asset('backend/assets/images/logo.svg')}}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('backend/assets/images/logo-mini.svg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('backend/assets/images/faces/face15.jpg') }}">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
              <span>Gold Member</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      @if (Auth()->user()->category==1)
         <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">All Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('subcategory.index') }}">Sub-Category</a></li>
          </ul>
        </div>
      </li>
      @else
        
      @endif
      {{-- All Category Sidebar --}}

     
      @if (Auth()->user()->division==1)
      {{-- All District Sidebar --}}
      <li class="nav-item menu-items"> 
        <a class="nav-link" data-toggle="collapse" href="#district" aria-expanded="false" aria-controls="district">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Divisions & Districts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="district">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('district.index') }}">All Divisions</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('subdistrict.index') }}">All Districts</a></li>
          </ul>
        </div>
      </li>
      @else
        
      @endif

      @if (Auth()->user()->post==1)
       {{-- All News Post Sidebar --}}
       <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#post" aria-expanded="false" aria-controls="post">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">All Posts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="post">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('news.post.create.index') }}">Create post</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('news.post.index') }}">All Post</a></li>
          </ul>
        </div>
      </li>
      @else
        
      @endif

      @if (Auth()->user()->setting==1)
        {{-- All Setting Sidebar --}}

      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#social" aria-expanded="false" aria-controls="social">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">All Setting</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="social">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('social.link.edit') }}">Social Setting</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('seo.link.edit') }}">Seo Setting</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('prayer.link.edit') }}">Prayer Setting</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('livetv.link.edit') }}">Live Tv Setting</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('notice.link.edit') }}">Notice Setting</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('website.link.edit') }}">Website Setting</a></li>  
          </ul>
          
        </div>
      </li>
      @else
        
      @endif
 
      @if (Auth()->user()->website==1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#website" aria-expanded="false" aria-controls="website">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title">Important Website</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="website">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('website.index') }}"> All Website </a></li>
          </ul>
        </div>
      </li>
      @else
        
      @endif
      
      @if (Auth()->user()->gallery==1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title"> Gallery </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="gallery">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('photo.gallery.index') }}"> Photo Gallery </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('video.gallery.index') }}"> Video Gallery </a></li>
          </ul>
        </div>
      </li>
      @else
        
      @endif
    
      @if (Auth()->user()->advertisement==1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ads" aria-expanded="false" aria-controls="ads">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Advertisement</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ads">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('all.ads.index') }}">All Ads</a></li>
          </ul>      
        </div>
      </li>
      @else
        
      @endif

      @if (Auth()->user()->role==1)
        <li class="nav-item menu-items">
         <a class="nav-link" data-toggle="collapse" href="#role" aria-expanded="false" aria-controls="role">
           <span class="menu-icon">
             <i class="mdi mdi-laptop"></i>
           </span>
           <span class="menu-title">All User</span>
           <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="role">
           <ul class="nav flex-column sub-menu">
             <li class="nav-item"> <a class="nav-link" href="{{ route('create.role.index') }}">Add User Role</a></li>
             <li class="nav-item"> <a class="nav-link" href="{{ route('user.role.index') }}">All User</a></li>
            </ul>
         </div>
       </li>
       @else
        
       @endif

  </ul>

 
  </nav>