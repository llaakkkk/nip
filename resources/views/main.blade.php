@extends('partials.layer')

@section('content')
    <section class="form-login parallax-window" data-parallax="scroll" data-image-src="images/currency.jpg" data-bleed="23">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="login-tabs"></div>
                    <div role="tabpanel" class="tabpanel">
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li role="presentation" class="active"><a href="#currency" aria-controls="home" role="tab" data-toggle="tab">Currency Converter</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="currency">
                               @include('partials.form')
                            </div>


                        </div>

                    </div>
                </div>


            </div>
        </div>

    </section>


    @endsection
