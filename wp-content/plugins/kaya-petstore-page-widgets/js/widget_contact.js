jQuery(function() {
//----------------------------------------------------
// Contact Form 
//----------------------------------------------------
 jQuery('#main input#contact_submit').live("click",function(e) { 
		    e.preventDefault();
		var name = jQuery('input#name').val();
		var email = jQuery('input#email').val();
		var message = jQuery('textarea#message').val();
		var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
		var subject = jQuery('input#subject').val();
		var siteemail = jQuery('input#siteemail').val();
		var success_text = jQuery('#succes_message_text').val();
		var hasError = false;
		 if(name=='')
		 {
			 jQuery('[name="name"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="name"]').removeClass('vaidate_error');
			 }
			 
		if(email=='')
		 {
			 jQuery('[name="email"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			if (!pattern.test(email)) {
				jQuery('[name="email"]').addClass('vaidate_error');
				 hasError = true;
			 }else{
				 jQuery('[name="email"]').removeClass('vaidate_error');
				 }
			 }

		if(message=="")
			 {
				 jQuery('[name="message"]').addClass('vaidate_error');
				 hasError = true;
			 }else{
				 jQuery('[name="message"]').removeClass('vaidate_error');
			}
		if(subject=="")
			 {
				 jQuery('[name="subject"]').addClass('vaidate_error');
				 hasError = true;
			 }else{
				 jQuery('[name="subject"]').removeClass('vaidate_error');
				 }
        if(hasError) { return; }
		else {	
				jQuery('.contact_loader').css('visibility','visible');
				jQuery.ajax({
		            type: 'post',
		           	url: cpath.plugin_dir + '/inc/sendEmail.php',
		            data: 'name=' + name + '&email=' + email +'&subject='+ subject +'&message=' + message +'&siteemail='+ siteemail+'&success_text='+ success_text,
		            success: function(results) {
		            	jQuery('.contact_loader').css('visibility','hidden');
		                jQuery('div#contact_response').html(results).css('display', 'block');
		                jQuery('#contact-form').get(0).reset();		
		   
		         }
		     }); // end ajax
		}
    });
});
//----------------------------------------------------
// Reservation Form 
//----------------------------------------------------
    jQuery('#main input#submit').live("click",function(e) { 
		e.preventDefault();
		var res_name = jQuery('input#res_name').val();
		var res_email = jQuery('input#res_email').val();
		var res_message = jQuery('textarea#res_message').val();
		var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
		var number_validate =  new RegExp( /^[0-9-+]+$/ );
		var res_persons = jQuery('input#res_persons').val();
		var res_phone = jQuery('input#res_phone').val();
		var res_date = jQuery('input#res_date').val();
		var res_time = jQuery('input#res_time').val();
		var res_subject = jQuery('input#res_subject').val();
		var res_email_id = jQuery('input#res_email_id').val();
		var hasError = false;
		if(res_name=='')
		{
			jQuery('[name="res_name"]').addClass('vaidate_error');
			hasError = true;
		}else{
			jQuery('[name="res_name"]').removeClass('vaidate_error');
		}
		if(res_email=='')
		{
			jQuery('[name="res_email"]').addClass('vaidate_error');
			hasError = true;
		}else{
		if (!pattern.test(res_email)) {
			jQuery('[name="res_email"]').addClass('vaidate_error');
			hasError = true;
		}else{
			jQuery('[name="res_email"]').removeClass('vaidate_error');
		}
		}
		if(res_email_id=='')
		{
			jQuery('[name="res_email_id"]').addClass('vaidate_error');
			hasError = true;
		}else{
		if (!pattern.test(res_email_id)) {
			jQuery('[name="res_email_id"]').addClass('vaidate_error');
			hasError = true;
		}else{
			jQuery('[name="res_email_id"]').removeClass('vaidate_error');
		}
		}
		if(res_time=="")
		 {
			 jQuery('[name="res_time"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="res_time"]').removeClass('vaidate_error');
			 }
		if(res_date=="")
		 {
			 jQuery('[name="res_date"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="res_date"]').removeClass('vaidate_error');
			 }
		if(res_phone=="")
		 {
			 jQuery('[name="res_phone"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
		 	if( !number_validate.test(res_phone) ){
		 		jQuery('[name="res_phone"]').addClass('vaidate_error');
		 	}else{
		 		jQuery('[name="res_phone"]').removeClass('vaidate_error');
		 	}
			 }
		if(res_persons=="")
		 {
			 jQuery('[name="res_persons"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
		 	if( !number_validate.test(res_persons) ){
		 		jQuery('[name="res_persons"]').addClass('vaidate_error');
		 	}else{
			 jQuery('[name="res_persons"]').removeClass('vaidate_error');
			 }	
			 }					 
		if(res_message=="")
		 {
			 jQuery('[name="res_message"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="res_message"]').removeClass('vaidate_error');
			 }
		if(res_subject=="")
		 {
			 jQuery('[name="res_subject"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="res_subject"]').removeClass('vaidate_error');
		}	 		 
		if(hasError) { return; }
		else {	
			jQuery.ajax({
				type: 'post',
				url: cpath.plugin_dir + '/inc/reservation_form.php',
				data: 'res_email_id='+res_email_id +'&res_name=' + res_name + '&res_email=' + res_email  +'&res_phone=' + res_phone + '&res_persons=' + res_persons +'&res_date='+ res_date +'&res_time=' + res_time + '&res_subject=' + res_subject+ '&res_message=' + res_message,

				success: function(results) {	
					jQuery('div#response').html(results).css('display', 'block');		
				}
			}); // end ajax
		}
		});