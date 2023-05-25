@extends('layouts.layouts.layout')
@section('content')
<!--begin::Content-->
{{-- Error and Status Card --}}

@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
	<strong>{{ Session::get('message') }}</strong>
	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>	  
  </div>
@endif

@if ($errors->any())
  @foreach ($errors->all() as $error)
	<div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
	  <strong>{{$error}}</strong>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
  @endforeach
@endif

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
								<span class="card-label fw-bolder fs-3 mb-1">Motorcycles</span>
								<!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span> -->
							</h3>
							<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a motorcycle">
								<a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
								<span class="svg-icon svg-icon-3">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
										<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->New Motorcycle</a>
							</div>
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
											<th class="w-25px">
												<div class="form-check form-check-sm form-check-custom form-check-solid">
													<input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
												</div>
											</th>
											<th class="min-w-25px">No</th>	
											<th class="min-w-225px">Frame Number</th>																
											<th class="min-w-100">Product Year</th>
											<th class="min-w-200px">Brand</th>											
											<th class="min-w-50px">Actions</th>
										</tr>
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody>
										@foreach($motors as $motor)
										<tr>
											<td>
												<div class="form-check form-check-sm form-check-custom form-check-solid">
													<input class="form-check-input widget-9-check" type="checkbox" value="1" />
												</div>
											</td>
											<td>
											<span class="text-muted fw-bold text-muted d-block fs-7">{{++$i}}</span>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="symbol symbol-45px me-5">
														<img src="{{ $motor->data()['featuredImage'] }}" alt="" />
													</div>
													<div class="d-flex justify-content-start flex-column">
														<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $motor->data()['frameNumber'] }}</a>
													
													</div>
												</div>
											</td>
											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{ $motor->data()['productionYear'] }}</span>
											</td>

											<td>												
												<span class="text-muted fw-bold text-muted d-block fs-7">{{ $motor->data()['brand'] }}</span>
											</td>											
											<td>
												<div class="d-flex justify-content-end flex-shrink-0">
													<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#view_motor{{ $motor->id() }}" >														
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor" />
																<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#update{{ $motor->id() }}">
														<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
																<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#delete_motor{{ $motor->id() }}">
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

												<!--begin::motor view Modals-->
												<div class="modal fade" id="view_motor{{$motor->id()}}" tabindex="-1" aria-hidden="true">
																<!--begin::Modal dialog-->
													<div class="modal-dialog mw-800px">
														<!--begin::Modal content-->
														<div class="modal-content">
															<!--begin::Modal header-->
														
															<div class="modal-header pb-0 border-0 justify-content-end">
																<h1 style="margin-right: 291px">View Motorcycle</h1>
																
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
															<!--begin::Modal body-->
															<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">

																<div class="container mt-3">							
																	<form method="POST"  action="{{route('view_motor')}}" enctype="multipart/form-data">
																	@csrf
																	<input type="hidden" value="{{  $motor->id() }}" name="view_id">
																		<div class="row">												
																			<div class="col-md-12 mb-3 mt-3" disabled>
																				<div class="picture-container">
																					<div class="picture">
																						<img src="{{ $motor->data()['featuredImage'] }}" class="picture-src" id="wizardPicturePreview" title="" disabled>
																						<!-- <input type="file" id="wizard-picture" class=""> -->
																					</div>
																					<h6 class="">Motorcycle Image</h6>																		
																				</div>
																			</div>
																			
																		</div>
																		<div class="row">
																			<div class=" col-md-6 mb-3 mt-3">
																				<input type="text" class="form-control" id="frameNumber" placeholder="Frame Number" value="{{ $motor->data()['frameNumber'] }}" name="frameNumber" disabled>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="productionYear" placeholder="productYear" value="{{ $motor->data()['productionYear'] }}"  name="productionYear" disabled>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="brand" placeholder="Brand" name="brand" value="{{ $motor->data()['brand'] }}"  disabled>
																			</div>																			
																			<div class=" col-md-6 mb-3 mt-3">
																				<input type="text" class="form-control" id="type" placeholder="type" name="type" value="{{ $motor->data()['type'] }}"  disabled>																				
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="EngineNumber" value="{{ $motor->data()['EngineNumber'] }}"  placeholder="Engine Number" name="EngineNumber" disabled>
																			</div>
																			
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="LastUpdate" name="LastUpdate" value="{{ $motor->data()['LastUpdate'] }}"  placeholder="LastUpdate" disabled>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="lastmeterreading" value="{{ $motor->data()['lastmeterreading'] }}"  placeholder="last meter reading" name="lastmeterreading" disabled>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="currentowner" value="{{ $motor->data()['currentowner'] }}"  placeholder="current owner" name="currentowner" disabled>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="specialRequirement" value="{{ $motor->data()['specialRequirement'] }}"  placeholder="Special Requirements" name="specialRequirement" disabled>
																			</div>	
																				
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="mainColor" value="{{ $motor->data()['mainColor'] }}"  placeholder="MainColor" name="mainColor" disabled>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="secondaryColor" value="{{ $motor->data()['secondaryColor'] }}"  placeholder="Secondray Color" name="secondaryColor" disabled>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="end_licence" value="{{ $motor->data()['end_licence'] }}"  placeholder="end of licence" name="end_licence" disabled>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="plate_number" value="{{ $motor->data()['plate_number'] }}"  placeholder="plate number" name="plate_number" disabled>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="location" value="{{ $motor->data()['location'] }}"  placeholder="location" name="location" disabled>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="numPassengers"  value="{{ $motor->data()['numPassengers'] }}" placeholder="number of passenger" name="numPassengers" disabled>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="loadCapacitor" value="{{ $motor->data()['loadCapacitor'] }}"  placeholder="load capacity" name="loadCapacitor" disabled>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="amount" value="{{ $motor->data()['amount'] }}"  placeholder="amount" name="amount" disabled>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="price" value="{{ $motor->data()['price'] }}"  placeholder="Price" name="price" disabled>
																			</div>								
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="rating" value="{{ $motor->data()['rating'] }}"  placeholder="Rating" name="rating" disabled>
																			</div>
																		</div>																									
																	</form>							
																</div>						
															</div>
															<!--end::Modal body-->
														</div>
														<!--end::Modal content-->
													</div>
													<!--end::Modal dialog-->
												</div>
												<!--end::Modals-->
												<!--begin::motor edit Modals-->
												<div class="modal fade" id="update{{ $motor->id() }}" tabindex="-1" aria-hidden="true">
																<!--begin::Modal dialog-->
													<div class="modal-dialog mw-800px">
														<!--begin::Modal content-->
														<div class="modal-content">
															<!--begin::Modal header-->
														
															<div class="modal-header pb-0 border-0 justify-content-end">
																<h1 style="margin-right: 291px">Edit Motorcycle</h1>
																
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
															<!--begin::Modal body-->
															<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">

																<div class="container mt-3">							
																	<form method="POST"  action="{{route('update_motor')}}" enctype="multipart/form-data">
																	@csrf
																	<input type="hidden" value="{{  $motor->id() }}" name="update_id">
																		<div class="row">
																			<div class=" col-md-6 mb-3 mt-3">
																				<input type="text" class="form-control" id="frameNumber" placeholder="Frame Number" value="{{ $motor->data()['frameNumber'] }}" name="frameNumber" required>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="productionYear" placeholder="productYear" value="{{ $motor->data()['productionYear'] }}"  name="productionYear" required>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="brand" placeholder="Brand" name="brand" value="{{ $motor->data()['brand'] }}"  required>
																			</div>																			
																			<div class=" col-md-6 mb-3 mt-3">
																				<select class="form-select form-select-solid  form-control" data-control="select2" data-hide-search="true" value="{{ $motor->data()['type'] }}"  placeholder="type" id="type" name="Type">
																					<option value="1">Standard</option>
																					<option value="2" selected="selected">Touring</option>
																					<option value="3">Off-road</option>
																					<option value="4">Dual-purpose</option>														
																				</select>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="EngineNumber" value="{{ $motor->data()['EngineNumber'] }}"  placeholder="Engine Number" name="EngineNumber" required>
																			</div>
																			
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="LastUpdate" name="LastUpdate" value="{{ $motor->data()['LastUpdate'] }}"  placeholder="LastUpdate" required>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="lastmeterreading" value="{{ $motor->data()['lastmeterreading'] }}"  placeholder="last meter reading" name="lastmeterreading" required>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="currentowner" value="{{ $motor->data()['currentowner'] }}"  placeholder="current owner" name="currentowner" required>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="specialRequirement" value="{{ $motor->data()['specialRequirement'] }}"  placeholder="Special Requirements" name="specialRequirement" required>
																			</div>	
																				
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="mainColor" value="{{ $motor->data()['mainColor'] }}"  placeholder="MainColor" name="mainColor" required>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="secondaryColor" value="{{ $motor->data()['secondaryColor'] }}"  placeholder="Secondray Color" name="secondaryColor" required>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="end_licence" value="{{ $motor->data()['end_licence'] }}"  placeholder="end of licence" name="end_licence" required>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="plate_number" value="{{ $motor->data()['plate_number'] }}"  placeholder="plate number" name="plate_number" required>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="location" value="{{ $motor->data()['location'] }}"  placeholder="location" name="location" required>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="numPassengers"  value="{{ $motor->data()['numPassengers'] }}" placeholder="number of passenger" name="numPassengers" required>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="text" class="form-control" id="loadCapacitor" value="{{ $motor->data()['loadCapacitor'] }}"  placeholder="load capacity" name="loadCapacitor" required>
																			</div>
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="amount" value="{{ $motor->data()['amount'] }}"  placeholder="amount" name="amount" required>
																			</div>		
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="price" value="{{ $motor->data()['price'] }}"  placeholder="Price" name="price" required>
																			</div>								
																			<div class=" col-md-6 mb-3 mt-3">										
																				<input type="number" class="form-control" id="rating" value="{{ $motor->data()['rating'] }}"  placeholder="Rating" name="rating" required>
																			</div>						
																		</div>	
																		<div class="row">
																			<div class=" col-md-6 mb-3 mt-3" style="text-align:center">										
																				<button   type="submit" class="btn btn-primary">Update</button>
																			</div>	
																			<div class=" col-md-6 mb-3 mt-3"style="text-align:center">										
																				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
																			</div>
																		</div>							
																	</form>							
																</div>						
															</div>
															<!--end::Modal body-->
														</div>
														<!--end::Modal content-->
													</div>
													<!--end::Modal dialog-->
												</div>
												<!--end::Modals-->
												<!-- delete modal -->
												<div id="delete_motor{{ $motor->id() }}" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
													<div class="modal-dialog modal-dialog-centered" style="width:55%;">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
																<!-- <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" aria-hidden="true">×</button> -->
															</div>
															<div class="modal-body">
																<p>Do you want to delete this record?</p>
															</div>
															<div class="modal-footer">
															<button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"	data-bs-dismiss="modal">Close</button>
															<form method="POST"  action="{{route('motor_del')}}" enctype="multipart/form-data">
																@csrf
																<!-- @method('post') -->
																<input type="hidden" value="{{  $motor->id() }}" name="delete_id">
																<button type="submit" class="btn btn-danger waves-effect waves-light deleteRecord" value="Delete">Delete</button>
															</form>	
															</div>
														</div>
													</div>
												</div>												
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
		<!--begin add new motor Modals-->
		<div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
						<!--begin::Modal dialog-->
			<div class="modal-dialog mw-800px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
				
					<div class="modal-header pb-0 border-0 justify-content-end">
						<h1 style="margin-right: 291px">Motorcycle New Product</h1>
						
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
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">

						<div class="container mt-3">							
							<form method="POST"  action="{{route('add_motors')}}" enctype="multipart/form-data">
							@csrf
								<div class="row">												
									<div class="col-md-12 mb-3 mt-3" style="text-align: -webkit-center;">
										<div class="picture-container" style="width: 123px;">											
											<div class="picture">
												<img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview3" title="">
												<input type="file" id="featuredImage" name="featuredImage" class="" required>
											</div>
											
											<h6 class="">Motorcycle Image</h6>																		
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class=" col-md-6 mb-3 mt-3">
										<input type="text" class="form-control" id="frameNumber" placeholder="Frame Number" name="frameNumber" required>
									</div>
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="number" class="form-control" id="productionYear" placeholder="productYear" name="productionYear" required>
									</div>
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="brand" placeholder="Brand" name="brand" required>
									</div>									
									<div class=" col-md-6 mb-3 mt-3">
										<select class="form-select form-select-solid  form-control" data-control="select2" data-hide-search="true" placeholder="Motor Type" id="type" name="type">
											<option value="Standard">Standard</option>
											<option value="Touring" selected="selected">Touring</option>
											<option value="Off-road">Off-road</option>
											<option value="Dual-purpose">Dual-purpose</option>														
										</select>
									</div>
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="EngineNumber" placeholder="Engine Number" name="EngineNumber" required>
									</div>
									
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="LastUpdate" name="LastUpdate" placeholder="LastUpdate" required>
									</div>	
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="lastmeterreading" placeholder="last meter reading" name="lastmeterreading" required>
									</div>
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="currentowner" placeholder="current owner" name="currentowner" required>
									</div>
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="specialRequirement" placeholder="Special Requirements" name="specialRequirement" required>
									</div>	
										
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="mainColor" placeholder="MainColor" name="mainColor" required>
									</div>	
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="secondaryColor" placeholder="Secondray Color" name="secondaryColor" required>
									</div>
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="end_licence" placeholder="end of licence" name="end_licence" required>
									</div>	
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="plate_number" placeholder="plate number" name="plate_number" required>
									</div>	
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="location" placeholder="location" name="location" required>
									</div>	
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="numPassengers" placeholder="number of passenger" name="numPassengers" required>
									</div>	
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="text" class="form-control" id="loadCapacitor" placeholder="load capacity" name="loadCapacitor" required>
									</div>
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="number" class="form-control" id="amount" placeholder="amount" name="amount" required>
									</div>				
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="number" class="form-control" id="price" value="{{ $motor->data()['price'] }}"  placeholder="Price" name="price" required>
									</div>								
									<div class=" col-md-6 mb-3 mt-3">										
										<input type="number" class="form-control" id="rating" value="{{ $motor->data()['rating'] }}"  placeholder="Rating" name="rating" required>
									</div>					
								</div>	
								<div class="row">
									<div class=" col-md-6 mb-3 mt-3" style="text-align:center">										
										<button   type="submit" class="btn btn-primary">Add</button>
									</div>	
									<div class=" col-md-6 mb-3 mt-3"style="text-align:center">										
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>							
							</form>							
						</div>						
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modals-->
	</div>
	<!--end::Post-->
</div>
<script>
	  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("wizardPicturePreview");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>
		<!--end::Content-->
@endsection