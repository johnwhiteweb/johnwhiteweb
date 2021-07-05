
    <script>
        jQuery(document).ready(function ($) {
			
			
			$('.panel-heading a').click(function () {
				$('.panel-collapse').collapse('hide');
			});


            $(".scrollDown").click(function () {
                $('html, body').animate({
                    scrollTop: $("#contactform").offset().top
                }, 2000);


            });

            $('#contactform').validate({
                highlight: function (element) {
                    $(element).addClass('error');
                },
                unhighlight: function (element) {
                    $(element).removeClass('error');
                },

                submitHandler: function () {
					//alert("hello");
                    $('.contactform .submit-btn').attr('disabled', 'disabled');
                    $.post('https://digital.b144.co.il/lp/email-contact-email.php',
                        $("#contactform").serialize(),
                        function (data) {
                            console.log(data);
							//alert(data.msg);
                            if (data.msg == 'Sent') {
                                $("#contactform").html(
                                    '<div class="col-12"> <div class="title-box"><h3 class="blue_color text-white">הפרטים שלך נשלחו בהצלחה, נחזור אליך בקרוב.</h3> <br> <a href="/lp/2020/new/documentation.pdf" onclick="dataLayer.push({\'event\':\'pdf_download\', \'form_name\':\'lp-package\'})" class="btn-submit gradient_btn documentation">להורדת המדריך לחצו כאן <span>&gt;</span></a></div></div>'
                                    );
                                dataLayer.push({
                                    'event': 'formsuccessful',
                                    'formtype': '',
                                    'formname': '<?php echo the_title(); ?>'
                                })
                            } else {

                                $('.contact_us_form_desktop .submit-btn').removeAttr(
                                "disabled");

                            }


                        }, "json");



                }

            });

			$('#mobilecontactform').validate({
                highlight: function (element) {
                    $(element).addClass('error');
                },
                unhighlight: function (element) {
                    $(element).removeClass('error');
                },

                submitHandler: function () {
                    $('.mobilecontactform .submit-btn').attr('disabled', 'disabled');
                    $.post('https://digital.b144.co.il/lp/email-contact-email.php',
                        $("#mobilecontactform").serialize(),
                        function (data) {
                            console.log(data);
                            if (data.msg == 'Sent') {
                                $("#mobilecontactform").html(
                                    '<div class="col-12"> <div class="title-box"><h3 class="blue_color text-white">הפרטים שלך נשלחו בהצלחה, נחזור אליך בקרוב.</h3> <br> <a href="/lp/2020/new/documentation.pdf" onclick="dataLayer.push({\'event\':\'pdf_download\', \'form_name\':\'lp-package\'})" class="btn-submit gradient_btn documentation">להורדת המדריך לחצו כאן <span>&gt;</span></a></div></div>'
                                    );
                                dataLayer.push({
                                    'event': 'formsuccessful',
                                    'formtype': '',
                                    'formname': '<?php echo the_title(); ?>'
                                })
                            } else {

                                $('.contact_us_form_desktop .submit-btn').removeAttr(
                                "disabled");

                            }


                        }, "json");



                }

            });
			
        });
	</script>