@extends('master') 
@section('app_table')
   
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

{{-- success --}}
@if(Session::has('success')) 
<script>
     swal("Success", "", "success");
</script>
@endif
{{--  fail--}}
@if(Session::has('fail')) 
<script>
     swal("Fail", "", "error");
</script>
@endif
{{-- access --}}
@if(Session::has('access_msg')) 
<script>
     swal("Opps!", "You are not Authorised", "error");
</script>
 @endif
{{--                        <h4 style="color: red">{{session()->get('fail')}}</h4>
                        <h4 style="color: green">{{session()->get('success')}}</h4>
                        <h4 style="color: red">{{session()->get('access_msg')}}</h4> --}}
                        <div class="card">
                            <div class="card-body">
                               
                        
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>NAME</th>   
                                                <th>ICON</th>
                                                {{-- <th>CATEGORY</th> --}}
                                                <th>TOP</th>

                                                <th >UPDATE</th>
                                                <th >DELETE</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                          @foreach ($apps as $app)
                                              
                                         
                                            
                                            <tr>
                                                <td>{{$app['app_name']}}</td>
                                                <td><img src='{{url("public/img/".$app['app_icon'])}}' style="height: 45px; width:45px;border-radius: 10%;"></td>
                                              
                                                {{-- <td>{{$app['category_id']}}</td> --}}
                                                
                                                
                                                <td>{{$app['top']}}</td>
                                                
                                                <td align="center"><a href={{"AppUpdate".$app['app_id']}}><h3 class="text-primary"><span class="ti-pencil"></h3></a></td>
                                                <td align="center"><a href={{"AppDelete".$app['app_id']}}><h3 class="text-danger"><span class="ti-trash"></span></h3></a></td>
                                              
                                                

                                               
                                            </tr>
                                            @endforeach
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
           
        
@endsection