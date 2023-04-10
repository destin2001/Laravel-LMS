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
                            <tbody>
                                @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $branch->id }}</td>
                                    <td>{{ $branch->branch }}</td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href=""><i class="icon-edit"></i></a>

                                            <a href="#" data-toggle="modal" data-target="#deleteBranch{{ $branch->id }}"><i class="icon-trash"></i></a>

                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteBranch{{ $branch->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Branch</h5>

                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('student.destroy', $branch->id) }}" method="Post">
                                                    @csrf
                                                    @method('Delete')
                                                    <p>Are you sure you want to delete this ({{ $branch->branch }}) Branch ? </p>
                                                    <input type="hidden" name="branch" id="branch" value="{{ $branch->branch }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
                            <tbody>
                                @foreach ($student_category as $student_category)
                                <tr>
                                    <td>{{ $student_category->cat_id }}</td>
                                    <td>{{ $student_category->category }}</td>
                                    <td>{{ $student_category->max_allowed }}</td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href=""><i class="icon-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#deleteCategory{{ $student_category->cat_id }}"><i class="icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteCategory{{ $student_category->cat_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Student Category</h5>

                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('student.destroy', $student_category->cat_id) }}" method="Post">
                                                    @csrf
                                                    @method('Delete')
                                                    <p>Are you sure you want to delete this ({{ $student_category->category }}) Student Category ? </p>
                                                    <input type="hidden" name="category" id="category" value="{{ $student_category->category }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
<script type="text/javascript" src="{{ asset('static/custom/js/script.settings.js') }}"></script>
@endpush