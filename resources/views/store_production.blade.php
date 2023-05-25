@extends('layouts.layouts.layout')
@section('content')

@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
	<strong>{{ Session::get('message') }}</strong>
	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>	  
  </div>
@endif
<!--begin::Row-->
<div class="row">
    <div class="col-lg-12">
        <div class="row g-5 g-xl-8">
        <!--begin::Col-->
            <div class="col-xl-12" style="padding: left 10px;">
                <!--begin::Tables Widget 5-->
                <div class="card card-xxl-stretch mb-5 mb-xl-8 ms-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Store</span>                            
                                </h3>               
                            </div>
                        </div>                      
                    </div>       
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <div class="table-responsive">                
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0" >                                        
                                        <th class="p-0 w-35px" style="text-align:center;">No</th>
                                        <th class="p-0 min-w-100px" style="text-align:center;">Motor Brand</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">User Name</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">Price</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">Payment Image</th>
                                        <th class="p-0 min-w-150px" style="text-align:center;">Requested Date</th>                                        
                                        <th class="p-0 min-w-100px" style="text-align:center;">Assign</th>                                          
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($productions as $production) 
                                
                                @if($production->data()['status'] == 'Purchase Requested')                              
                                    <tr>                                        
                                        <td>
                                            <span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{++$i}}</span>
                                        </td>
                                        <td style="text-align:center;">
                                            <div class="symbol symbol-60px me-2" >                                               
                                                <img src="{{ $production->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                                <span class="text-muted fw-bold d-block">{{ $production->data()['brand'] }}</span>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <span class="text-muted fw-bold d-block">{{ $production->data()['username'] }}</span>
                                        </td>
                                        <td class="text-muted fw-bold" style="text-align:center;">{{ $production->data()['price'] }}</td> 
                                        <td style="text-align:center;">
                                            <div class="symbol symbol-60px me-2" >                                               
                                                <img src="{{ $production->data()['paymentImage'] }}" class="h-50 align-self-center" alt="" />
                                            </div>
                                        </td> 
                                        <td class="text-muted fw-bold" style="text-align:center;">{{ $production->data()['requested_date'] }}</td>                                        
                                        <td style="text-align:center;">                                        
                                            <button type="submit" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#update_status{{ $production->id() }}"> Assign </a>
                                        </td> 
                                        <div id="update_status{{ $production->id() }}" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Assign</h4>                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you want to assign this record?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"	data-bs-dismiss="modal" >Close</button>
                                                        <form method="POST"  action="{{route('update_status')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <!-- @method('post') -->
                                                            <input type="hidden" value="{{  $production->id() }}" name="update_status">
                                                            <input type="hidden" class="form-control" id="status" placeholder="Frame Number" value="Purchase Assigned" name="status">
                                                            <button type="submit" class="btn btn-danger waves-effect waves-light deleteRecord" value="Update" onClick="refreshPage()">Assign</button>
                                                        </form>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                 
                                    </tr>
                                    @endif
                                    
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
            </div>
            <!--end::Col-->
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row g-5 g-xl-8">
        <!--begin::Col-->
            <div class="col-xl-12" style="padding: left 10px;">
                <!--begin::Tables Widget 5-->
                <div class="card card-xxl-stretch mb-5 mb-xl-8 ms-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Assigned</span>                            
                                </h3>               
                            </div>
                        </div>
                    </div>       
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <div class="table-responsive">                
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">                                        
                                        <th class="p-0 w-35px" style="text-align:center;">No</th>
                                        <th class="p-0 min-w-100px" style="text-align:center;">Motor Brand</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">User Name</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">Price</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">Payment Image</th>
                                        <th class="p-0 min-w-150px" style="text-align:center;">Requested Date</th> 
                                        <!-- <th class="p-0 min-w-150px" style="text-align:center;">UserId</th> -->
                                        <th class="p-0 min-w-100px" style="text-align:center;">Unassign</th>                                         
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @php
                                    $j = 1;
                                @endphp
                                @foreach($productions as $production) 
                                @if($production->data()['status'] == 'Purchase Assigned')                              
                                    <tr>                                        
                                        <td>
                                            <span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{$j++}}</span>
                                        </td>
                                        <td style="text-align:center;">
                                            <div class="symbol symbol-60px me-2" >                                               
                                                <img src="{{ $production->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                                <span class="text-muted fw-bold d-block">{{ $production->data()['brand'] }}</span>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <span class="text-muted fw-bold d-block">{{ $production->data()['username'] }}</span>
                                        </td>
                                        <td class="text-muted fw-bold" style="text-align:center;">{{ $production->data()['price'] }}</td>  
                                        <td style="text-align:center;">
                                            <div class="symbol symbol-60px me-2" >                                               
                                                <img src="{{ $production->data()['paymentImage'] }}" class="h-50 align-self-center" alt="" />
                                            </div>
                                        </td>
                                        <td class="text-muted fw-bold" style="text-align:center;">{{ $production->data()['requested_date'] }}</td>                                        
                                        <td style="text-align:center;">                                        
                                            <button type="submit" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#update_status{{ $production->id() }}"> UnAssign </a>
                                        </td> 
                                        <div id="update_status{{ $production->id() }}" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">UnAssign</h4>                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you want to unassign this record?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"	data-bs-dismiss="modal" >Close</button>
                                                        <form method="POST"  action="{{route('update_status')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <!-- @method('post') -->
                                                            <input type="hidden" value="{{  $production->id() }}" name="update_status">
                                                            <input type="hidden" class="form-control" id="status"  value="Purchase Requested" name="status">
                                                            <button type="submit" class="btn btn-danger waves-effect waves-light deleteRecord" value="Update" onClick="refreshPage()">UnAssign</button>
                                                        </form>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                 
                                    </tr>
                                    @endif
                                    
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
            </div>
            <!--end::Col-->
        </div>
    </div>
<!--end::Row-->
</div>
<script>
    function refreshPage(){
        window.location.reload();
    } 
</script>  
@endsection