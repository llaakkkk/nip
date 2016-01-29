@extends('partials.layer')

@section('content')
    <section id="benefits" class="benefits">
        <div class="benefits-about">
            <div class="container">
                <div class="row header">
                    <h3>Done!</h3>
                    <a href="/" style="color: #e38d13;">Go Back</a>

                </div>
                <div class="row ">


                    <div class="col-md-3 col-md-offset-3">
                        <div class="section">

                            <div class="info">
                                <strong>{{$user_value}} {{$first_currency}}</strong>

                                <p> 1 EUR ={{$first_rate}} {{$first_currency}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="section">

                            <div class="info">
                                <strong>{{$sum}} {{$second_currency}}</strong>

                                <p>1 EUR ={{$second_rate}} {{$second_currency}}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </section>


    @endsection
