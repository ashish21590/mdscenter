<?php
include("../include/config.php");
/*
if(!$_SESSION['userid']){
header("location:index.php");
}
*/
$msg="";
if(isset($_POST['Submit'])){

$query=mysql_query("select * from booking where userid='".$_SESSION['userid']."'");
  $rows_check=mysql_num_rows($query);
 if($rows_check>0){

 	$msg= "Already Booked a slot";
 }
 else{

//echo "insert into booking (userid,bookingslot,booking_date,cityid,centerid) values('".$_SESSION['userid']."','".$_POST['mycenter_booking']."','".$_POST['date1']."','".$_POST['city']."','".$_POST['center']."')"; exit;
mysql_query("insert into booking (userid,bookingslot,booking_date,cityid,centerid) values('".$_SESSION['userid']."','".$_POST['mycenter_booking']."','".$_POST['date1']."','".$_POST['city']."','".$_POST['center']."')");
$_SESSION['user_booking_id']=mysql_insert_id();
header('location:thankyou.php');

 }

	//header("location:demomdscenter1.php?city='".$city."'&date='".$date."'");
}

$query=mysql_query("SELECT * FROM `mdscenter` group by `city`");

?>
<?php 
include('header.php');
?>
 <div class="bg_overlay">
  
          <div class="container-fluid">
        	<div class="body_content">
             <div class="row" style="margin:0">
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                 <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 introduction_con slot_page" >
                   <h1 class="text-uppercase login-maruti"><span>Book a Driving Test at your nearest</span><br>Maruti Driving School </h1>                  
                    <hr>
                   <p class="text-center">Follow the steps below to book your road test timing</p>
                   <a href="http://www.youngdrivers.in/mds-centres.php" style="color: #c7302b;
    text-decoration: none;font-size: 23px;">Click here to view the mds center in your city.</a>
                   <div id="error_msg" style="color: #c7302b; font-size: 23px;"></div>
                   <div style="color: #c7302b; font-size: 23px;"><?php echo $msg; ?></div>
    <form name="myform" method="post" action="" class="login_page">
    <span class="steps">Step1</span>

    <div class="wrapper">
    <div class="first1">
    <select name="city" id="city" onchange="mycenter(this.value);" placeholder="City" class="slot_city">
    <option value="A">-SELECT CITY-</option>
     <?php
    
    while($rs=mysql_fetch_array($query)){
      ?>
        <option value="<?php echo $rs["city"]; ?>"><?php echo $rs['city'];?></option>
    
        <?php } ?>
    
      </select></div>
      <div id="mycity">
<select class="slot_mds" placeholder="Select Center">
        <option value="A">-SELECT CENTER-</option>
</select>
      </div>
     
      <div id="datefunctionality" class="third1">
        <input type="text" id="txtDate" name="" value="-Select Date-" class="slot_date">
      </div>
    </div>
  
      <div id="mytimeslot"></div>
     <div id="mytimeslot1"><img src="peploading.gif" style="display:none;position:absolute:left: 41%;" class="mypos"  id="loadinggif"/></div>

     <input type="submit" name="Submit" value="Book Appointment" onclick="return validate();" class="slot_go"> 
      </form>
  </div>
					</div>
                    </div>
                    </div>
                <div class="offer_tag">
                   <img src="../images/win-prize-tag.png" class="img-responsive">
                </div> <!--/offer_tag-->
             </div> 
                    
                    </div>
                    </div>
  </div>
   <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css"
        type="text/css" media="all" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">
function currentdate(){
var selecteddated=$("#txtDate").val();
//var mydate =new Date(year, month, day, hours, minutes, seconds, milliseconds);
//alert(mydate);
var today = new Date();
var tomorrow=new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

var dd1 = tomorrow.getDate()+1;
var mm1 = tomorrow.getMonth()+1; //January is 0!
var yyyy1 = tomorrow.getFullYear();


if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

if(dd1<10) {
    dd1='0'+dd1
} 

if(mm1<10) {
    mm1='0'+mm1
} 


today = mm+'/'+dd+'/'+yyyy;
tomorrow = mm1+'/'+dd1+'/'+yyyy1;
//alert(tomorrow);

if(selecteddated==today){
  $("#error_msg").html("You can not select today and tomorrow");
	//alert("You can not select today and tomorrow");
//alert(today);
return false;
}

}
	/*
	$(function () {

            // 0 = monday, 1 = tuesday, 2 = wednesday, 3 = thursday,
            // 4 = friday, 5 = saturday, 6 = sunday
/*
    var d = new Date();
    var n = d.getDay()

var d1 = new Date();
    var n1 = d1.getDay()+1
    */
          /*  var daysToDisable = [6];

            $('#txtDate').datepicker({
                beforeShowDay: disableSpecificWeekDays
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
*/



  function mycenter(id){
  	//alert(id);
$("#mytimeslot").empty();
	var data = {
                            "cityid": id
                           
                            };
                        $.ajax({
                    url: 'getcenters.php',
                     type: "post",
                    data: data,
                    success: function(data) {
                    	//alert(data);
                    	$("#mycity").html(data);
                 //alert(data);
                }
                })

  }

    function mycity(id){
$("#loadinggif").show();
  	var mycenter=$("#mycenter1").val();
    	//alert(mycenter);
    	var emtydatecheck=$("#txtDate").val();
    	//alert(emtydatecheck);
    	var mycityid=$("#mycenter1").val();



	if(emtydatecheck=="" || emtydatecheck=="-Select Date-"){

	var data = {
                            "id": mycenter
                        
                           
                           
                            };
                        $.ajax({
                    url: 'getoff.php',
                     type: "post",
                    data: data,
                    success: function(data) {
                    	//alert(data);
$("#loadinggif").hide();
                    	$("#datefunctionality").html(data);
                 //alert(data);
                }
                })


}
  
    	if(emtydatecheck=="" || emtydatecheck=="-Select Date-"){

//alert("Please select Date !");
    	}
    	else{
	var data = {
                            "id": mycenter,
                            "bookingdate":emtydatecheck
                           
                           
                            };
                        $.ajax({
                    url: 'mymsd.php',
                     type: "post",
                    data: data,
                    success: function(data) {
$("#loadinggif").hide();
                    	$("#mytimeslot").html(data);
                 //alert(data);
                }
                })
                    }

  }


  function validate(){
  	var city=$("#city").val();
  	var center=$("#mycenter1").val();
var emtydate=$("#txtDate").val();
  	if(city=="A"){
 $("#error_msg").html("Please select city");
  		//alert("Please select city");
  		return false;
  	}

  	if(center=="B"){
 $("#error_msg").html("Please select Center");
  		//alert("Please select Center");
  		return false;
  	}

if(emtydate=="" || emtydate=="-Select Date-"){
$("#error_msg").html("Please select Date !");
return false;
//alert("Please select Date !");
    	}

var chk=$("input[name='mycenter_booking']:checked").val();

if(chk){

	//alert("done");
}
else {

	//alert("Please select booking slot");
 $("#error_msg").html("Please select booking slot");
return false;
}

var selecteddated=$("#txtDate").val();
//var mydate =new Date(year, month, day, hours, minutes, seconds, milliseconds);
//alert(mydate);
var today = new Date();
var tomorrow=new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

var dd1 = tomorrow.getDate()+1;
var mm1 = tomorrow.getMonth()+1; //January is 0!
var yyyy1 = tomorrow.getFullYear();


if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

if(dd1<10) {
    dd1='0'+dd1
} 

if(mm1<10) {
    mm1='0'+mm1
} 


today = mm+'/'+dd+'/'+yyyy;
tomorrow = mm1+'/'+dd1+'/'+yyyy1;
//alert(tomorrow);

if(selecteddated==today || selecteddated==tomorrow){
  $("#error_msg").html("You can not select today and tomorrow's date for booking.");
	//alert("You can not select today and tomorrow's date for booking.");
//alert(today);
return false;
}
  }

</script>
<style>
.wrapper {
    
    clear:both;
}
.first {
    background-color:white;
    width:200px;
    float:left;
}
.second {
    background-color:white;
    width:300px;
    float:left;
}
.mypos{
position:absolute;
left: 41%;

}
.third {
    background-color:white;
    width:200px;
    float:left;
}
#mycenter_booking {
    margin-right:10px;
}
</style>
<?php
//include('footer.php');
 ?>
