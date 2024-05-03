<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Star2</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <span>
                    @if(Auth::user()->is_admin == '1')
                    Admin
                    @else
                    Customer
                    @endif
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('admin.dashboard')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <a href="{{route('admin.sliders')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.sliders' ? 'active' : '' }}"><i class="fa fa-images me-2"></i>Sliders</a>
            
            <a href="{{route('admin.products')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.products' ? 'active' : '' }}"><i class="fa fa-cog me-2"></i>Solutions</a>
            
            <a href="{{route('admin.skills')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.skills' ? 'active' : '' }}"><i class="fa fa-bolt me-2"></i>Skills</a>
            
            <a href="{{route('admin.web.contents')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.web.contents' ? 'active' : '' }}"><i class="fa fa-globe me-2"></i>Web Contents</a>

            <a href="{{route('admin.texts')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.texts' ? 'active' : '' }}"><i class="fa fa-font me-2"></i>Texts</a>
            
            <a href="{{route('admin.blogs')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.blogs' ? 'active' : '' }}"><i class="fa fa-video me-2"></i>Blogs</a>
        
            <a href="{{route('admin.testimonials')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.testimonials' ? 'active' : '' }}"><i class="fa fa-star me-2"></i>Testimonials</a>
        
            <a href="{{route('admin.giveaways')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.giveaways' ? 'active' : '' }}"><i class="fa fa-gift me-2"></i>Giveaways</a>
        
            <a href="{{route('admin.faculties')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.faculties' ? 'active' : '' }}"><i class="fa fa-user me-2"></i>Faculties</a>
           
            <a href="{{route('admin.jobs')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.jobs' ? 'active' : '' }}"><i class="fa fa-briefcase me-2"></i>Jobs</a>
        </div>
    </nav>
</div>