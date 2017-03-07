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
	
	$jobPositionInForm = $data['jobPosition'];
	$jobCompanyInForm = $data['jobCompany'];
	$jobAddressInForm = $data['jobAddress'];

	
?>
<div class="col-md-4 col-sm-4 sp-effect2">
					<form name="viewProfileCarrier" method="post" action="viewProfileCarrierToDB.php">
                        <div class="media feature">
							<div class="media-body">
                                <h3 class="media-heading">Position</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Job Position" name="carrierPosition" value="<?php echo $jobPositionInForm;?>">
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Company</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Working Company" name="carrierCompany" value="<?php echo $jobCompanyInForm;?>">
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Address</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Current workingplace" name="carrierAddress" value="<?php echo $jobAddressInForm;?>">
                                </div>
                            </div>
                        </div>
						
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
