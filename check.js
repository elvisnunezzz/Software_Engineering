//  nav > file > login
	$("#login_to_db_submit").click(clickLogin);

function clickLogin(){
	$.post("php/login_to_db.php", 
	{
		username: $("#db_username").val(),
		password: $("#db_password").val(),
		submit: "login_to_db_submit"
	},
	function(data,status){
		// alert(data);
		var json = JSON.parse(data);
		var messageHTML = "";

		if( json.status == "failure" ){

		messageHTML = `<div class="row">
  			<div class="col-md-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    		<span aria-hidden="true">&times;</span>
			  		</button>
			  		<strong>${json.error}</strong> ${json.error_description}

          		</div>
  			</div>
  		</div>`;

		} else if( json.status == "success"){

			messageHTML = `<div class="row">
      			<div class="col-md-12">
  					<div class="alert alert-success alert-dismissible fade show" role="alert">
	          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    		<span aria-hidden="true">&times;</span>
				  		</button>
				  		<strong>Login Successful</strong> Welcome, ${json.name}!

	          		</div>
      			</div>
      		</div>`;
		}

		$("#MessageArea").append(messageHTML);
	});
}

