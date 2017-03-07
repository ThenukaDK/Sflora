<?php
	session_start();
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	$table = $_GET['table'];
?>
<hr>
<div align="center">
					<form name="addflowerToDb" method="post" action="addFlowersToDb.php?table=<?php echo $table;?>">
                        <div class="media feature">
							<div class="media-body">
                                <h3 class="media-heading">Main catogory</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Main catogory" name="new_Main_category" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Sub Catogory</h3>
								<div class="form-group">
                                        <input type="Sub Catogory" class="form-control-md" placeholder="Sub Catogory" name="new_Sub_Category" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Price</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Price" name="new_Price" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Stock</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Stock" name="new_Stock" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Have Flower</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="HaveFlower" name="new_Have_fowers" value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Color</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Color" name="new_Color" value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Height</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Height" name="new_Height" value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Climate Condition</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Climate Condition" name="new_Climate"  value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Extra Details</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Extra details" name="new_Extra" value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Image</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Image" name="new_Image" value=""/>
                                </div>
                            </div>
                        </div>
						<div class="media feature">
                            <div class="media-body">
                                <h3 class="media-heading">Added Date</h3>
								<div class="form-group">
                                        <input type="text" class="form-control-md" placeholder="Added Date" name="new_addedDate" value=""/>
                                </div>
                            </div>
                        </div>
						
						<hr>
							<ul class="list-inline">
								<li></li>	
								<li>								
									<button type="submit" class="btn btn-default" name="saveNew">
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
