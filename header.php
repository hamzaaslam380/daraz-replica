<nav class="navbar navbar-expand-sm navbar-light bg-light" style="background-color:white">

	<a class="navbar-brand" href="index.php" style="margin-left:70px;margin-bottom:40px"> <img src="download.png" style="height:50px;width:150px"> </a>
  
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <form action="searchProductByIndex.php" method="post"class="form-inline my-2 my-lg-0" style="border:1px solid ghostwhite;display:inline;background-color:ghostwhite">
      <input class="form-control mr-sm-2" name="id" type="search" placeholder="Search in Daraz" aria-label="Search" style="width:400px;height:40px;margin-left:100px">
        <button type="submit" class="btn btn-info" name="search" value="search"style="background-color:orange;width:40px;height:38px">
		<span class="glyphicon glyphicon-search" style="color:white"></span>
		</button>
    </form>
	
	</div>
  
	<ul class="navbar-nav mr-auto" style="font-size:25px">
		<li class="nav-item">
			<a class="nav-link" href="login.php">LOGIN</a>
		</li>
		<li class="nav-item" style="margin-right:20px">
			<a class="nav-link" href="register.php">SIGNUP</a>
		</li>
		<a href="cart.php" class="btn btn-info btn-lg" style="margin-left:10px;margin-top:3px;background-color:orange">
          <span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
    </ul>
	
</nav>