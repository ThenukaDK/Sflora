<?php
session_start();
    include("includes/tihid_db.php");
    $userNameInTable = $_SESSION ['userNameInTable'];
    $userIdInTable = $_SESSION ['userIdInTable'];
?>

<!DOCTYPE html>
<html data-ng-app="sfloraHelp">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Message Box</title>
	<link href="css/mutebi.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="css/jquery-ui.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../js/rs-plugin/css/settings.css">
    <link href="../css/berry.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet"> 
	<style type="text/css">
.TestParent
{
    position: relative;
height:425px;
overflow-y
}

.messages{
    border: none;
    width: 100%;
    height: 450px;
    overflow-y:auto;


}
#userMessage
{
margin-right:2px;
background-color: #ffffff;
}
#userMessage a
{
    text-decoration: none;
    color: #944D94;
} 

#reply
{
margin-right:2px;
background-color: #F5EBF5;
}

@media (min-width: 768px ) {
  .row {
      position: relative;
  }

  .date-align{
    position: absolute;
    bottom: 5px;
    right: 25px;
  }
}

</style>
</head>
<body ng-controller="helpDivChangeController">
<div data-ng-include="'navbar.php'"></div>
<div>
    <div class="row-fluid">
        <div class="col-md-6">
            <div class="awidget-head col-md-offset-2">
                <h3 style="color:#944D94" class="page-header" >Message Us</h3>
            </div>
            <div class="awidget-body">


                <div class="form">
                    <form class="form-horizontal" name="send_message" method="POST" action="../sources/php/message-sent-page.php?userNameInTable=<?php echo $userNameInTable;?>" novalidate>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="address">Subject</label>
                           <div class="col-lg-6">
                            <input class="form-control col-lg-2" type="text" name="subject" ng-model="subject" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-lg-2" for="address">Message</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="message" rows="8" id="aboutme" data-ng-model="message" required></textarea>
                                <span style="color:#944D94" ng-hide="message.length==null">{{message.length}} of 1000</span>
                           
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-6 pull-right" >
                                <button type="submit" name="userMsg" ng-disabled="send_message.$invalid" href="javascript:;" class="btn btn-info col-md-offset-4" style="background-color:#944D94">Send Message</button>
                            </div>
                        </div>

                    <!-- <div class=" " ng-show="message!=null">Setting up your message
                                 {{message}}
                    </div> -->
                    </form>
                </div>
            </div>
    </div>
    
<div class=" col-lg-6">
    <h3 class="page-header" style="color:#944D94">Message Box</h3>
    <div class=" messages" id="Box">
	<?php

         $messagesForUserId = mysqli_query($connect,'select * from  sf_messages where userId='.'"'.$userIdInTable.'" order by dateTime ASC') or die("not run");
        $numOfRows = mysqli_num_rows($messagesForUserId);
		// Include the database 
		
		
		// Select all the links from the database
if($numOfRows>0) 
{       
                  		
		while($row = mysqli_fetch_array($messagesForUserId)){
			$linkId = $row['messageId'];
			$linkTitle = $row['subject'];
			$linkImg = $row['message'];
			$reply = $row['reply'];
            $dateTime = $row['dateTime'];
            $replyDateTime =$row['replyDateTime'];
             $valueReply = 1;
             $valueMessage = 1;
             if($reply==null){$valueReply=0;}
             // if($linkImg=='null'){$valueMessage=0;}
	?>
            <div class="link">
               
                <div class="entry">
                    

                    <ul class="ulList">
                        <li>
                            <div class="toggle">
                                 <div style="color:#944D94;">
                                    <div class=" well-copy col-xs-12" id="userMessage">
                                        <div class="row" style="margin-bottom:-20px;">
                                            <label><a href="viewProfile.php">You</a></label>
                                            <code style="color:#944D94;" class="date-align"><?php echo $dateTime;?></code>
                                            
                                            <!-- Delete button --> 
                                            <span class="option">
                                                    <a href="#" role="button" class="toggleBtn close" title="Delete"><span class="fa fa-trash-o"></span> </a>
                                            </span>
                                            <!-- confirmation -->
                                            <span class="option error col-md-offset-4">Are you sure?  
                                                    <a href="#" class="deleteComfirmed" id="deleteComfirmed<?php echo $linkId; ?>" title="Confirm delete">
                                                        yes
                                                    </a> / 
                                                    <a href="#" class="toggleBtn" title="Don't delete">
                                                        no
                                                    </a>
                                            </span>

                                            <!-- <button type="button" class="close" data-dismiss="alert" data-toggle="tooltip" data-placement="left" title="Delete"><span class="fa fa-trash-o"></span> </button> -->
                                        </div>
                                        <hr/>
                                   
                                        <div class="row" style="margin-top:-20px;">
                                            <p>Subject-<i><u><?php echo $linkTitle; ?></u></i></p>

                                                <b> <textarea readonly class=" form-control col-xs-12"><?php echo $linkImg ?></textarea></b>
                                           
                                         </div> 
                                            
                                    </div>

                        <!-- Reply div -->
                                 <div class="well-copy col-xs-12" id="reply" ng-show='<?php echo $valueReply ?>'==1>  
                                    <div class="row" style="margin-bottom:-20px;">
                                        <label>Sflora Team</label>
                                        <code style="color:#944D94;" class="date-align"><?php echo $replyDateTime;?></code>
                                         <!-- Delete button --> 
                                            <span class="option">
                                                    <a href="#" role="button" class="toggleBtn close" title="Delete"><span class="fa fa-trash-o"></span> </a>
                                            </span>
                                            <!-- confirmation -->
                                            <span class="option error col-md-offset-3">Are you sure?  
                                                    <a href="#" class="deleteComfirmed" id="deleteComfirmed<?php echo $linkId; ?>" title="Confirm delete">
                                                        yes
                                                    </a> / 
                                                    <a href="#" class="toggleBtn" title="Don't delete">
                                                        no
                                                    </a>
                                            </span>
                                        <!-- <button type="button" class="close" data-dismiss="alert" data-toggle="tooltip" data-placement="left" title="Delete"><span class="fa fa-trash-o"></span> </button> -->
                                    </div>
                                    <hr style="border-color:#ffffff;"/>
                                   
                                        <div class="row" style="margin-top:-20px;">
                                           <b><textarea readonly class=" form-control col-xs-12"> <?php echo $reply; ?></textarea></b>
                                        </div>  
                                 </div>
                            </div>

                               <!--      
                                <span class="option">
                                    <a href="#" role="button" class="toggleBtn" title="Delete">delete</a>
                                </span>
                                <span class="option error">are you sure?  
                                    <a href="#" class="deleteComfirmed" id="deleteComfirmed<?php echo $linkId; ?>" title="Confirm delete">
                                        yes
                                    </a> / 
                                    <a href="#" class="toggleBtn" title="Don't delete">
                                        no
                                    </a>
                                </span> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    <?php
		}
    }
     else 
         echo '<div class="alert alert-info" role="alert">Your message box is empty!</div>'; 
             
	?>
</div>
	
	<script src="../js/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
      
    <script src="../js/bootstrap.js"></script>
    <script src="../js/angular.js"></script>
    
	<script type="text/javascript" src="js/jquery-12.0.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/tihid.js"></script>
    
	
	

    <script src="../sources/controllers/help-div-change-controller.js"></script>
<script type="text/javascript">
    var box=document.getElementById('Box');
    box.scrollTop=box.scrollHeight;

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


</script>
</body>
</html>