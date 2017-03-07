<?php
	session_start();
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	$table = $_GET['table'];
	
	if(isset($_POST['saveNew']))
	{
		$table = $_GET['table'];
		$Main_category = $_POST['new_Main_category'];
		$Sub_Category = $_POST['new_Sub_Category'];
		$Price = $_POST['new_Price'];
		$Stock = $_POST['new_Stock'];
		$Have_fowers = $_POST['new_Have_fowers'];
		$Color = $_POST['new_Color'];
		$Height = $_POST['new_Height'];
		$Climate = $_POST['new_Climate'];
		$Extra = $_POST['new_Extra'];
		$Image = $_POST['new_Image'];
		$addedDate = $_POST['new_addedDate'];
		
		//check duplicate entry and primary key not empty
		$checkQuerry = "select * from sf_flowers_".$table." where mainCatogory = '$Main_category' && subCatogory = '$Sub_Category' && color ='$Color'";
		$retval = mysql_query($checkQuerry);
		$row = mysql_num_rows($retval);
		if($row == 1 || $Main_category == '' || $Sub_Category == '' || $Color == ''){
			
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
			
			echo"<script>";
			echo"alert('No data entered! Enter unique data to each field!')";
			echo"</script>";
			
			echo "<script>";
			echo "location.href='".$_SERVER['HTTP_REFERER']."'";
			echo "</script>";
			
			
		}
		else{
			//if no error enter new flower details to db
			$querry = "insert into sf_flowers_".$table." values('$Main_category','$Sub_Category','$Price','$Stock','$Have_fowers','$Color','$Height','$Climate','$Extra','$Image','$addedDate')";
			$result = mysql_query($querry);
			
			echo"<script>";
			echo"alert('Data entered successfully!')";
			echo"</script>";
			
			echo "<script>";
			echo "location.href='".$_SERVER['HTTP_REFERER']."'";
			echo "</script>";
		}
		
	}
	
	if(isset($_POST['save'])){
		
		$tableName = $_GET['table'];
		$mainCatogory = $_POST['mainCatogory'];
		$subCatogory = $_POST['subCatogory'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$haveFlower = $_POST['haveFlower'];
		$color = $_POST['color'];
		$plantHeight = $_POST['plantHeight'];
		$climateCondition = $_POST['climateCondition'];
		$extraDetails = $_POST['extraDetails'];
		$Image = $_POST['Image'];
		$addedDate = $_POST['addedDate'];
		
		
		//querry to insert
		$insertQuerry = "update ".$tableName." set mainCatogory='$mainCatogory', subCatogory='$subCatogory', price='$price',
						stock='$stock', haveFlower='$haveFlower', color='$color', plantHeight='$plantHeight', 
						climateCondition='$climateCondition', extraDetails='$extraDetails', Image='$Image', addedDate='$addedDate'
						where mainCatogory='$mainCatogory' and subCatogory='$subCatogory' and color='$color'";
		
		mysql_query($insertQuerry) or die('Error!'.mysql_error());
		
		if(isset($_POST['picLoad'])){
		//upload the photo
		$target_path = "../img/Flowers/".$mainCatogory."/";
	
		if($_FILES['uploadedPic']['error']>0){
	
			echo 'Error:'. $_FILES['uploadedPic']['error']."</br>";
	
		}
		else{
			//echo "uploaded:". $_FILES['uploadedPic']['name']."</br>";
		}
	
		if(file_exists($target_path.$_FILES['uploadedPic']['name'])){
			echo $_FILES['uploadedPic']['name']. " already exists";
		}
	
		else{
			$target_path = $target_path . $_FILES['uploadedPic']['name'];
			if(move_uploaded_file($_FILES['uploadedPic']['tmp_name'], $target_path)){
				//echo "The file". $_FILES['uploadedPic']['name']." Has been uploaded";
				$filename = $_FILES['uploadedPic']['name'];
			}
			else{
				echo "Error in uploading the file";
			}
		}
		//enter flower name to DB
		$querry = "update ".$tableName." set Image='$filename' where mainCatogory='$mainCatogory' and subCatogory='$subCatogory' and color='$color' ";
		mysql_query($querry);
		
		
		}
		echo"<script>";
		echo"alert('Data Saved successfully!')";
		echo"</script>";
		
		echo "<script>";
		echo "location.href='".$_SERVER['HTTP_REFERER']."'";
		echo "</script>";
		//header("Location:adminPannelManageAnthurium.php?table=".$table."");
	}
	
	if(isset($_POST['delete'])){
		$tableName = $_GET['table'];
		$mainCatogory = $_POST['mainCatogory'];
		$subCatogory = $_POST['subCatogory'];
		$color = $_POST['color'];
		
		//delete querry
		$deleteQuerry = "delete from ".$tableName." where mainCatogory='$mainCatogory' and subCatogory='$subCatogory' and color='$color' ";
		mysql_query($deleteQuerry) or die('Error'.mysql_error()); 
		
		echo"<script>";
		echo"alert('Row Deleted successfully!')";
		echo"</script>";
		
		echo "<script>";
		echo "location.href='".$_SERVER['HTTP_REFERER']."'";
		echo "</script>";
	}
	
?>