<?php 
include("../include/config.php");
if($_POST['id']){

	 $_POST['id']; 
$query=mysql_query("SELECT * FROM `mdscenter` where id='".$_POST['id']."'");

$weeklyoff="";
while($rs=mysql_fetch_array($query)){
	 $rs['weeklyOff'];
	 $weeklyoff= $rs['weeklyOff'];
	 $leave="";
	 if($weeklyoff=="Monday"){
	 	$leave="1";
	 }
	  if($weeklyoff=="Tuesday"){
	 	$leave="2";
	 }
	  if($weeklyoff=="Wednesday"){
	 	$leave="3";
	 }
	  if($weeklyoff=="Thrusday"){
	 	$leave="4";
	 }
	  if($weeklyoff=="Friday"){
	 	$leave="5";
	 }
	  if($weeklyoff=="Saturday"){
	 	$leave="6";
	 }
	   if($weeklyoff==="Sunday"){
	 	$leave="0";
	 }
	 


}
}
else {
}

?>

 <input type="textbox" onchange="mycity(12);" name="date1" value="-Select Date-" id="txtDate" class="slot_date"/>


<script type="text/javascript">
	$(function () {

            // 0 = monday, 1 = tuesday, 2 = wednesday, 3 = thursday,
            // 4 = friday, 5 = saturday, 6 = sunday
/*
    var d = new Date();
    var n = d.getDay()

var d1 = new Date();
    var n1 = d1.getDay()+1

    */
 var daysToDisable = [<?php echo $leave;?>];
 // var daysToDisable = [1];

            $('#txtDate').datepicker({
                beforeShowDay: disableSpecificWeekDays,
minDate: 2
            });

            function disableSpecificWeekDays(date) {
                var day = date.getDay();
                for (i = 0; i < daysToDisable.length; i++) {
                    if ($.inArray(day, daysToDisable) != -1) {
                        return [false];
                    }
                }
                return [true];
            }
        });
        </script>