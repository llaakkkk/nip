<form class="form-horizontal" role="form"  action="/currency" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group">
        <label for="inputUser" class="col-sm-4 control-label">Enter Your Sum *</label>
        <div class="col-sm-8">
            <input type="text" name="inputNip" class="form-control" id="inputUser" placeholder="Enter Sum">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" id="currencyConverter"  class="btn btn-default">Go!</button>
        </div>
    </div>

</form>
