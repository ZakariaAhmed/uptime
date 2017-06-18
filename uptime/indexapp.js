$(document).ready(function(){
	
	$('#matbutton').click(function(){
		var values = $('#customerForm').serialize();
		$.ajax({
			url:"data.php",
			type:"POST",
			data: values,
			 success: function (response) {
          // INSERTs php RESPONSE INTO TABLE
          $('#status_text').html(response);

          // RESETS FORM AFTER SUBMIT
          $('#customerForm').each(function(){
          		this.reset();
          });         
		},
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        	}

		});
	});
});