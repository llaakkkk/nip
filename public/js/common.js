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
    function showError(container, errorMessage) {
        container.className = 'error';
        var msgElem = document.createElement('span');
        msgElem.className = "error-message";
        msgElem.innerHTML = errorMessage;
        container.appendChild(msgElem);
    }

    function resetError(container) {
        container.className = '';
        if (container.lastChild.className == "error-message") {
            container.removeChild(container.lastChild);
        }
    }

    function validate(form) {
        var elems = form.elements;

        resetError(elems.inputUser.parentNode);
        if (!elems.inputUser.value) {
            showError(elems.inputUser.parentNode, ' Input sum');
        }

        //resetError(elems.firstCurrency.parentNode);
        //if (!elems.firstCurrency.value) {
        //    showError(elems.firstCurrency.parentNode, ' Укажите пароль.');
        //} else if (elems.firstCurrency.value != elems.password2.value) {
        //    showError(elems.firstCurrency.parentNode, ' Пароли не совпадают.');
        //}

        resetError(elems.firstCurrency.parentNode);
        if (!elems.firstCurrency.value) {
            showError(elems.firstCurrency.parentNode, 'Select your currency ');
        }

        resetError(elems.secondCurrency.parentNode);
        if (!elems.secondCurrency.value) {
            showError(elems.secondCurrency.parentNode, ' Select output currency');
        }

    }

    //
    //
	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
    //$.ajaxSetup(
     //   {
     //       headers:
     //       {
     //           'X-CSRF-Token': $('input[name="_token"]').val()
     //       }
     //   });
    //$("#currencyConverter").click( function () {
    //    var url = $(this).attr('url');
    //    var userValue = $("#inputSum").val();
    //    var firstValue = $("#inputFirstCurrency option:selected").val();
    //    var firstValueText = $("#inputFirstCurrency option:selected").text();
    //    var secondValue = $("#inputSecondCurrency option:selected").val();
    //    var secondValueText = $("#inputSecondCurrency option:selected").text();
    //    $.ajax({
    //        type: "POST",
    //        url: '/currency',
    //        dataType:  "json",
    //        data: "userValue =" + userValue + '&' + "firstValue =" + firstValue + '&' + "firstValueText =" + firstValueText +
    //        '&' + "secondValue =" + secondValue + '&' + "secondValueText =" + firstValueText,
    //
    //        success: function (data) {
    //            data = JSON.parse(data);
    //            console.log(data);
    //        }
    //    });
    //
    //
    //
    //});

	//$("form").submit(function() {
    //
    //
	//	return false;
	//});

});