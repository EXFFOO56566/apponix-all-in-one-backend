@extends('master')
@section('add_category')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Add New Category </strong>
    </div>
    <div class="card-body" style="overflow-x: auto;">
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

        {{-- <h4 style="color: red">{{session()->get('fail')}}</h4>
        <h4 style="color: green">{{session()->get('success')}}</h4>
        <h4 style="color: red">{{session()->get('access_msg')}}</h4> --}}


        <form method="POST" action="{{ url('addCategory') }}" enctype="multipart/form-data">
            @csrf
            <table class="table table-hover">
                <tr>
                    <td><label>Category Name :</label></td>
                    <td><input class="form-control" type="text" name="category_name" placeholder="Enter Category Name"
                            value="{{ old('category_name') }}" autofocus required>

                        <h6 class="text-danger">
                            {{ $errors->first('category_name') }}
                        </h6>

                    </td>
                </tr>
               

                <tr>
                    <td><label> Category Icon :</label></td>
                    <td><input type="file" name="category_icon" placeholder="Uplode icon" value="{{ old('category_icon') }}" required accept=".jpg, .jpeg, .png,.jfif">
                        <h6 class=" text-danger">
                            {{ $errors->first('category_icon') }}
                        </h6>
                    </td>

                </tr>
            </table>



            <button class="btn btn-secondary btn-lg btn-block" type="submit">Submit</button>

        </form>
    </div>
</div>

    
@endsection