<form class="form-horizontal" role="form" url="/currency/converter" method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group">
        <label for="inputSum" class="col-sm-4 control-label">Input Sum</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="inputSum" placeholder="Input Sum">
        </div>
    </div>
    <div class="form-group">
        <label for="inputFirstCurrency" class="col-sm-4 control-label">Choose your currency</label>
        <div class="col-sm-8">
            <select class="form-control" id="inputFirstCurrency" name="firstCurrency">
                <option value="default" name="default" >Choose currency</option>
                @foreach ($currencies as $item => $rate)
                    @foreach ($rate as $key => $value)
                        <option value="{{ $value }}" name="{{ $key }}">{{ $key }}</option>

                    @endforeach
                @endforeach
            </select>
        </div>
    </div>
    {{--<div class="form-group">--}}
    {{--<div class="col-sm-offset-4 col-sm-8">--}}
    {{--<button id="changeCurrencySelect" type="button" class="btn btn-link"><i class="fa fa-exchange fa-rotate-90 fa-2x"></i></button>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="form-group">
        <label for="inputSecondCurrency" class="col-sm-4 control-label">Choose needed currency</label>
        <div class="col-sm-8">
            <select class="form-control" id="inputSecondCurrency" name="secondCurrency">
                <option value="default" name="default">Choose currency</option>
                @foreach ($currencies as $item => $rate)
                    @foreach ($rate as $key => $value)
                        <option value="{{ $value }}" name="{{ $key }}">{{ $key }}</option>

                    @endforeach
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" id="currencyConverter" class="btn btn-default">Розпочати!</button>
        </div>
    </div>

</form>