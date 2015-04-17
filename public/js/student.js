$('document').ready(function(){
	$('#validation-success').hide();
	$('#validation-error').hide();

	var deleteID;

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
	        	 
	            if(response == "Password verified :)"){ 
		          $('#loginMessage').text(response);
		          location.reload();
		        }          		
          		else{
          			$('#loginMessage').text(response);
          		} 
	        }  
	    });  
	    return false; 
	});






	$('#view-activity-form').click(function(){
		$('#activity-form').show();
		$('#welcome').hide();
	});

	$('#saveActivity').click(function(){

	    var td = $("#date").val();
   	    var startTime = $("#start-time").val();  
   		var endTime = $("#end-time").val();  
   		var totalTime = diff(startTime,endTime);
   		var dataString = 'date='+ td + '&startTime=' + startTime + '&endTime='+endTime+"&totalTime="+totalTime; 
   		var date = Date.parse(td) || 0;	
   		if(startTime>=endTime && date == 0){
   			$('#validation-error-M').text('End time is less than or equal start time. Invalid date!!');
   		}
   		else if(date == 0){
   			$('#validation-error-M').text('Invalid date');
   		}
   		else if(startTime>=endTime){
   			$('#validation-error-M').text('End time is less than or equal start time');
   		}
   		else{
   			$.ajax({  
		        type: "POST",  
		        url: "data_management.php",  
		        data: dataString,  
		        success: function(response) { 
		        }  
		    });  
   			$('#validation-error-M').text('added successfully');
   			setTimeout(function() {
		        			location.reload();
						}, 1200);
   			}
    	 return false;
	});

	$('#resetPassClick').click(function(){

		var currentPassword = $("#currentPassword").val();  
		var newPassword = $("#newPassword").val();  
		var reNewPassword = $("#reNewPassword").val();  
		var dataString = 'currentPassword='+ currentPassword + '&newPassword=' + newPassword + '&reNewPassword='+reNewPassword; 
		if(currentPassword=="" || newPassword == "" || reNewPassword == ""){
			$('#validation-error').show();
			$('#validation-error').text('some fields are empty');
		}
		else if( newPassword != reNewPassword){
			$('#validation-error').show();
			$('#validation-error').text('New password and Re-New password are not the same');
		}
		else{
			$('#validation-error').hide();
			$.ajax({  
		        type: "POST",  
		        url: "authentication.php",  
		        data: dataString,  
		        success: function(response) { 
		        	if(response == "Current password is not valid"){
		        		$('#validation-error').show();
		        		$('#validation-error').text(response);
		        	}
		        	else{
		        		$('#validation-success').show();
		        		$('#validation-success').text(response);
		        		setTimeout(function() {
		        			window.location.href = "../student/";
						}, 1000);
		        	}
		        	
		        }  
			});  
	   		
		}
  		return false;
	});
	
	$('.deleteModal').click(function(){
	    deleteID = $(this).attr('id');
	    $('#delete-modal').modal('show');
	});

	$('#deleteButton').click(function(){
		window.location.href = "?deleteID="+deleteID; 
	});


});



function diff(start, end) {
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);

    // If using time pickers with 24 hours format, add the below line get exact hours
    if (hours < 0)
       hours = hours + 24;

    return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
}