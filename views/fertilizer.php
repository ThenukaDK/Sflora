
 <?php

mysql_connect("localhost","root","root");
mysql_select_db('sflora') or die("Not connected to the db");


 
$result = mysql_query("select * from sf_fertilizer");


echo '<h1 class="page-header" style="color:#944D94;">Fertilizer</h1>';

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
              
        <a href="descriptive.php?main=Fertilizer&sub='.$image_subCategory.'&color='.$image_color.'&extra='.$image_extra.'" >
              <img src="../img/Flowers/Fertilizer/'.$image_name.'"  class="img-responsive" alt="Fertilizer Image">
              <p>'.$image_subCategory.'</p>
              <h4>'.$image_color.' </h4>
         </a>     
              <span ng-show='.$image_stock.'!=0 class="text-muted" style="color:blue;">In stock &nbsp;<span class="badge" style="background-color: #8585E0;">'.$image_stock.'</span></span>
              <span ng-show='.$image_stock.'==0 class="text-muted" style="color:red;">Out of stock</span>             

              <h5 style="color:#944D94;">Rs.'.$image_price.' each</h5>
        </div>
  </div>';
}
?>