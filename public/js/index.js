$('document').ready(function(){
	$('#validationErrorModal').hide(); 
	$('#confirmationModal').hide();
	
	//to see the code that open a modal,go and see it in validator.js -> Validator.prototype.onSubmit
	//after when validator has renderred modal,and user is sure and press submit btn 
	$('#realSubmit').click(function(){
		//submit form to the tartget page
		document.getElementById("registerForm").submit();
	});
	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0; i<ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1);
	        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    	}
    	return "";
	}
	var invalidRegister = getCookie("invalidRegister");
	if(invalidRegister === "yes"){
		$('#validationErrorModal').modal('show'); 
		document.cookie="invalidRegister=no;path=/";
	}	
});