@extends('master')
@section('update_ad')

    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{ $updatedata['ad_name'] }}</strong>
        </div>
        <div class="card-body" style="overflow-x: auto;">

            {{-- fail --}}
            @if (Session::has('fail'))
                <script>
                    swal("Opps!", "Not Updated", "error");

                </script>
            @endif

            {{-- success --}}
            @if (Session::has('success'))
                <script>
                    swal("", "Update Success", "success");

                </script>
            @endif


            {{-- <h4 style="color: red">{{ session()->get('fail') }}</h4>
            <h4 style="color: green">{{ session()->get('success') }}</h4> --}}
            <form method="POST" action="{{ url('updateAd') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-hover">
                    <tr>
                        <input type="hidden" name="ad_id" value="{{ $updatedata['ad_id'] }}">
                        <td><label>Banner</label></td>
                        <td><input class="form-control" type="text" name="banner" placeholder="Enter banner"
                                value="{{ $updatedata['banner'] }}" required autofocus>

                            <h6 class="text-danger">
                                {{ $errors->first('banner') }}
                            </h6>

                        </td>
                    </tr>
                    <tr>

                        <td><label>Native</label></td>
                        <td><input class="form-control" type="text" name="native" placeholder="Enter native"
                                value="{{ $updatedata['native'] }}" required>

                            <h6 class="text-danger">
                                {{ $errors->first('native') }}
                            </h6>

                        </td>
                    </tr>
                    <tr>

                        <td><label>Interstitial</label></td>
                        <td><input class="form-control" type="text" name="inter" placeholder="Enter inter"
                                value="{{ $updatedata['inter'] }}" required>

                            <h6 class="text-danger">
                                {{ $errors->first('inter') }}
                            </h6>

                        </td>
                    </tr>
                    <tr>
                        
                        <td><label>Show (On/Off)</label></td>

                        <td><input type="checkbox" data-toggle="toggle" <?php 
                        
                    
                                if($updatedata['status'] == "true"){
                                    echo "checked";
                                }
                                ?> data-on="On" name="status" data-off="Off"
                                data-onstyle="success" data-offstyle="danger" id="top"></td>
                    </tr>




                </table>



                <button class="btn btn-secondary btn-lg btn-block" type="submit">Update</button>

            </form>
        </div>
    </div>


@endsection
