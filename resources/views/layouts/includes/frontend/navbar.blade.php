
<nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{route('welcome')}}" class="navbar-brand p-0">
        <!-- <h1 class="text-primary m-0"><i class="fas fa-star-of-life me-3"></i>Terapia</h1> -->
        <img src="{{asset('frontend/img/logo.png')}}" alt="Logo" height="100px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{route('welcome')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}">Home</a>
            <!-- <a href="about.php" class="nav-item nav-link">About</a> -->

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                <div class="dropdown-menu m-0">
                    <a href="{{route('about')}}" class="dropdown-item">Who we are</a>
                    <a href="{{route('mission')}}" class="dropdown-item">Mission Statement</a>
                    <a href="{{route('vision')}}" class="dropdown-item">Our Vision</a>
                    <a href="{{route('csr')}}" class="dropdown-item">CSR (Corporate Social Responsibility)</a>
                    <a href="{{route('faculties')}}" class="dropdown-item">Faculty</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Solutions</a>
                <div class="dropdown-menu m-0">
                    @foreach($products as $solution)
                    <a href="{{ route('solution.details', ['slug' => $solution->slug] )}}" class="dropdown-item">{{ $solution->name}}</a>
                    @endforeach
                    <a href="{{route('powerskills')}}" class="dropdown-item">Powerskills</a>
                    <a href="{{route('corporate.giveaways')}}" class="dropdown-item">Corporate Giveaways</a>
                </div>
            </div>
            <a href="{{route('blogs')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'blogs' ? 'active' : '' }}">Insights</a>
            <a href="{{route('testimonials')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'testimonials' ? 'active' : '' }}">Our Partners</a>
            <a href="{{route('career')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'career' ? 'active' : '' }}">Careers</a>
        </div>
        <a href="{{route('contact')}}" class="btn btn-primary plan-meeting rounded-pill py-2 px-4 flex-wrap flex-sm-shrink-0">Plan a Meeting</a>
    </div>
</nav>


