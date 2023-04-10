@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Add Books Category'])
<div class="card shadow-lg mx-4 card-profile-bottom">
</div>
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">All Books Category</h6>
                </div>
                <div class="card-body p-3">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Category</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="all-category">
                            <tr class="text-center">
                                <td colspan="99"> <i class="icon-spinner icon-spin">Loading...</i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Add Books Category</hh6>
                    </div>

                </div>
                <div class="card-body">
                    <form class="form-horizontal row-fluid">
                        <div class="row">
                            <div class="col-md-12 tab-pane">
                                <div class="form-group">
                                    <input id="category" class="form-control" data-form-field="category" type="text" placeholder="Enter the category of the book here...">
                                    <input type="hidden" data-form-field="token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-success" id="addbookcategory">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                    <span class="btn-inner--text">Add Category</span>
                                </button>
                            </div>
                        </div>
                    </form>
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

<script type="text/javascript" src="{{ asset('static/custom/js/script.addbookcategory.js') }}"></script>
<script type="text/template" id="allcategory_show">
    @include('under_source.allcategory_show')
</script>
@endpush