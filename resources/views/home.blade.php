@extends('master')
@section('home')



    <div class="container-fluid mt-3">
        <div class="row ">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-center">

                <br>
                <div>
                    <h4> For <span style="color: blue">APPONIX</span> source code contact us <br><br></h4>
                </div>
                <h4><a href="mailto:help@codderlab.com" class="mr-2"><img style="height: 40px"
                            src={{ url('public\icon\email.svg') }} alt=""></a>

                    <a href="https://api.whatsapp.com/send?phone=919909515320&text=Hi,%20Codderlab" class="mr-2"><img
                            style="height: 40px " src={{ url('public\icon\whatsapp.svg') }} alt=""></a>
                    <a href="skype:codderlab?chat"><img style="height: 40px " src={{ url('public\icon\skype.svg') }}
                            alt=""></a>
                </h4>
                <br>
            </div>
            <div class="col-md-3"></div>
        </div>
        </div>
        <br>
        <div class="row">

            <div class="col-md-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h2 class="card-title text-white">Total categories</h2>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $categories }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-list"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Applications</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $apps }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-sliders"></i></span>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">New Customers</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Customer Satisfaction</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">99%</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div> --}}
        </div>



    @endsection
