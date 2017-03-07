<?php

mysql_connect("localhost","root","root");
mysql_select_db('sflora') or die("Not connected to the db");


 
$result = mysql_query("select * from sf_pots");


echo '<h1 class="page-header" style="color:#944D94;">Flower Pots</h1>';

while ($data = mysql_fetch_array($result)) {
  
  $image_name = $data['Image'];
  $made_of = $data['subCatogory'];
  $image_color = $data['color'];
  $image_price = $data['price'];
  $image_stock =$data['stock'];
  $image_extra = $data['extraDetails'];
  echo '
   
  <div class="placeholders" style="margin-top:40px;">
        <div class="col-xs-6 col-sm-3 placeholder">
        <a href="descriptive.php?main=Pots&sub='.$made_of.'&color='.$image_color.'&extra='.$image_extra.'" >
              <img src="../img/Flowers/Pots/'.$image_name.'"  class="img-responsive" alt="Pot Image">
        </a>      
              <p style="color:#944D94;">'.$made_of.'</p>
              <h4 style="color:#944D94;">'.$image_color.' </h4>
              <span ng-show='.$image_stock.'!=0 class="text-muted" style="color:blue;">In stock &nbsp;<span class="badge" style="background-color: #8585E0;">'.$image_stock.'</span></span>
              <span ng-show='.$image_stock.'==0 class="text-muted" style="color:red;">Out of stock</span>             
                           <h5 style="color:#944D94;">Rs.'.$image_price.' each</h5>
        </div>
  </div>';
}
?>