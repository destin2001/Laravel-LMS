@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Add Settings'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add School Branches</h6>
                </div>
                <div class="card-body">
                    <form class="form-horizontal row-fluid">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Branch Name</label>
                                <input class="form-control" type="text" id="branch" data-form-field="branch" placeholder="Enter branch here...">
                                <input type="hidden" data-form-field="token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        </br>
                        <div class="row justify-content-lg-end px-4">
                            <button type="button" class="btn btn-success mw-140px" id="addBranch">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Add Branch</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>All Branches</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Branch</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody id="all-branch">
                                <tr class="text-center">
                                    <td colspan="99"> <i class="icon-spinner icon-spin">Loading...</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Student Categories</h6>
                </div>
                <div class="card-body">
                    <form class="form-horizontal row-fluid">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Student Category</label>
                                <input class="form-control" type="text" id="student_category" data-form-field="student_category" placeholder="Enter the category of the student here...">
                                <input type="hidden" data-form-field="token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Max Allow</label>
                                <input class="form-control" type="number" id="max_allow" data-form-field="max_allowed" placeholder="Enter the max allow value">
                            </div>
                        </div>
                        </br>
                        <div class="row justify-content-lg-end px-4">
                            <button type="button" class="btn btn-success mw-250px" id="addStudentCategory">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Add Student Category</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>All Student Categories</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Category</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Max Allowed</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody id="all-student-category">
                                <tr class="text-center">
                                    <td colspan="99"> <i class="icon-spinner icon-spin">Loading...</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
<script type="text/javascript" src="{{ asset('static/custom/js/script.settings.js') }}"></script>
<script type="text/template" id="allbranch_show">
    @include('under_source.allbranch_show')
</script>
<script type="text/template" id="allstudentcategory_show">
    @include('under_source.allstudentcategory_show')
</script>
@endpush