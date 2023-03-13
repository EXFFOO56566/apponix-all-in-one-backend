@extends('master')
@section('update_app')

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Update App </strong>
        </div>
        <div class="card-body" style="overflow-x: auto;">
            {{-- success --}}
            @if (Session::has('success'))
                <script>
                    swal("Success", "", "success");

                </script>
            @endif
            {{-- fail --}}
            @if (Session::has('fail'))
                <script>
                    swal("Fail", "", "error");

                </script>
            @endif
            {{-- access --}}
            @if (Session::has('access_msg'))
                <script>
                    swal("Opps!", "You are not Authorised", "error");

                </script>
            @endif

            {{-- <h4 style="color: red">{{session()->get('fail')}}</h4>
        <h4 style="color: green">{{session()->get('success')}}</h4>
        <h4 style="color: red">{{session()->get('access_msg')}}</h4> --}}


            <form method="POST" action="{{ url('updateApp') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-hover">
                    <input type="hidden" name="app_id" value="{{ $updatedata['app_id'] }}">
                    <tr>
                        <td><label>App Name :</label></td>
                        <td><input class="form-control" type="text" name="app_name" placeholder="Enter App Name"
                                value="{{ $updatedata['app_name'] }}" autofocus required>

                            <h6 class="text-danger">
                                {{ $errors->first('app_name') }}
                            </h6>

                        </td>
                    </tr>
                    <tr>
                        <td><label>App Url :</label></td>
                        <td><input class="form-control" type="text" name="app_url" placeholder="Enter App Url"
                                value="{{ $updatedata['app_url'] }}" autofocus required>

                            <h6 class="text-danger">
                                {{ $errors->first('app_url') }}
                            </h6>

                        </td>
                    </tr>


                    <tr>
                        <td><label> App Icon :</label></td>
                        <td><input type="file" name="app_icon" placeholder="Uplode icon"
                                value="{{ $updatedata['app_icon'] }}" accept=".jpg, .jpeg, .png,.jfif">
                            <h6 class=" text-danger">
                                {{ $errors->first('app_icon') }}
                            </h6>
                        </td>

                    </tr>
                    <tr>
                        <td><label>select Categorie :</label></td>
                        <td> <select type="" class="form-control" id="category_id" name="category_id" required>
                                <option value="none" selected disabled hidden>
                                    Select an Option
                                </option>
                                @foreach ($categories as $categorie)

                                    <option value="{{ $categorie['category_id'] }}">{{ $categorie['category_name'] }}
                                    </option>
                                @endforeach

                            </select>
                            <h6 class=" text-danger">
                                {{ $errors->first('app_icon') }}
                            </h6>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Top :</label></td>

                        <td><input type="checkbox" data-toggle="toggle" <?php if($updatedata['top']=="true"){echo "checked";} ?> data-on="true" 
                                 name="top" data-off="false"
                                data-onstyle="success" data-offstyle="danger"></td>
                    </tr>
                </table>



                <button class="btn btn-secondary btn-lg btn-block" type="submit">Submit</button>

            </form>
        </div>
    </div>


@endsection
