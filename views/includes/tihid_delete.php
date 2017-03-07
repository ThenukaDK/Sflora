<?php
if(!isset($_POST["linkId"])){
	echo "Error";
	exit();
}else{
	require("tihid_db.php");
	 $linkId = mysqli_real_escape_string($connect, $_POST["linkId"]);
	$check = mysqli_query($connect, "SELECT * FROM sf_messages WHERE messageId = '$linkId' LIMIT 1") or die("not run");
	 // while ($data = mysqli_fetch_array($check)) 
  //                       {
  //                           $message = $data['message'];
  //                           $reply = $data['reply'];
  //                           if ($reply==null) 
  //                           	{
		// 							             $query = mysqli_query($connect, "DELETE FROM sf_messages WHERE messageId = '$linkId' LIMIT 1") or die(mysqli_error());
  //                           	}

  //                           else if($reply!=null)
  //                          		 {
  //                          		 	$query = mysqli_query($connect,"UPDATE sf_messages SET message='' WHERE messageId= '$linkId' LIMIT 1")or die(mysqli_error());
  //                           	}
  //                           else if ($message==null) {
  //                              $query = mysqli_query($connect, "DELETE FROM sf_messages WHERE messageId = '$linkId' LIMIT 1") or die(mysqli_error());
                              
  //                           }
  //                           else if($message!=null)
  //                              {
  //                               $query = mysqli_query($connect,"UPDATE sf_messages SET reply='' WHERE messageId= '$linkId' LIMIT 1")or die(mysqli_error());
  //                             }
  //                          } 
	$query = mysqli_query($connect, "DELETE FROM sf_messages WHERE messageId = '$linkId' LIMIT 1") or die(mysqli_error());
}
?>