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
	
	//retrive db data
	$currentUser = $_SESSION ['userNameInTable'];
	
	$sqlQry = "select * from sf_user where name='$currentUser' ";
	$retVal = mysql_query($sqlQry);
	$data = mysql_fetch_array($retVal);
	
	$nameInForm = $data['name'];
	$emailInForm = $data['email'];
	$contactInForm = $data['contact'];
	$addressInForm = $data['address'];
	$nicInForm = $data['nic'];
	
?>

<div class="col-md-4 col-sm-4 sp-effect2">
					<form name="viewProfilePersonal" method="post" action="viewProfilePersonalToDB.php">
                        <div class="media feature">
							<div class="media-body">
                                <h3 class="media-heading">Name</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Full Name" name="personalName" value="<?php echo $nameInForm;?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Email</h3>
								<div class="form-group">
                                        <input type="email" class="form-control-md" placeholder="Email" name="personalEmail" value="<?php echo $emailInForm;?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Contact No</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Contact" name="personalContact" value="<?php echo $contactInForm;?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Address</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Address" name="personalAddress" value="<?php echo $addressInForm;?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">NIC No</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="NIC" name="personalNIC" value="<?php echo $nicInForm;?>">
                                </div>
                            </div>
                        </div>
						
						<hr>
							<ul class="list-inline">
								<li>	
									<button type="submit" class="btn btn-default" name="editbtn">
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
