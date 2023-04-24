@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'All Books In Library'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Books available To Students</h6>
                    <div class="row">
                        <div class="col-4">
                            <div class="dropdown">
                                <button class="btn bg-gradient-primary dropdown-toggle w-100 text-start" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Book Categories
                                </button>
                                <ul class="dropdown-menu w-100 text-start" aria-labelledby="dropdownMenuButton">
                                    @foreach($categories_list as $category)
                                    <li><a id="category-link" class="dropdown-item" href="#" data-value="{{ $category->id }}">{{ $category->category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Book Title</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Author</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Category</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Availabe</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody id="all-books">
                                <tr class="text-center">
                                    <td colspan="99"> <i class="icon-spinner icon-spin"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="" id="categories_list" value="{{ json_encode($categories_list) }}">
</div>
@include('layouts.footers.auth.footer')
</div>
@endsection


@push('js')
    <script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        var categories_list = $('#categories_list').val();
    </script>
    <script type="text/javascript" src="{{asset('static/custom/js/script.addbook.js') }}"></script>
    <script type="text/template" id="allbooks_show">
        @include('under_source.allbooks_show')
    </script>
    <!-- <script>
        import $ from 'jquery';

        $(document).ready(function() {
            $('.category-link').click(function(e) {
                e.preventDefault();
                var category = $(this).text();
                $('#dropdownMenuButton').text(category);
            });
        });
    </script> -->
@endpush