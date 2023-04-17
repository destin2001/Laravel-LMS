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
                <div class="card z-index-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-lg-3">
                                <h3 class="text-lg">Student Registration Form</h3>
                                <p>Please fill out all the fields.</p>
                            </div>
                            <div class="col-sm">
                                <form method="POST" action="{{ route('register.perform') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="flex flex-col col-8 mb-3">
                                            <label for="example-text-input" class="form-control-label">First Name</label>
                                            <input type="text" name="firstname" class="form-control" placeholder="First Name" aria-label="FirstName" value="{{ old('first_name') }}">
                                            @if($errors->has('first'))
                                            {{ $errors->first('first')}}
                                            @endif
                                        </div>
                                        <div class="flex flex-col col-4 mb-3">
                                            <label for="example-text-input" class="form-control-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" aria-label="LastName" value="{{ old('last_name') }}">
                                            @if($errors->has('last'))
                                            {{ $errors->first('last')}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="flex flex-col col mb-3">
                                            <label for="example-text-input" class="form-control-label">Roll Number</label>
                                            <input type="number" name="password" class="form-control" placeholder="Roll Number" aria-label="RollNumber">
                                            @if($errors->has('rollnumber'))
                                            {{ $errors->first('rollnumber')}}
                                            @endif
                                        </div>
                                        <div class="flex flex-col col-6 mb-3">
                                            <label for="example-text-input" class="form-control-label">Select Branch</label>
                                            <select tabindex="1" class="form-control" name="choices-button" data-form-field="branch" id="choices-button branch" placeholder="Select Branch" data-placeholder="Select Branch">
                                                <option value="0">Select Branch</option>
                                                @foreach($branch_list as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('branch'))
                                            {{ $errors->first('branch')}}
                                            @endif
                                        </div>
                                        <div class="flex flex-col col mb-3">
                                            <label for="example-text-input" class="form-control-label">Year</label>
                                            <select tabindex="1" class="form-control" name="choices-button" data-form-field="year" id="choices-button publish_year" placeholder="Year" data-placeholder="Select Year">
                                                <option value="0">Select Year</option>
                                                @php
                                                $current_year = date('Y');
                                                $startYear = date('Y') - 10;
                                                @endphp
                                                @for ($i = $startYear; $i <= $current_year; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @if($errors->has('year'))
                                            {{ $errors->first('year')}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="flex flex-col col-8 mb-3">
                                            <label for="example-text-input" class="form-control-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" placeholder="email@st.huflit.edu.vn" aria-label="Name" value="{{ Request::old('email') }}">
                                            @if($errors->has('email'))
									        {{ $errors->first('email')}}
									        @endif
                                        </div>
                                        <div class="flex flex-col col-4 mb-3">
                                            <label for="example-text-input" class="form-control-label">Select Student Category</label>
                                            <select tabindex="1" class="form-control" name="choices-button" data-form-field="category" id="choices-button category" placeholder="Select Category" data-placeholder="Select category..">
                                            <option value="0">Select Category</option>
                                            @foreach($student_categories_list as $student_category)
                                                <option value="{{ $student_category->cat_id }}">{{ $student_category->category }}</option>
                                            @endforeach
                                        </div>
                                    </select>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn bg-gradient-dark  my-4 mb-2">Registration</button>
                                        @csrf
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
@include('layouts.footers.guest.footer')
@endsection