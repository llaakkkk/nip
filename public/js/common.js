$(document).ready(function() {


    $( "select" )
        .change(function () {
            var selected = '';
            $( "select option:selected" ).each(function() {

                selected = $(this).val();
                console.log(selected);
            });

        })
        .change();


    ////change currency button
    //$("#changeCurrencySelect").click( function () {
    //    var firstValue =  $( "#inputFirstCurrency option:selected").val();
    //    var secondValue =  $( "#inputSecondCurrency option:selected").val();
    //    console.log(secondValue);
    //    console.log(firstValue);
    //
    //    $( "#inputFirstCurrency").find(" option [value=secondValue]").attr("selected", "selected").change();
    //    $( "#inputSecondCurrency").find(" option [value=firstValue]").attr("selected", "selected").change();
    //});


    //
    //
	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
    $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });
    
	$("form").submit(function() {

        var url = $(this).attr('url');
        var firstValue =  $( "#inputFirstCurrency option:selected").val();
        var firstValueText =  $( "#inputFirstCurrency option:selected").text();
        var secondValue =  $( "#inputSecondCurrency option:selected").val();
        var secondValueText =  $( "#inputSecondCurrency option:selected").text();
		$.ajax({
			type: "POST",
			url: url,
			data: "firstValue =" + firstValue +'&' +"firstValueText =" + firstValueText +
            '&' + "secondValue =" + secondValue +'&' +"firstValueText =" + firstValueText
		}).done(function() {
			alert("Спасибо за заявку!");
			setTimeout(function() {
				$.fancybox.close();
			}, 1000);
		});
		return false;
	});

});