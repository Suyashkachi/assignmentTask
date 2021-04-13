<!DOCTYPE html>
<html>
<title>Assignment Task</title>
<head>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="bg">
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form id="registerForm" class="form-horizontal" method="POST" action="{{route('register')}}">
				{{csrf_field()}}
				<div class="panel panel-primary vertical-center">
					<div class="panel-heading text-center">Register</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
								@if ($errors->has('name'))
								<span class="text-danger">{{ $errors->first('name') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Email:</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
								@if ($errors->has('email'))
								<span class="text-danger">{{ $errors->first('email') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="password">Password:</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
								@if ($errors->has('password'))
								<span class="text-danger">{{ $errors->first('password') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="phone">Phone:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
								@if ($errors->has('phone'))
								<span class="text-danger">{{ $errors->first('phone') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="street">Street:</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="street" placeholder="Enter Street" name="street"></textarea>
								@if ($errors->has('street'))
								<span class="text-danger">{{ $errors->first('street') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="city">City:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
								@if ($errors->has('city'))
								<span class="text-danger">{{ $errors->first('city') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="state">State:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="state" placeholder="Enter State" name="state">
								@if ($errors->has('state'))
								<span class="text-danger">{{ $errors->first('state') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="zip">Zip:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="zip" placeholder="Enter Zip" name="zip">
								@if ($errors->has('zip'))
								<span class="text-danger">{{ $errors->first('zip') }}</span>
								@endif
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-success">Submit</button>
						<button class="btn btn-default">Reset</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
</body>
<script type="text/javascript" src="{{asset('js/lib/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/lib/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/lib/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/lib/additional-methods.min.js')}}"></script>
<script type="text/javascript">
	$(function() {
		jQuery.validator.addMethod("accept", function(value, element, param) {
	        return value.match(new RegExp("^" + param + "$"));
	    });
	    jQuery.validator.addMethod("check", function(value, element) {
	        return this.optional(element) || (parseInt(value) > 0);
	    });

	    $("#registerForm").validate({
	        ignore: [],
	        errorClass: "text-danger",
	        errorElement: "span",
	        errorPlacement: function(e, a) {
	            jQuery(a).parents(".form-group > div").append(e)
	        },
	        highlight: function(e) {
	            jQuery(e).closest("span").addClass("text-danger")
	        },
	        success: function(e) {
	            jQuery(e).closest("span").removeClass("text-danger"), jQuery(e).remove()
	        },
	        rules: {
	            "name": {
	                required: !0,
	                accept: "[a-zA-Z]+"
	            },
	            "email": {
	                required: !0,
	                email:true
	            },
	            "password": {
	            	required: !0,
	                minlength: 8
	            },
	            "phone": {
	                required: !0,
	                accept: "[0-9]+"
	            },
	            "street": {
	            	required: !0
	            },
	            "city": {
	            	required: !0,
	            	accept: "[a-zA-Z ]+"
	            },
	            "state": {
	            	required: !0,
	            	accept: "[a-zA-Z]+"
	            },
	            "zip": {
	            	required: !0,
	            	accept: "[0-9]+"
	            }
	        },
	        messages: {
	            "name": {
	                required: "Please enter name",
	                accept: "Name accepts only alphabets"
	            },
	            "email": {
	                required: "Please enter email",
	                email: "Please enter a valid email"
	            },
	            "password": {
	            	required: "Please enter password",
	                minlength: "Password should not be less that 8 characters"
	            },
	            "phone": {
	                required: "Please enter phone",
	                accept: "Phone accepts only numbers"
	            },
	            "street": {
	            	required: "Please enter street"
	            },
	            "city": {
	            	required: "Please enter city",
	            	accept: "City accepts only alphabets"
	            },
	            "state": {
	            	required: "Please enter state",
	            	accept: "State accepts only alphabets"
	            },
	            "zip": {
	            	required: "Please enter zip",
	            	accept: "zip accepts only numbers"
	            }
	        }
	    });
	});
</script>
</html>