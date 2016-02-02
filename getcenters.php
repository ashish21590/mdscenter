<?php
include("../include/config.php");
if($_POST['cityid']){

$city=stripslashes($_POST['cityid']);
$mybookingdate=stripslashes($_GET['cityid']);
}
//echo "SELECT * FROM `mdscenter` where city='".$city."'";
//echo "SELECT * FROM `mdscenter` where city='".$city."";
$query=mysql_query("SELECT * FROM `mdscenter` where city='".$city."'");

?>
  
  <select name="center" id="mycenter1" onchange="mycity(this.value);" class="slot_mds">
 <option value="B">-Select Center-</option>
 <?php
$weeklyoff="";
while($rs=mysql_fetch_array($query)){
	
  ?>
    <option value="<?php echo $rs["id"]; ?>"><?php echo $rs['centerName'];?></option>

    <?php } ?>

  </select>
  <?php echo $leave;?>
