$('document').ready(function(){

	var moreDetailID;
	var state2 = false;
	var isComplete = false;

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

	$(".changeStatus").click(function(){
		var id = $(this).attr('id');
		var dataString = "id="+id;
		$.ajax({  
	        type: "POST",  
	        url: "data_management.php",  
	        data: dataString,  
	        success: function(response) { 
	        	$('.'+id).html(response);
	        }  
	    });
	    return false; 
	});

	$('.moreDetail').click(function(){
		isComplete = false;
		moreDetailID = $(this).attr('id');
		$('#resetPasswordFooter').hide();
		$('#more-detail-modal').modal('show');

	});

	$('.moreDetailVerified').click(function(){
		isComplete = true;
		moreDetailID = $(this).attr('id');
		$('#resetPasswordFooter').hide();
		$('#more-detail-modal').modal('show');

	});

	$('#accountSetting').click(function(){
		var dataString = "moreDetailID="+moreDetailID;
		$("#resetPasswordFooter").show();
		if(isComplete){
			$('.setCompleteButton').hide();
			$('.setInCompleteButton').show();
		}
		else{
			$('.setInCompleteButton').hide();
			$('.setCompleteButton').show();
		}
		$.ajax({  
	        type: "POST",  
	        url: "data_management.php",  
	        data: dataString,  
	        success: function(response) { 
	        	$("#detail-body-modal").html(response);
	        }  
	    });
	    state2 = true;
	    return false; 
	});

	$('.setInCompleteButton').click(function(){
		var dataString = "setInCompleteID="+moreDetailID;
		$.ajax({  
	        type: "POST",  
	        url: "data_management.php",  
	        data: dataString,  
	        success: function(response) { 
	        	$('#detail-body-modal').html(response);
	        	$("#resetPasswordFooter").hide();
	        	setTimeout(location.reload(),500);
	        }  
	    });
	    return false; 
	});

	$('.setCompleteButton').click(function(){
		var dataString = "setCompleteID="+moreDetailID;
		$.ajax({  
	        type: "POST",  
	        url: "data_management.php",  
	        data: dataString,  
	        success: function(response) { 
	        	$('#detail-body-modal').html(response);
	        	$("#resetPasswordFooter").hide();
	        	setTimeout(location.reload(),500);
	        }  
	    });
	    return false; 
	});

	

	$('#activityDetail').click(function(){
		state2 = true;
		var dataString = "detailID="+moreDetailID;
		$.ajax({  
	        type: "POST",  
	        url: "data_management.php",  
	        data: dataString,  
	        success: function(response) { 
	        	$('#detail-body-modal').html(response);
	        }  
	    });
	    return false; 
	});


	$('.resetPasswordButton').click(function(){
		var dataString = "resetPasswordID="+moreDetailID;
		$.ajax({  
	        type: "POST",  
	        url: "data_management.php",  
	        data: dataString,  
	        success: function(response) { 
	        	$('#detail-body-modal').html(response);
	        	$("#resetPasswordFooter").hide();
	        	setTimeout(location.reload(),500);
	        }  
	    });
	    return false; 
	});

	//reload modal when clicking outside
	$('#more-detail-modal').on('hidden.bs.modal', function () {
		if(state2){
			location.reload();
		}
	})
});