$(document).ready(function(){
var arrTime = ['Every Minute', 'Every 2 Minutes', 'Every 3 Minutes', 'Every 4 Minutes', 'Every 5 Minutes', 'Every 6 Minutes', 'Every 10 Minutes', 'Every 12 Minutes', 'Every 15 Minutes', 'Every 20 Minutes', 'Every 30 Minutes', 'Every Hour', 'Every 2 Hour', 'Every 3 Hour', 'Every 4 Hour', 'Every 6 Hour', 'Every 8 Hour', 'Every 12 Hour', 'Every Day', 'Every 2 Days', 'Every 3 Days', 'Every 5 Days', 'Every 10 Days', 'Every 15 Days', 'Every Week', 'Every Month'];

var cronSchedule = [
	'* * * * *', 
	'*/2 * * * *', 
	'*/3 * * * *', 
	'*/4 * * * *',  
	'*/5 * * * *', 
	'*/6 * * * *', 
	'*/10 * * * *', 
	'*/12 * * * *', 
	'*/15 * * * *', 
	'*/20 * * * *', 
	'*/30 * * * *', 
	'0 * * * *', 
	'2 * * * *', 
	'3 * * * *', 
	'4 * * * *',
	'6 * * * * ',
	'8 * * * *',
	'12 * * * *',
	'0 0 * * *',
	'* * */2 * *',
	'* * */3 * ',
	'* * */4 * *',
	'* * */5 * *',
	'* * */10 * *',
	'* * */15 * *',
	'* * */14 * *',
	'59 23 28-31 * *',
	]

for(var i=0; i< arrTime.length;i++)
{
  jQuery('<option/>', {
        value: cronSchedule[i],
        html: arrTime[i]
        }).appendTo('#list select'); //appends to select if parent div has id dropdown
	}

	$('#btnSubmit').click(function(){
		var values = $('#myForm').serialize();
		$.ajax({
			url:"postCustomerData.php",
			type:"POST",
			data: values,
			 success: function (response) {
			 	// adds php response to the tag with this id. 
           $('#status_text').html(response); 
           // resets form
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

