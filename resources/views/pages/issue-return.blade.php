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
            <div class="card card-profile ">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <a href="javascript:;" class="d-block">
                        <img src="./assets/img/kit/pro/anastasia.jpg" class="img-fluid border-radius-lg">
                    </a>
                </div>

                <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span>
                    <a href="javascript:;" class="card-title h5 d-block text-darker">
                        Shared Coworking
                    </a>
                    <p class="card-description mb-4">
                        Use border utilities to quickly style the border and border-radius of an element. Great for images, buttons.
                    </p>
                    <div class="author align-items-center">
                        <img src="./assets/img/kit/pro/team-2.jpg" alt="..." class="avatar shadow">
                        <div class="name ps-3">
                            <span>Mathew Glock</span>
                            <div class="stats">
                                <small>Posted on 28 February</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>
@endsection

@push('js')
    <script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('static/custom/js/script.logs.js') }}"></script>
    <script type="text/template" id="all_logs_display">
        @include('under_source.all_logs_display')
    </script>
@endpush