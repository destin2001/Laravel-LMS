@extends('account.index')

@section('content')
	<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
		<div class="container max-w-screen-lg mx-auto">
			<div>

				<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
					<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
						<div class="text-gray-600">
							<p class="font-medium text-lg">Student Registration Form</p>
							<p>Please fill out all the fields.</p>
						</div>

						
									</div>
									<div class="inline-flex items-end">
										<button class="bg-brown-500 hover:bg-brown-700 text-white font-bold py-2 px-4 rounded">
											<a href="{{ URL::route('account-sign-in') }}">Go Back!</a>
										</button>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@stop