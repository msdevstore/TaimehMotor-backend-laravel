@extends('layouts.layouts.layout')
@section('content')
<!--begin::Row-->
<div class="row g-5 g-xl-8">
<!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Tables Widget 5-->
        <div class="card card-xxl-stretch mb-5 mb-xl-8 ms-5">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Request</span>                    
                </h3>
                <div class="card-toolbar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1 active" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Purchase</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">Maintenance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">Shop sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_4">Pre Order</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="tab-content">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">    
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="w-35px">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                            </div>
                                        </th>
                                        <th class="p-0 w-35px" style="text-align:center;">No</th>
                                        <th class="p-0 min-w-100px" style="text-align:center;">Motor ID</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">User</th>
                                        <th class="p-0 min-w-150px" style="text-align:center;">Date</th>                                        
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($mrequests as $mrequest)
                                    @if($mrequest->data()['status'] == 'Purchase Requested')
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{++$i}}</span>
                                            </td>
                                            <td style="text-align:center;">
                                                <div class="symbol symbol-60px me-2" >                                               
                                                    <img src="{{ $mrequest->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                                    <span class="text-muted fw-bold d-block">{{ $mrequest->data()['brand'] }}</span>
                                                </div>
                                            </td>
                                            <td style="text-align:center;">
                                                <span class="text-muted fw-bold d-block">{{ $mrequest->data()['username'] }}</span>
                                            </td>
                                            <td class="text-muted fw-bold" style="text-align:center;">{{ $mrequest->data()['requested_date'] }}</td>    
                                        </tr>      
                                    
                                    @endif
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_table_widget_5_tab_2">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="w-35px">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                            </div>
                                        </th>
                                        <th class="p-0 w-35px" style="text-align:center;">No</th>
                                        <th class="p-0 min-w-100px" style="text-align:center;">Motor ID</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">User</th>
                                        <th class="p-0 min-w-150px" style="text-align:center;">Date</th>                                        
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($mrequests as $mrequest) 
                                @if($mrequest->data()['status'] == 'Maintenance Requested')
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
											<span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{++$i}}</span>
										</td>
                                        <td style="text-align:center;">
                                            <div class="symbol symbol-60px me-2" >                                               
                                                <img src="{{ $mrequest->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                                <span class="text-muted fw-bold d-block">{{ $mrequest->data()['brand'] }}</span>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <span class="text-muted fw-bold d-block">{{ $mrequest->data()['username'] }}</span>
                                        </td>
                                        <td class="text-muted fw-bold" style="text-align:center;">{{ $mrequest->data()['requested_date'] }}</td>                
                                    </tr>                                  
                                    @endif
                                   @endforeach 
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->                 
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="w-35px">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                            </div>
                                        </th>
                                        <th class="p-0 w-35px" style="text-align:center;">No</th>
                                        <th class="p-0 min-w-100px" style="text-align:center;">Motor ID</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">User</th>
                                        <th class="p-0 min-w-150px" style="text-align:center;">Date</th>                                        
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($mrequests as $mrequest) 
                                @if($mrequest->data()['status'] == 'Purchase Assigned')
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
											<span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{++$i}}</span>
										</td>
                                        <td style="text-align:center;">
                                            <div class="symbol symbol-60px me-2" >                                               
                                                <img src="{{ $mrequest->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                                <span class="text-muted fw-bold d-block">{{ $mrequest->data()['brand'] }}</span>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <span class="text-muted fw-bold d-block">{{ $mrequest->data()['username'] }}</span>
                                        </td>
                                        <td class="text-muted fw-bold" style="text-align:center;">{{ $mrequest->data()['requested_date'] }}</td>                
                                    </tr>                                  
                                    @endif
                                   @endforeach 
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>                  
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fad" id="kt_table_widget_5_tab_4">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="w-35px">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                            </div>
                                        </th>
                                        <th class="p-0 w-35px" style="text-align:center;">No</th>
                                        <th class="p-0 min-w-100px" style="text-align:center;">Motor ID</th>
                                        <th class="p-0 min-w-140px" style="text-align:center;">User</th>
                                        <th class="p-0 min-w-150px" style="text-align:center;">Date</th>                                        
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($mrequests as $mrequest) 
                                @if($mrequest->data()['status'] == 'Pre Order')
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
											<span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{++$i}}</span>
										</td>
                                        <td style="text-align:center;">
                                            <div class="symbol symbol-60px me-2" >                                               
                                                <img src="{{ $mrequest->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                                <span class="text-muted fw-bold d-block">{{ $mrequest->data()['brand'] }}</span>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <span class="text-muted fw-bold d-block">{{ $mrequest->data()['username'] }}</span>
                                        </td>
                                        <td class="text-muted fw-bold" style="text-align:center;">{{ $mrequest->data()['requested_date'] }}</td>                
                                    </tr>                                  
                                    @endif
                                   @endforeach   
                                    
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->                    
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tables Widget 5-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
@endsection