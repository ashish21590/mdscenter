<?php 
session_start();

$metakey = 'Young drivers 2015, Maruti Suzuki, Autocar India, safe driving skills, road safety wars, young drivers rules, Mumbai, delhi, Autocar Young Drivers 2015 contest';
$metadesc = 'Maruti Suzuki presents Autocar Young Drivers 2015. Participate in Young drivers contest and you could win New Maruti Suzuki Alto 800';
$title = 'Young Drivers 2015  | Maruti Suzuki |  Autocar India';

include('header.php');
?>
<?php
include("../include/config.php");

$user_id=mysql_real_escape_string($_SESSION['user_booking_id']);
$query=mysql_query("SELECT * FROM mdscenter WHERE id IN (SELECT centerid FROM booking WHERE id='".$user_id."')");
$query_date=mysql_query("SELECT *  FROM booking WHERE id='".$user_id."'");
$query_slot=mysql_query("SELECT * FROM slots WHERE id IN (SELECT `bookingslot` FROM booking WHERE id='".$user_id."')");
//echo "SELECT * FROM slots WHERE id IN (SELECT `bookingslot` FROM booking WHERE id='".$user_id."')";
$user_b_date=mysql_fetch_array($query_date);
$user_booking_Data= mysql_fetch_array($query);
//echo "select * from userregister where userid='".$user_b_date['userid']."'";
$getuser_detail=mysql_query("select * from userregister where userid='".$user_b_date['userid']."'");
$u_name=mysql_fetch_array($getuser_detail);

$user_booking_slot=mysql_fetch_array($query_slot);
//print_r($user_booking_Data);
//echo $user_booking_Data['city']."<br>";
//echo $user_booking_Data['centerAddress'];
//mail code starts here
if($u_name['email']==""){
header('location:index.php');
}
$to=$u_name['email'];
//$to = 'ashish.lyxel@gmail.com';
$subject = "Congratulations";
$message ="<h3>
Dear ".$u_name['name']."
Congratulations once again on being shortlisted for Maruti Young Driver 2015
- round 2! Thank you for enrolling for the road test, as per the details</h3>
<table>

</tr>
<tr>
<td>Date  :</td><td>'".$user_b_date['booking_date']."'</td>
</tr>
<tr>
<td>Time :</td><td>'".$user_booking_slot['timing']."'</td>
</tr>
<tr>
<td>Venue :</td><td>'".$user_booking_Data['centerAddress']."'</td>
</tr>
<tr>
<td>Phone No. :</td><td>'".$u_name['mobile']."'</td>
</tr>



</table>
<br>
<p>Look forward to see you at the venue. Safe Driving!</p>";
//$message = "Hello! A new query submitted on vivo facebook page.\r\nName :- ".$_REQUEST['name']."\r\nTelephone No. :- ".$_REQUEST['phone']."\r\nEmail :- ".$_REQUEST['email']."\r\nEnquiry :-".$_REQUEST['message']."\r\nThanks.";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: youngdrivers.in <youngdrivers.in>' . "\r\n";
$headers .= "CC:'".$user_booking_Data['MDSemailId']."','".$user_booking_Data['NMmailid']."',varun.myd2015@gmail.com,autocaryd2015@gmail.com,vikas.jain@maruti.co.in\r\n"; 
if($u_name['name']=='Roney'){
}else{
$mail = mail($to,$subject,$message,$headers,$from);
}
if($mail){

//echo "Your Query has been submitted !";

}
else
	{
//		echo "Failed";
	}

//ends here 
session_destroy();
?>

<style>
.container-fluid {
	display:block !important;
}
.login-maruti {
    font-size: 36px;
}
.introduction_con hr {
    width: 33%;
}
</style>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="bg_overlay">
        <div class="container-fluid">
        	<div class="body_content">
             <div class="row" style="margin:0px;">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                 <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 introduction_con" style="margin-top:90px;">
                   <h1 class="text-uppercase login-maruti">Thank you !</h1>
                     <hr>
                    <p>For registering for your on-road driving test at a Maruti Driving School.
<br>It’s time to showcase your safe driving skills on </p>
                    <div class="thnku_details">
                    	<div class="thanku_city">City : <?php echo $user_booking_Data['city']; ?></div>
                    	<div class="thanku_city_address">Center Address : <?php echo $user_booking_Data['centerAddress']; ?></div>
                        <div class="thanku_date">Booking Date : <?php echo $user_b_date['booking_date']; ?></div>
                        <div class="thanku_slot" style="margin-bottom:5px;">Timing : <?php echo $user_booking_slot['timing']; ?></div>
                    </div>
                 </div> <!--/introduction_content-->
                </div>
              
                <div class="offer_tag">
                   <img src="../images/win-prize-tag.png" class="img-responsive">
                </div> <!--/offer_tag-->
             </div> 
             
               
            </div>	
        </div>
      </div>


<?php include('footer.php');?>
<style>
.introduction_con {
	/*height:120px;*/
	}
</style>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="../scroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../scroll/jquery.mCustomScrollbar.js"></script>
    <script>
            (function($){
                $(window).load(function(){
                    $("#content_1").mCustomScrollbar({
                        autoHideScrollbar:true,
                        theme:"light-thin"
                    });
                });
            })(jQuery);
        </script>
<?php session_destroy();

?>
