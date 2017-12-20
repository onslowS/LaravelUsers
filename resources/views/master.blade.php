<html>
    <head>
    	<style>
			ul {
			    list-style-type: none;
			    margin: 0;
			    padding: 0;
			    overflow: hidden;
			    background-color: #333;
			}

			li {
			    float: left;
			}

			li a {
			    display: block;
			    color: white;
			    text-align: center;
			    padding: 14px 16px;
			    text-decoration: none;
			}

			/* Change the link color to #111 (black) on hover */
			li a:hover {
			    background-color: #111;
			}
		</style>
    </head>
    <body style="margin:0px;">
    	<ul>
		 <li><a href="/">Home</a></li>
		 @if(Auth::check())
		 <li><a href="/logout">Logout</a></li>
		 <li><a href="/myprofile">{{Auth::user()->email}}</a></li>
		 @if(Auth::user()->type == "admin")
		 	<li><a href="/admin">Admin</a></li>
		 @endif
		 @else
		 <li><a href="/register">Register</a></li>
		 <li><a href="/login">Login</a></li>
		 @endif
		</ul>
		<div class="container" style="margin:20px;">
		    @yield('content')
		</div>
    </body>
</html>