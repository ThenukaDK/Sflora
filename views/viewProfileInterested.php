<?php
	session_start();
	
	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	$errMsg = "";
	
	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	
	if(! $conn) //if not connected
	{
		die('Could not connect to db'.mysql_error());
	}
	
	mysql_select_db("sflora"); //select datbase
	$currentUser = $_SESSION ['userNameInTable'];
	
	$sqlQry = "select * from sf_user where name='$currentUser' ";
	$retVal = mysql_query($sqlQry);
	$data = mysql_fetch_array($retVal);
	
	$intrstCatg1InForm	 = $data['intrstCatg1'];
	$intrstCatg2InForm	 = $data['intrstCatg2'];
	$intrstCatg3InForm	 = $data['intrstCatg3'];

	
?>
<div class="col-md-4 col-sm-4 sp-effect2">
					<form name="viewProfileCarrier" method="post" action="viewProfileInterestedToDB.php">
                        <div class="media feature">
							<div class="media-body">
                                <h3 class="media-heading">Catogory1</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="catagory1" name="interestedCatg1" value="<?php echo $intrstCatg1InForm;?>">
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Catogory2</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="catagory2" name="interestedCatg2" value="<?php echo $intrstCatg2InForm;?>">
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Catogory3</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="catagory3" name="interestedCatg3" value="<?php echo $intrstCatg3InForm;?>">
                                </div>
                            </div>
                        </div>
						
						<ul class="list-inline">
								<li>	
									<button type="submit" class="btn btn-default" name = "editbtn">
										<span class="fa fa-cogs fa-2x" style="color:#CC6699;"></span>Edit
									</button>
								</li>
								<li></li>	
								<li>								
									<button type="submit" class="btn btn-default" name="savebtn">
										<span class="fa fa-download fa-2x" style="color:#CC6699;"></span>Save
									</button>
								</li>
							</ul>
                    </form>
</div>