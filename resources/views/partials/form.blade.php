<form class="form-horizontal" role="form" action=" {!! LaravelLocalization::setLocale() !!}/getInfo" method="post" id="nipForm" enctype="multipart/form-data">

    <div class="form-group">
        <label for="inputUser" class="col-sm-4 control-label">NIP *</label>
        <div class="col-sm-8">
            <input type="text" name="inputNip" class="form-control" id="inputUser" placeholder="NIP">
        </div>
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button id="currencyConverter"  class="btn btn-default">Idź!</button>
        </div>
    </div>

</form>
