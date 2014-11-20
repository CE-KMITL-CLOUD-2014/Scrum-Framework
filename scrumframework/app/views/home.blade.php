@extends('layouts.base')

@section('body')
	<div id="home" class="jumbotron" style="margin-top:0px; margin-bottom:0px; background: url('media/img/bg.jpg') center no-repeat #f4726d; height:90%; overflow:hidden position:relative;">
		<h1 style="color:#fff; text-align:center; ">Scrum Framework</h1>
		<div class="col-md-5"  align="center" style="margin:0 auto; display:block; float:none;">
			<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#userSignup" style="width:30%; opacity: 0.9; background-color:#f4726d; color:#fff;">Sign up</button>
			<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#userLogin" style="width:30%; opacity: 0.8; background-color:#f4726d; color:#fff; margin-left:5%;">Login</a>
		</div>
		<ul class="col-sm-6 col-sm-offset-3 col-xs-offset-2" style="padding-left:5%; margin-top:5%; color:#fff;">
			@foreach($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
		</ul>
	</div>	
	
	<div id="scrum" class="jumbotron container-fluid" style="background-color:#ecf0f1; margin-top:0px; margin-bottom:0px;">
		<div class="col-md-12"><p align="center" style="color:#34495e; font-size:300%;"><b>WHAT IS SCRUM?</b></p></div>
		<p>
			Scrum is a development framework in which cross-functional teams develop products or projects in an iterative, incremental manner.
		</p>
		<div class="col-md-12">
			<img src="{{url('media/img/scrum.png');}}" alt="scrum" style="width:100%;">
		</div>
	</div>
	
	<div id="about" name="about" class="jumbotron" style="background-color:#34495e; margin-top:0px; margin-bottom:0px; height:400px;">
		<div class="col-md-12"><p align="center" style="color:#fff; font-size:300%;"><b>SPECIAL THANKS</b></p></div>
		<div class="col-xs-6 col-md-3">
			<div>
				<img src="{{url('media/img/laravel.png');}}" alt="laravel" style="width:70%">
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="thumbnails">
				<img src="{{url('media/img/angularjs.png');}}" alt="angularjs" style="width:70%">
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="thumbnails">
				<img src="{{url('media/img/mongodb.png');}}" alt="mongodb" style="width:70%">
			</div>
		</div>
		<div class="col-xs-6 col-md-3">
			<div class="thumbnails">
				<i class="fa fa-flag-o" style="font-size:1300%; color:#ecf0f1;"></i>
			</div>
		</div>
	</div>

	<!--MODAL FORM VALIDATION-->	
	<div class="modal fade" id="userSignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-sm">
			<div class="modal-content">
				<form role="form" method="post" action="{{ url('/signup') }}">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Sign up</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
					    	<label for="input-email">Email address</label>
							<input type="email" class="form-control" id="input-email" placeholder="Enter email" name="email">
						</div>
						<div class="form-group">
							<label for="input-password">Password</label>
							<input type="password" class="form-control" id="input-password" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<label for="input-confirmpassword">Confirm Password</label>
							<input type="password" class="form-control" id="input-confirmpassword" placeholder="Confirm Password" name="password_confirmation">
						</div>				  							
					</div>	
					<div class="modal-footer">
						<button type="submit" class="btn" style="background-color:#f4726d; color:#fff;" value="Submit">Sign Up</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>			
					</div>
				</form>		
			</div>
	  	</div>
	</div>
	<!--MODAL LOGIN-->
	<div class="modal fade" id="userLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<form role="form" method="post" action="{{ url('/main') }}">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Log in</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
					    	<label for="input-email">Email address</label>
							<input type="email" class="form-control" id="input-email" placeholder="Enter email" name="email">
						</div>
						<div class="form-group">
							<label for="input-password">Password</label>
							<input type="password" class="form-control" id="input-password" placeholder="Password" name="password">
						</div>			  							
					</div>	
					<div class="modal-footer">
						<button type="submit" class="btn" style="background-color:#f4726d; color:#fff;" value="Submit">Log in</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>			
					</div>
				</form>		
			</div>
		</div>
	</div>
@stop
