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
    $(document).on('click', 'button#currencyConverter', function(e){
        var form = $("#nipForm");
        console.log('here');
        console.log(form);
        console.log( form.serialize());
        e.preventDefault();

        $.ajax({
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            url     : form.attr("action"),
            type    : form.attr("method"),
            data    : form.serialize(),
            dataType: "json",
            success: function (xhr,status, response) {
                //console.log(response);
                var success = jQuery.parseJSON(response.responseText)
                var info = $('#companyName');
                console.log(success.message);


                info.append('<p> To jest  ' + success.message + '</p>');
                info.append('<a href="/" class="button "> jeszcze raz </a>');
                var form =  $('#nipForm');
                form.hide();
                var info = $('.edit_alert');
                info.find('ul>li').hide().empty();

            },
            error: function(xhr,status, response) {
                var error = jQuery.parseJSON(xhr.responseText);  // this section is key player in getting the value of the errors from controller.
                var info = $('.edit_alert');
                info.find('ul>li').hide().empty();
                for(var k in error.message){
                    if(error.message.hasOwnProperty(k)){
                        error.message[k].forEach(function(val){
                            info.find('ul').append('<li>' + val + '</li>');
                        });

                    }
                }


            }

        });



    });
    $("#inputUser").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

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