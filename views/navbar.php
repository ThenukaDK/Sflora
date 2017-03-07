<?php
	session_start();
	
	$userNameInTable = $_SESSION ['userNameInTable'];
	$userIdInTable = $_SESSION ['userIdInTable'];
	$userTypeInTable = $_SESSION ['userTypeInTable'];
	
	if($userTypeInTable == 'admin'){
		$type = 1;
	}
	else{
		$type = 0;
	}
	
	
	//retrive photo from Db
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	$querry = "select * from sf_user where userId = '$userIdInTable'";
	$result = mysql_query($querry); 
	$data = mysql_fetch_array($result);
	$image_name = $data['imgUrl'];
 ?>
<html>
<head>
 

<style type="text/css">

.typeahead, .tt-query, .tt-hint {
  border: 2px solid #CCCCCC;
  border-radius: 8px;
  font-size: 24px;
  height: 30px;
  line-height: 30px;
  outline: medium none;
  padding: 8px 12px;
  width: 396px;
}
.typeahead {
  background-color: #FFFFFF;
}
.typeahead:focus {
  border: 2px solid #944D94;
}
.tt-query {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
  color: #999999;
}
.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin-top: 12px;
  padding: 8px 0;
  width: 400px;
  color: #944D94;
}
.tt-suggestion {
  font-size: 24px;
  line-height: 24px;
  padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
  background-color:#944D94;
  color: #FFFFFF;
}
.tt-suggestion p {
  margin: 0;
}
</style>  


</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php" style="padding-top:0px;"><img src="../img/images/s2.png"></a>
        </div>
        <div class="navbar-collapse collapse" id="toggleBtn">
          <ul class="nav navbar-nav navbar-right" >
            <li><a href="adminPanel.php" data-ng-show="<?php echo $type;?>==1">Settings</a></li>
            <li class="csColor">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="viewProfile.php">View Profile</a></li>
				  <li><a href="purchaseHistory.php">Purchase History</a></li>
                  <li><a href="../sources/php/loginValidate.php?id=signout">Sign Out</a></li>

                </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="help-contactUs.php">About us</a></li>
				  <li><a href="help-messageUs.php">Contact</a></li>
                </ul>
              </li>
			<li>
				<img src="../img/userPic/<?php echo $userNameInTable.'/'.$image_name?>"" width="40" height="50">
			</li>
			<li>
				<div style="max-width:60px;">
					Welcome
					<?php 
						echo $_SESSION ['userNameInTable'];
					?> 
				</div>
			</li>
          </ul> 
          <form class="navbar-form" action="home.php" method="POST" >
          <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Find Flowers" required>
           <button type="submit" class="btn btn-default" name="sub" ><i class="fa fa-search" ></i>Search</button>
          </form>
  
        </div>
      </div>
    </div>


	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
    <script src="../js/typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>

   
    </body>
</html>