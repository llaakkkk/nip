<form class="form-horizontal" role="form"  action="/currency" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group">
        <label for="inputUser" class="col-sm-4 control-label">Input Your Sum *</label>
        <div class="col-sm-8">
            <input type="text" name="inputUser" class="form-control" id="inputUser" placeholder="Input Sum">
        </div>
    </div>
    <div class="form-group">
        <label for="inputFirstCurrency" class="col-sm-4 control-label">Choose your currency *</label>
        <div class="col-sm-8">
            <select class="form-control" id="inputFirstCurrency" name="firstCurrency">

                @foreach ($currencies as $item => $rate)
                    @foreach ($rate as $key => $value)
                        <option value="{{ $value }} {{$key}}" name="{{ $key }}">{{ $key }}</option>

                    @endforeach
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputSecondCurrency" class="col-sm-4 control-label">Choose currency *</label>
        <div class="col-sm-8">
            <select class="form-control" id="inputSecondCurrency" name="secondCurrency">

                @foreach ($currencies as $item => $rate)
                    @foreach ($rate as $key => $value)
                        <option value="{{ $value }} {{$key}}" name="{{ $key }}">{{ $key }}</option>

                    @endforeach
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" id="currencyConverter"  class="btn btn-default">Go!</button>
        </div>
    </div>

</form>