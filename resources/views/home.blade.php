@extends('layouts.layouts.layout')
@section('content')
@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
	<strong>{{ Session::get('message') }}</strong>
	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>	  
  </div>
@endif
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">			
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">
		<!--begin::Row-->
			<div class="row gy-5 g-xl-8">
				<!--begin::Col-->
				<div class="col-xl-12">
					<!--begin::Tables Widget 9-->
					<div class="card card-xl-stretch mb-5 mb-xl-8">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder fs-3 mb-1">User</span>								
							</h3>							
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-3">
							<!--begin::Table container-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
									<!--begin::Table head-->
									<thead>
										<tr class="fw-bolder text-muted align-items-center">											
											<th class="min-w-30px">No</th>	
											<th class="min-w-200px">Name</th>																
											<th class="min-w-100">Email</th>
											<th class="min-w-200px">Birthday</th>
											<th class="min-w-200px">Phone Number</th>
											<th class="min-w-200px">National Number</th>
											<th class="min-w-200px">Address</th>											
											<th class="min-w-200px">Action</th>
										</tr>
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody>
										@foreach($users as $user)
										<tr>											
											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{$loop->index+1}}</span>
											</td>

											<td>
												<div class="d-flex align-items-center">

												<!-- image upload in firebase store -->
													<div class="symbol symbol-45px me-5">
														<img src="{{ $user->data()['featuredImage'] }}" alt="" />
													</div>
													<div class="d-flex justify-content-start flex-column">
														<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $user->data()['name'] }}</a>														
													</div>
												</div>
											</td>							

											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->data()['email'] }}</span>
											</td>

											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->data()['dateBirth'] }}</span>
											</td>

											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->data()['phoneNumber'] }}</span>
											</td>
											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->data()['nationalNumber'] }}</span>
											</td>

											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{ $user->data()['address'] }}</span>
											</td>
											
											<td>											
												<div class="d-flex justify-content-end flex-shrink-0">
													<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#view_user{{$user->id()}}">
														<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor" />
																<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													
													<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#delete_user{{ $user->id() }}">
														<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
												</div>
												<!--user delete modal -->
												<div id="delete_user{{ $user->id() }}" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
													<div class="modal-dialog modal-dialog-centered" style="width:55%;">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>																
															</div>
															<div class="modal-body">
																<p>Do you want to delete this record?</p>
															</div>
															<div class="modal-footer">
															<button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"	data-bs-dismiss="modal">Close</button>
															<form method="POST"  action="{{route('user_del')}}" enctype="multipart/form-data">
																@csrf																
																<input type="hidden" value="{{  $user->id() }}" name="delete_id">
																<button type="submit" class="btn btn-danger waves-effect waves-light deleteRecord" value="Delete">Delete</button>
															</form>	
															</div>
														</div>
													</div>
												</div>	
												<!--view user modal-->												
												<div class="modal fade" id="view_user{{ $user->id() }}" tabindex="-1" aria-hidden="true">
													<!--begin::Modal dialog-->
													<div class="modal-dialog mw-800px">
														<!--begin::Modal content-->
														<div class="modal-content">
															<!--begin::Modal header-->						
															<div class="modal-header pb-0 border-0 justify-content-end">
																<h1 style="margin-right: 291px">View User</h1>								
																<!--begin::Close-->
																<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
																	<span class="svg-icon svg-icon-1">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																			<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</div>
																<!--end::Close-->
															</div>
															<hr>
															<!--begin::Modal header-->															
														</div>
														<!--end::Modal content-->
													</div>
													<!--end::Modal dialog-->
												</div>						
												<!--end view user modal-->
											</td>
										</tr>
										@endforeach
										
									</tbody>
									<!--end::Table body-->
								</table>
								<!--end::Table-->
							</div>
							<!--end::Table container-->
						</div>
						<!--begin::Body-->
					</div>
					<!--end::Tables Widget 9-->
				</div>
				<!--end::Col-->
			</div>
			<!--end::Row-->					
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
	<!--end::Content-->

@endsection
@section('extend_js')

	@include('js.home_js')
		
@endsection