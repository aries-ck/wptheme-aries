/*
    Sendmail v1.0
    
    By Sergey Polischook: http://kotoblog.pp.ua

*/

	$("document").ready(function(){
		var use_ajax=false;
		$('button').removeClass('validate');
		$("#contact-form").validationEngine({
			inlineValidation: false,
	        promptPosition: "centerLeft",
			scroll: false,
			onSuccess: function(){use_ajax=true},   /* if everything is OK enable AJAX */
			onFailure : function(){use_ajax=false}
		});
		$("#submit").click(function(){

			$("#contact-form").validationEngine('validate');
			if(use_ajax)
            {
				$.ajax({
					url: "mail.php",
					type: "POST",
					data: "name="+$('#name').val()+"&email="+$('#email').val()+"&phone="+$('#phone').val(),
					dataType: "html",
					timeout: 30000,
					beforeSend: function(){
						$(".alert").html("<div align='center'><img src='templates/gk_mystore/images/loader.gif'></div>");
					},
					success: function(answer){
						$("#alert").html(answer);
                        $("#alert").show();
                        $("#alert").css('margin-top', '10px');
                        window.scrollTo(0, 0);
						$(".handle").click()
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$("#mail-result").html(textStatus);
						$("#mail-result").addClass("warning");
					}
				})
			}
		})
	})

