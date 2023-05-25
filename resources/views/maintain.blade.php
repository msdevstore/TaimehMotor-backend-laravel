@extends('layouts.layouts.layout')
@section('content')
<!--begin::Row-->

<!--begin::Col-->
    <div class="col-xl-12" style="padding: left 10px;">
        <!--begin::Tables Widget 5-->
        <div class="card card-xxl-stretch mb-5 mb-xl-8 ms-5">            
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">maintain</span>
                            <!-- <span class="text-muted mt-1 fw-bold fs-7">More than 40 new products</span> -->
                        </h3>               
                    </div>
                </div>
                <div class="col-md-6 pt-5" style=" text-align:end; padding-right: 30px;">
                    <a class="btn btn-primary" href="{{ url('inmaintain') }}">
                        <span class="spinner-grow spinner-grow-sm"></span>
                        Inter
                    </a>
                </div>
            </div>
        <!--begin::Header-->
            
            
            <!--end::Header-->
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
                                <th class="p-0 min-w-100px" style="text-align:center;">Assign Status</th>                                       
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>    
                            @foreach($maintains as $maintain)
                            @if($maintain->data()['status'] == 'Maintenance Requested' ||$maintain->data()['status'] == 'Maintenance Assigned')                        
                            <tr>                                
                                <td>
                                    <span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{++$i}}</span>
                                </td>
                                <td style="text-align:center;">
                                    <div class="symbol symbol-60px me-2" >                                               
                                        <img src="{{ $maintain->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                        <span class="text-muted fw-bold d-block">{{ $maintain->data()['brand'] }}</span>
                                    </div>
                                </td>
                                <td style="text-align:center;">
                                    <span class="text-muted fw-bold d-block">{{ $maintain->data()['username'] }}</span>
                                </td>
                                <td class="text-muted fw-bold" style="text-align:center;">{{ $maintain->data()['price'] }}</td>
                                <td style="text-align:center;">
                                    <div class="symbol symbol-60px me-2" >                                               
                                        <img src="{{ $maintain->data()['paymentImage'] }}" class="h-50 align-self-center" alt="" />
                                    </div>
                                </td>  
                                <td class="text-muted fw-bold" style="text-align:center;">{{ $maintain->data()['requested_date'] }}</td>
                                <td style="text-align:center;">
                                    @if($maintain->data()['status'] == 'Maintenance Requested')                                        
                                    <button type="submit" class="btn btn-success" style=" border-radius: 50px;" disabled>A</a>
                                    @else
                                    <button type="submit" class="btn btn-danger" style=" border-radius: 50px;"disabled>U</a>
                                    @endif
                                </td>                
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
<!--end::Row-->
@endsection