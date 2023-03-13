@extends('master')
@section('show_ad')


  <table class="table" style="overflow-x: auto">
    @if(Session::has('access_msg')) 
    <script>
     swal("Opps!", "You are not Authorized", "error");
    </script>
    @endif
    {{-- <h4 style="color: red">{{session()->get('access_msg')}}</h4> --}}

    @foreach ($advertise as $ad)
        
    
   <tr>
     <td>
        <div class="card">
          
           
          <div class="card-body" style="overflow-x: auto;">
            
              <table class="table table-striped " style="overflow-x: auto">
                <div class="card-header">
                  <thead>
                    <th style="width: 30%;"><strong class="card-title">{{$ad['ad_name']=="google"?"Google Admob":"Facebook Monetization Network"}}</strong></th>
                    <th ><a  href={{"AdUpdate".$ad['ad_id']}} class="btn mb-1 btn-info" style="float: right;" ><i class="fa fa-pencil"></i></a></th> 
                  
             
                  </thead>
                </div>
                <tbody>
                   <tr>
                       <td ><label>Banner</label></td>
                       <td colspan="4">{{$ad['banner']}}</td>

                   </tr>
                   
                   <tr>
                       <td><label>Native</label></td>
                       <td colspan="4">{{$ad['native']}}</td>
                   </tr>
                   
                    <tr>
                        <td><label>Interstitial</label></td>
                        <td colspan="4">{{$ad['inter']}}</td>
                     </tr>
                     <tr>
                      <td><label>On/Off</label></td>
                      <td colspan="4">{{$ad['status']}}</td>
                   </tr>
                </tbody>
              </table>
            </div>
        </div>
      </td>
   </tr>
   
   @endforeach
   

  

  </table>


  




@endsection
