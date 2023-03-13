@extends('master')
@section('ringtone_table')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- <h4 style="color: red">{{session()->get('fail')}}</h4>
                        <h4 style="color: green">{{session()->get('success')}}</h4>
                        <h4 style="color: red">{{session()->get('access_msg')}}</h4> --}}
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title">Ringtone Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>RINGTONE</th>
                                        <th>UPDATE</th>
                                        <th>DELETE</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $index = 1; ?>
                                    @foreach ($ringtone_data as $ringtone)



                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $ringtone['ring_name'] }}</td>
                                            <td><audio controls>

                                                    <source src="{{ url('public/ringtone/' . $ringtone['ringtone']) }}"
                                                        type="audio/mpeg">

                                                </audio>
                                            </td>
                                            <td align="center"><a href={{ 'RingtoneUpdate' . $ringtone['id'] }}>
                                                    <h3 class="text-primary"><span class="ti-pencil"></h3>
                                                </a></td>
                                            <td align="center"><a href={{ 'RingtoneDelete' . $ringtone['id'] }}>
                                                    <h3 class="text-danger"><span class="ti-trash"></span></h3>
                                                </a></td>

                                        </tr>
                                        <?php $index++; ?>
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

    <!--**********************************
                            Content body end
                        ***********************************-->


    <!--**********************************
                            Footer start
                        ***********************************-->
    <div class="footer">


    @endsection
