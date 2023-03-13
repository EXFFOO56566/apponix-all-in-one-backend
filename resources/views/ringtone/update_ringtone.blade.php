@extends('master')
@section('add_ringtone_form')

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Update Ringtone </strong>
        </div>
        <div class="card-body" style="overflow-x: auto;">



            <form method="POST" action="{{ url('UpdateRingtoneData') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-hover">
                    <tr><input type="hidden" value="{{ $ringtone_data['id'] }}" name="id"></tr>
                    <tr>

                        <td><label>Ringtone Name </label></td>
                        <td><input class="form-control" type="text" name="ring_name" placeholder="Enter Ringtone Name"
                                value="{{ $ringtone_data['ring_name'] }}" autofocus required>

                            <h6 class="text-danger">
                                {{ $errors->first('ring_name') }}
                            </h6>

                        </td>
                    </tr>


                    <tr>
                        <td><label> Ringtone </label></td>
                        <td><input type="file" name="ringtone" placeholder="Uplode ringtone"
                                value="{{$ringtone_data['ringtone'] }}" required accept=".mp3">
                            <h6 class=" text-danger">
                                {{ $errors->first('ringtone') }}
                            </h6>
                        </td>

                    </tr>
                </table>



                <button class="btn btn-secondary btn-lg btn-block" type="submit">Submit</button>

            </form>
        </div>
    </div>

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



@endsection
