 <h4 class="steps" style="padding-top:15px;">Step2 <span style="font-size:13px; font-weight:100;">(Choose a time slot)</span></h4>
<?php 
include("../include/config.php");
$cityid=stripslashes($_POST['id']);
$bookingdate=stripslashes($_POST['bookingdate']);
$query=mysql_query("select * from slots");
//echo "select * from booking where cityid=".$cityid." and booking_date='".$bookingdate."'";
$query_booked=mysql_query("select * from booking where centerid=".$cityid." and booking_date='".$bookingdate."'");
$arr=array();
while($rs_booking=mysql_fetch_array($query_booked)){	
//echo $rs_booking['bookingslot'];
$arr[]=$rs_booking['bookingslot'];
}
$i=0;
while($rs=mysql_fetch_array($query)){	


 if($rs['id']==$arr[$i])
 {
 	
?>
 <div class="slot slot1" style="background-color:#2e75b5;text-decoration: line-through;"> Booked :<?php echo $rs['timing']?><br></div>
<?php } 
else {
	?>

<div class="slot"><input type="radio" id="mycenter_booking" name="mycenter_booking" value="<?php echo  $rs['id']?>"><?php echo $rs['timing']?></div>
<?php
}
 $i++;} ?>
