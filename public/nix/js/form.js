//validations
	
$(document).ready(function() { 
	$('form[id="text"]').validate({ 
	rules: {
	 text: { required: true, minlength: 2,
     },
    }, 
    messages: { 
    text: '! Please, type at least 2 characters !',
    }
  });
});