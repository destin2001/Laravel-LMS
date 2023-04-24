@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Issue / Return Books'])
<div class="card shadow-lg mx-4 card-profile-bottom">
</div>
<div id="alert">
    @include('components.alert')
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Issue A New Book</hh6>
                    </div>
                    <form class="form-horizontal row-fluid">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Student ID</label>
                                <input class="form-control" type="number" id="issue_student_id" data-form-field="student-issue-id" placeholder="Enter the student code here">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Book ID</label>
                                <input class="form-control" type="number" id="issue_book_id" data-form-field="book-issue-id" placeholder="Enter the book code here">
                            </div>
                        </div>
                        </br>
                        <div class="row justify-content-lg-end px-3">
                            <button type="button" class="btn btn-success mw-140px" id="issuebook">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Issue Book</span>
                            </button>
                        </div>
                    </form>
                    <hr class="horizontal dark">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Return A Book</hh6>
                    </div>
                    <form class="form-horizontal row-fluid">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Book ID</label>
                                <input class="form-control" type="number" id="return_book_id" data-form-field="book-issue-id" placeholder="Enter the book code here">
                            </div>
                        </div>
                        </br>
                        <div class="row justify-content-lg-end px-3">
                            <button type="button" class="btn btn-success mw-140px" id="returnbook">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Return Book</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <input type="hidden" id="_token" data-form-field="token" value="{{ csrf_token() }}">
        </div>
        <div class="col-md-4">
        <div class="card card-carousel overflow-hidden h-100 p-0">
                <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner border-radius-lg h-100">
                        <div class="carousel-item h-100 active" style="background-image: url('./img/carousel-1.jpg');
            background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                    <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                </div>
                                <h5 class="text-white mb-1">Get manage your library</h5>’
                                <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('./img/carousel-2.jpg');
            background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                </div>
                                <h5 class="text-white mb-1">Faster way to create web pages</h5>
                                <p>That’s my skill. I’m not really specifically talented at anything except for the
                                    ability to learn.</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('./img/carousel-3.jpg');
            background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                    <i class="ni ni-trophy text-dark opacity-10"></i>
                                </div>
                                <h5 class="text-white mb-1">Share with us your design tips!</h5>
                                <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>
@endsection

@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('static/custom/js/script.logs.js') }}"></script>
    <script type="text/template" id="all_logs_display">
        @include('under_source.all_logs_display')
    </script>
@endpush