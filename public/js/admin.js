$('document').ready(function(){
	$('#cancel').click(function(){
		$('#loginMessage').text("");
		$('#username').val("");
		$('#password').val("");
	});

	$('#logout').click(function(){
		var dataString = 'logout=1';
		$.ajax({  
	        type: "POST",  
	        url: "authentication.php",  
	        data: dataString,  
	        success: function(response){
	        	location.reload();
	        }
	    });  
	    return false;
	});

	$('#submit').click(function(){
		var username = $("input#username").val();  
  		var password = $("input#password").val();    
  		var dataString = 'username='+ username + '&password=' + password + '&login=1';     
  		$.ajax({  
	        type: "POST",  
	        url: "authentication.php",  
	        data: dataString,  
	        success: function(response) { 
	        	 
	            if(response == "true"){ 
		          $('#loginMessage').text(response);
		          $('#loginModal').hide();
		          location.reload();
		        }          		
          		else{
          			$('#loginMessage').text(response);
          		} 
	        }  
	    });  
	    return false; 
	});


	$('#registeredStudent').click(function(){      
  		$.ajax({  
	        type: "POST",  
	        url: "show_student_data.php",  	  
	        success: function(response) { 
	        	// alert(response);
	        	$('#table-data').html(response);  
	        	$('.jumbotron').hide();
	        }  
	    });  
	    return false; 
	});

	$('#authorizedStudent').click(function(){  
  		var dataString = 'status=1';     
  		$.ajax({  
	        type: "POST",  
	        url: "show_student_data.php",  
	        data: dataString,  
	        success: function(response) { 
	        	// alert(response);
	        	$('#table-data').html(response);  
	        	$('.jumbotron').hide();
	        }  
	    });  
	    return false; 
	});


});