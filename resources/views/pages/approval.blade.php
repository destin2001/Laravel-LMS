@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'All Waiting Students'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>STUDENTS WAITING FOR THEIR APPROVAL TO ACCESS LIBRARY</h6>
                    <div class="row">
                        <div class="col-4">
                            <div class="dropdown">
                                <button class="btn bg-gradient-primary dropdown-toggle w-100 text-start" type="button" id="dropdownMenuButton_branch" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Branches
                                </button>
                                <ul class="dropdown-menu w-100 text-start" aria-labelledby="dropdownMenuButton">
                                    @foreach($branch_list as $branch)
                                    <li><a class="dropdown-item branch" id="dropdown_branch" href="#" data-value="{{ $branch->id }}">{{ $branch->branch }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="dropdown">
                                <button class="btn bg-gradient-primary dropdown-toggle w-100 text-start" type="button" id="dropdownMenuButton_student_category" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Categories
                                </button>
                                <ul class="dropdown-menu w-100 text-start" aria-labelledby="dropdownMenuButton">
                                    @foreach($student_categories_list as $student_category)
                                    <li><a class="dropdown-item student_category" href="#" data-value="{{ $student_category->cat_id }}">{{ $student_category->category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="dropdown">
                                <button class="btn bg-gradient-primary dropdown-toggle w-100 text-start" type="button" id="dropdownMenuButton_year" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Years
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                    @php
                                        $current_year = date('Y');
                                        $startYear = date('Y') - 10;
                                        @endphp
                                        @for ($i = $startYear; $i <= $current_year; $i++)<li><a id="year_select" class="dropdown-item year" data-value="{{ $i }}" href="#">{{ $i }}</a></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm">
                            <button type="button" id="refresh" class="btn bg-gradient-warning w-100">Refresh</button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        First Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Last Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Roll Number</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        Branch</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Approve</th>
                                </tr>
                            </thead>
                            <tbody id="approval-table">
                                <tr class="text-center">
                                    <td colspan="99"><i class="icon-spinner icon-spin">Loading...</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="" id="branches_list" value="{{ json_encode($branch_list) }}">
    <input type="hidden" name="" id="student_categories_list" value="{{ json_encode($student_categories_list) }}">
    <input type="hidden" id="_token" data-form-field="token" value="{{ csrf_token() }}">
</div>

@include('layouts.footers.auth.footer')
</div>
@endsection

@push('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" integrity="sha512-jGR1T3dQerLCSm/IGEGbndPwzszJBlKQ5Br9vuB0Pw2iyxOy+7AK+lJcCC8eaXyz/9du+bkCy4HXxByhxkHf+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        var branches_list = $('#branches_list').val(),
            categories_list = $('#student_categories_list').val(),
            _token = $('#_token').val();
    </script>
    <script type="text/javascript" src="{{asset('static/custom/js/script.student-approval.js') }}"></script>
    <script type="text/template" id="approvalstudents_show">
        @include('under_source.approvalstudents_show')
    </script>
@endpush