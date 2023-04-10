@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Add Books'])
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
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Add Books</hh6>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Book Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Title of book</label>
                                <input class="form-control" type="text" id="title" data-form-field="title" placeholder="Enter the title of the book here...">
                                <input type="hidden" data-form-field="token" value="{{ csrf_token() }}">
                                <input type="hidden" data-form-field="auth_user" value="{{ auth()->user()->id }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Author name</label>
                                <input class="form-control" type="text" id="author" data-form-field="author" placeholder="Enter the name of author for the book here...">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description of Book</label>
                                <textarea class="form-control" id="description" data-form-field="description" rows="5" placeholder="Enter few lines about the book here" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Category</label>
                                <select tabindex="1" class="form-control" name="choices-button" id="choices-button category" placeholder="Departure" data-placeholder="Select category..">
                                    @foreach($categories_list as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Number of issues</label>
                                <input class="form-control" id="number" type="number" data-form-field="number" placeholder="How many issues are there?">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row justify-content-lg-end px-3">
                        <button type="button" class="btn btn-success mw-140px" id="addbooks">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Add Books</span>
                        </button>
                    </div>
                </div>
            </div>
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