@extends('layouts.layouts.layout')
@section('content')
<!--begin::Row-->
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
                <div class="col-md-6 pt-5" style=" text-align:end; padding-right: 30px;">
                    <a class="btn btn-success" href="{{ url('store_production') }}"> Store</a>
                </div>
            </div> 
            <hr/>      
            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="table-responsive">                
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="border-10">
                                <th class="p-0 w-35px" style="text-align:center;">No</th>
                                <th class="p-0 min-w-100px" style="text-align:center;">Motor Brand</th>
                                <th class="p-0 min-w-140px" style="text-align:center;">User Name</th>
                                <th class="p-0 min-w-140px" style="text-align:center;">Price</th>
                                <th class="p-0 min-w-140px" style="text-align:center;">PaymentImage</th>
                                <th class="p-0 min-w-150px" style="text-align:center;">Requested Date</th>                                        
                                <th class="p-0 min-w-100px" style="text-align:center;">Assign</th>                         
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>          
                        @foreach($stores as $store) 
                        @if($store->data()['status'] == 'Purchase Requested' || $store->data()['status'] =='Purchase Assigned')                  
                            <tr>                                
                                <td>
                                    <span class="text-muted fw-bold text-muted d-block fs-7" style="text-align:center;">{{++$i}}</span>
                                </td>
                                <td style="text-align:center;">
                                    <div class="symbol symbol-60px me-2" >                                               
                                        <img src="{{ $store->data()['motor_image'] }}" class="h-50 align-self-center" alt="" />
                                        <span class="text-muted fw-bold d-block">{{ $store->data()['brand'] }}</span>
                                    </div>
                                </td>
                                <td style="text-align:center;">
                                    <span class="text-muted fw-bold d-block">{{ $store->data()['username'] }}</span>
                                </td>        
                                <td class="text-muted fw-bold" style="text-align:center;">{{ $store->data()['price'] }}</td> 
                                <td style="text-align:center;">
                                    <div class="symbol symbol-60px me-2" >
                                                                                       
                                        <img src="{{ $store->data()['paymentImage'] }}" class="h-50 align-self-center" alt=""  id="myImg" onclick="modalImg('img1','cap1')" data-toggle="modal" data-target="#myModal">                                        
                                    </div>
                                </td>                                       
                                <td class="text-muted fw-bold" style="text-align:center;">{{ $store->data()['requested_date'] }}</td>
                                <td style="text-align:center;">
                                    @if($store->data()['status'] == 'Purchase Requested')                                        
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

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <table width="100%">
            <tr>
              <td width="30%">
                <p id="cap1" style="transform: rotate(90deg);"></p>
              </td>
              <td>
                <img id="img1" width="100%">
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
    <!--end::Col-->
</div>

<script type="text/javascript">
    function modalImg(img, cap) {
      var caption  = document.getElementById("myImg").alt;
      var src      = document.getElementById("myImg").src;
      var imgModal = document.getElementById(img).src = src;
      var capModal = document.getElementById(cap).innerHTML = caption;
    }
  </script>
<!--end::Row-->
@endsection