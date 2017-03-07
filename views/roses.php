
 <?php

mysql_connect("localhost","root","root");
mysql_select_db('sflora') or die("Not connected to the db");


 
$result = mysql_query("select * from sf_flowers_roses");


echo '<h1 class="page-header" style="color:#944D94;">Roses</h1>';

while ($data = mysql_fetch_array($result)) {
  $image_name = $data['Image'];
  $image_subCategory = $data['subCatogory'];
  $image_color = $data['color'];
  $image_price = $data['price'];
  $image_stock =$data['stock'];
  $image_extra = $data['extraDetails'];
  echo '
   
  <div class="placeholders" style="margin-top:40px;">
        <div class="col-xs-6 col-sm-3 placeholder">
        <a href="descriptive.php?main=Roses&sub='.$image_subCategory.'&color='.$image_color.'&extra='.$image_extra.'" >
              <img src="../img/Flowers/Roses/'.$image_name.'"  class="img-responsive" alt="Rose Flower Image">
        </a>      
              <p style="color:#944D94;">'.$image_subCategory.'</p>
              <h4 style="color:#944D94;">'.$image_color.' </h4>
              <span ng-show='.$image_stock.'!=0 class="text-muted" style="color:blue;">In stock &nbsp;<span class="badge" style="background-color: #8585E0;">'.$image_stock.'</span></span>
              <span ng-show='.$image_stock.'==0 class="text-muted" style="color:red;">Out of stock</span>             
                           <h5 style="color:#944D94;">Rs.'.$image_price.' each</h5>
        </div>
  </div>';
}
?>