<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto menu3">
                            <li class="nav-item">
                                <a class="nav-link me-2 nav-animate" href="{{ route('book') }}">
                                    <i class="ni ni-book-bookmark opacity-6 text-dark me-1"></i>
                                    Search Books
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 nav-animate" href="{{ route('student-registration') }}">
                                    <i class="ni ni-hat-3 opacity-6 text-dark me-1"></i>
                                    Student Registration
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 nav-animate" href="{{ route('login') }}">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Sign In
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 nav-animate" href="{{ route('register') }}">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Sign Up
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 nav-animate" href="{{ route('student-registration') }}">
                                    <i class="ni ni-pin-3 opacity-6 text-dark me-1"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>

@push('js')
<script type="text/javascript">
    const toggleMenu = () => document.body.classList.toggle("open");
</script>
@endpush