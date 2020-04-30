//Inzio
    $("#myInput").on('focus', function () {
    	$(this).parent('label').addClass('active');
    });

    $("#myInput").on('blur', function () {
    	if($(this).val().length == 0)
    		$(this).parent('label').removeClass('active');
    });
//Fine
