@extends('partials.layer')

@section('content')
    <section class="form-login parallax-window" data-parallax="scroll" data-image-src="images/mapa_pl.jpg" data-bleed="23">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-3 col-md-6">

                    @if(Session::get('message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span></button>
                            <p class="text-center"> {{Session::get('message')}}</p>
                        </div>
                    @endif
                    <div class="login-tabs"></div>
                    <div role="tabpanel" class="tabpanel">

                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li role="presentation" class="active">
                                <a href="#currency" aria-controls="home" role="tab" data-toggle="tab">Wyszukiwanie</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="companyName" style="   z-index: 100; position: relative;">
                                <ul class="bg-success">

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="currency">
                                <div class="edit_alert alert" role="alert" style="   z-index: 100; position: relative;">

                                    <ul class="bg-danger"></ul>

                                </div>
                                <div class="form-group">
                                    @include('partials.form')

                                </div>
                            </div>


                        </div>

                    </div>
                </div>


            </div>
        </div>

    </section>


    @endsection
