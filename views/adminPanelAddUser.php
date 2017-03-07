<?php
	session_start();
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	
?>
<hr>
<div align="center">
					<form name="viewProfilePersonal" method="post" action="adminPanelEditUser.php?id=1">
                        <div class="media feature">
							<div class="media-body">
                                <h3 class="media-heading">Name</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Full Name" name="personalName" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Email</h3>
								<div class="form-group">
                                        <input type="email" class="form-control-md" placeholder="Email" name="personalEmail" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Contact No</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Contact" name="personalContact" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Address</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Address" name="personalAddress" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">NIC No</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="NIC" name="personalNIC" value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Password</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Password" name="password" value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">User Type</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Type" name="Type" value=""/>
                                </div>
                            </div>
                        </div>
						
						<hr>
							<ul class="list-inline">
								<li></li>	
								<li>								
									<button type="submit" class="btn btn-default" name="savebtn">
										<span class="fa fa-download fa-2x" style="color:#CC6699;"></span>Save
									</button>
								</li>								
							</ul>
					</form>
</div>
<br>
<br>
<br>
<br>
