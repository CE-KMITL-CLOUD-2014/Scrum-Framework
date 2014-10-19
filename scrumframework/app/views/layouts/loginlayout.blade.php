<html ng-app="{{ 1==2 ? 'aaa' : 'todoApp'}}">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="media/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="media/font-awesome/css/font-awesome.min.css">
		<style>
			.pink{
				color: #fff;
				background-color:#F4726D;
			}
			.pink:hover{
				color: #fff;
				background-color:#FA726D;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation" style="margin-bottom:0px;">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				  	</button>
					<a class="navbar-brand" href="#">Scrum Framework 1.0</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">What's Scrum Framework</a></li>						
						<li><a href="#">About</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
			        	<li class="dropdown">		
				        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">+Board <span class="caret"></span></a>
				        	<ul class="dropdown-menu" role="menu">
					            <li><a href="#">Board1</a></li>
					            <li><a href="#">Board2</a></li>
					            <li><a href="#">Board3</a></li>
					            <li class="divider"></li>
				            	<center><button type="button" class="btn pink"  data-toggle="modal" data-target="#myModal">Add new board</button></center>
				        	</ul>
				        	<!--<li><a>Username</a></li>-->
				        </li>
				        <li><a href="#">Username</a></li>
				        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"> Sign out</i></a></li>
			    	</ul> 
				</div><!-- /.navbar-collapse -->				
			</div><!-- /.container-fluid -->
		</nav>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">Create new board</h4>
			      </div>
			      <div class="modal-body">
			        <form role="form">
					  <div class="form-group">
					    <label for="BoardName">Board name</label>
					    <input type="email" class="form-control" id="board_name" placeholder="Board name">
					  </div>
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn pink">Create</button>
			      </div>
			    </div>
			  </div>
			</div>
							
			@yield('slidebar')
			
			@yield('body')

		<script src="media/js/jquery-1.11.1.min.js"></script>
		<script src="media/js/jquery-ui.min.js"></script>		
		<script src="media/js/bootstrap.min.js"></script>
		<script src="media/js/angularjs/angular.min.js"></script>
		<script src="media/js/angularjs/angular-dragdrop.min.js"></script>
		<script src="media/js/angularjs/todo.js"></script>
	</body>
</html>
