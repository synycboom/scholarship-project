$('document').ready(function(){
	$('#activity-form').hide();
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
		var studentID = $("input#studentID").val();  
  		var password = $("input#password").val();    
  		var dataString = 'studentID='+ studentID + '&password=' + password + '&login=1';     
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
	        	$('#table-data').html(response);  
	        	$('.jumbotron').hide();
	        }  
	    });  
	    return false; 
	});

	$('#view-activity-form').click(function(){
		$('#activity-form').show();
		$('#welcome').hide();
	});

	$('#save').click(function(){
	    var date = $("#date").val();  
   		var startTime = $("#start-time").val();  
   		var endTime = $("#end-time").val();  
   		var dataString = 'date='+ date + '&startTime=' + startTime + '&endTime='+endTime; 
   		if(startTime<=endTime){
   			$('#validation-error').text('start time is less than or equal end time');
   		}
   		else{
   			$.ajax({  
		        type: "POST",  
		        url: "save_data.php",  
		        data: dataString,  
		        success: function(response) { 
		        }  
		    });  
   			$('#validation-error').text('added successfully');
   		}
   		return false;
	});


});