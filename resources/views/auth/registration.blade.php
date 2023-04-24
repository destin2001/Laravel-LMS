@extends('layouts.app')

@section('content')
@include('layouts.navbars.guest.navbar')
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-7 mx-auto">
                <div class="card card-blur z-index-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-lg-3">
                                <h3 class="text-lg">Student Registration Form</h3>
                                <p>Please fill out all the fields.</p>
                            </div>
                            <div class="col-sm">
                                <form class="form-vertical">
                                    <div class="row">
                                        <div class="flex flex-col col-8 mb-3">
                                            <label for="example-text-input" class="form-control-label">First Name</label>
                                            <input type="text" id="first" name="first" class="form-control" data-form-field="first" placeholder="First Name" aria-label="FirstName" value="{{ Request::old('first') }}">
                                            <input type="hidden" data-form-field="token" value="{{ csrf_token() }}">
                                        </div>
                                        <div class="flex flex-col col-4 mb-3">
                                            <label for="example-text-input" class="form-control-label">Last Name</label>
                                            <input type="text" id="last" name="last" class="form-control" placeholder="Last Name" data-form-field="last" aria-label="LastName" value="{{ Request::old('last') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="flex flex-col col mb-3">
                                            <label for="example-text-input" class="form-control-label">Roll Number</label>
                                            <input type="number" id="rollnumber" name="rollnumber" class="form-control" placeholder="Roll Number" data-form-field="rollnumber" aria-label="RollNumber" value="{{ Request::old('rollnumber') }}">
                                        </div>
                                        <div class="flex flex-col col-6 mb-3">
                                            <label for="example-text-input" class="form-control-label">Select Branch</label>
                                            <select tabindex="1" class="form-control" name="branch" data-form-field="branch" id="choices-button" placeholder="Select Branch" data-placeholder="Select Branch">
                                                <option value="0">Select Branch</option>
                                                @foreach($branch_list as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex flex-col col mb-3">
                                            <label for="example-text-input" class="form-control-label">Year</label>
                                            <select tabindex="1" class="form-control" name="year" data-form-field="year" id="choices-button1" placeholder="Year" data-placeholder="Select Year" data-value="{{ Request::old('year') }}">
                                                <option value="0">Select Year</option>
                                                @php
                                                $current_year = date('Y');
                                                $startYear = date('Y') - 10;
                                                @endphp
                                                @for ($i = $startYear; $i <= $current_year; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="flex flex-col col-8 mb-3">
                                            <label for="example-text-input" class="form-control-label">Email Address</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="email@st.huflit.edu.vn" data-form-field="email" aria-label="Email" value="{{ Request::old('email') }}">
                                        </div>
                                        <div class="flex flex-col col-4 mb-3">
                                            <label for="example-text-input" class="form-control-label">Select Student Category</label>
                                            <select tabindex="1" class="form-control" name="category" data-form-field="category" id="choices-button2" placeholder="Select Category" data-form-field="category" data-placeholder="Select category..">
                                                <option value="0">Select Category</option>
                                                @foreach($student_categories_list as $student_category)
                                                <option value="{{ $student_category->cat_id }}">{{ $student_category->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-primary my-4 mb-2" id="addstudents">Registration</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('static/custom/js/script.addstudent.js') }}"></script>
@endpush