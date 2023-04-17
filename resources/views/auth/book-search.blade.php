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
					<div class="card-header pb-0">
						<form class="form-horizontal row-fluid">
							<h6>NAME OR AUTHOR OF THE BOOK</h6>
							<div class="row">
								<div class="col ">
									<input type="text" name="text_book" class="form-control" placeholder="Search Book" aria-label="TextBook">
								</div>
								<div class="col col-lg-2">
									<button type="button" id="search_book_button" class="btn bg-gradient-warning w-100">Search Book</button>
								</div>
							</div>
						</form>
					</div>
					<div class="card-body" style="display: none;">
						<div class="table-responsive p-0">
							<table class="table align-items-center mb-0">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
											Book ID</th>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
											Book Title</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
											Author</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
											Description</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
											Publisher</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
											Publish Year</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
											Category</th>
										<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
											Status</th>
									</tr>
								</thead>
								<tbody id="book-results">
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
</main>
@include('layouts.footers.guest.footer')
@endsection

@push('js')
<script type="text/javascript">
	var categories_list = $('#categories_list').val();
</script>
<script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>
<script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{  asset('static/custom/js/script.searchbook.js') }}"></script>

<script type="text/template" id="search_book">
	@include('under_source.search_book')
</script>
@endpush