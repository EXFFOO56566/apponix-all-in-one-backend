@extends('master')
@section('add_wallpaper_form')

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Add New Wallpaper </strong>
        </div>
        <div class="card-body" style="overflow-x: auto;">
            <form method="POST" action="{{ url('AddWallpaperData') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-hover">
                    <tr>
                        <td><label> Image </label></td>
                        <td><input type="file" name="image" placeholder="Uplode image"
                                value="{{ old('image') }}" required accept=".jpg, .jpeg, .png,.jfif">
                            <h6 class=" text-danger">
                                {{ $errors->first('image') }}
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
