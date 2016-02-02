<?php 
session_start();
session_destroy();
$metakey = 'Young drivers 2015, Maruti Suzuki, Autocar India, safe driving skills, road safety wars, young drivers rules, Mumbai, delhi, Autocar Young Drivers 2015 contest';
$metadesc = 'Maruti Suzuki presents Autocar Young Drivers 2015. Participate in Young drivers contest and you could win New Maruti Suzuki Alto 800';
$title = 'Young Drivers 2015  | Maruti Suzuki |  Autocar India';

include('header.php');
?>
<?php
include("../include/config.php");
$msg="";
if(isset($_POST['submit'])){
//echo "select * from userregister where email='".mysql_real_escape_string($_POST['emailid'])."' and mobile='".mysql_real_escape_string($_POST['contact_no'])."'";
  //echo "select * from userregister where email='".mysql_real_escape_string($_POST['emailid'])."' and contact_no='".mysql_real_escape_string($_POST['contact_no'])."'";
  $query=mysql_query("select * from userregister where email='".mysql_real_escape_string($_POST['emailid'])."' and mobile='".mysql_real_escape_string($_POST['contact_no'])."'");
   $userid= mysql_fetch_array($query);
   $check=mysql_num_rows($query);
  if($check>0){
//echo "select * from booking where userid='".$userid['id']."'";
$query_check_booking=mysql_query("select * from booking where userid='".$userid['id']."'");
$check_not_booked_yet=mysql_num_rows($query_check_booking);
if($check_not_booked_yet<1)
{
 
  $_SESSION['userid']=$userid['userid'];
 header("location:city.php");
}
else
{
  $msg= "Already Booked A Slot";
}
  }
  else{
    $msg= "User details did not match. Please enter the same details used while registering.";

  }
}

?>
<style>
.container-fluid {
  display:block !important;
}
</style>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="bg_overlay">
        <div class="container-fluid">
          <div class="body_content">
             <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8 main_tagline">
                    <img src="../images/young-driver-tagline.png" class="img-responsive">
                   </div> <!--/main_tagline-->
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                 <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 introduction_con" >
                   <h1 class="text-uppercase login-maruti"><span>Login to </span>Phase 2</h1>
                    <hr style="width:40%;">
                    <p>"Congratulations you have crossed the 1st Phase 
towards proving to the world that you can drive safe.

Now its time to get behind the wheel and showcase 
your skills. Sign in and select a slot for the road test at 
your nearest Maruti Driving School " </p>
<h5 class="error_msg" id="error_msg"><?php if($msg!=''){echo $msg;}  ?></h5>
                    
                        
                  <form class="login_page" name="loginform" method="post" accept="">
                    <input type="email" placeholder="Username (E-mail)" class="login_input_email" name="emailid" value="">
                    <input type="text" placeholder="Password (10-digit mobile number)" class="login_input" name="contact_no" value="">
                    <button id="submit" type="submit" name="submit" class="login_submit" onclick="return validate();" value="Login">Login</button>
                 </form>
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

    <script src="scroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="scroll/jquery.mCustomScrollbar.js"></script>
    <script>
            (function($){
                $(window).load(function(){
                    $("#content_1").mCustomScrollbar({
                        autoHideScrollbar:true,
                        theme:"light-thin"
                    });
                });
            })(jQuery);

function validate(){
var email=$("#emailid").val();
var mobile=$("#contact_no").val();


if(document.loginform.emailid.value == '')
{
//alert("Please Enter Email");
//alert("Please Enter Email");
$("#error_msg").html("Please Enter Email");

return false;
document.loginform.emailid.focus();
}else{
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var address = document.loginform.emailid.value;
            if(reg.test(address) == false) {

 //alert("Invalid Email Address");
 $("#error_msg").html("Invalid Email Address");
 return false;
               // alert('Invalid Email Address');
            }
        }


  if(document.loginform.contact_no.value == ''){
//alert("Please enter mobile number");
$("#error_msg").html("Please enter mobile number");
return false;

  }
  


}
        </script>
