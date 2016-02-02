<?php
include("../include/config.php");
$query1=mysql_query("SELECT city AS label, COUNT( id ) AS y
FROM  `userregister` 
WHERE  `city` 
IN (
 'Mumbai',  'Delhi',  'Bengaluru',  'Chennai',  'Pune',  'Kolkata',  'Chandigarh',  'Hyderabad',  'Ahmedabad',  'Indore'
)
GROUP BY  `city`" ) or die(mysql_error());
 

//$query1=mysql_query("SELECT COUNT( id ) AS x,  `oauth_provider` AS y FROM  `users` GROUP BY  `oauth_provider`") or die(mysql_error());
$rs1=mysql_fetch_assoc($query1);
//print_r($rs1);
$myarr=array();
$outp = "";
 while($rs=mysql_fetch_assoc($query1))
{
	
if($rs["label"]=="Arunachal Pradesh"){
$r="A.P";
}
else if ($rs["label"]=="Uttar Pradesh" ) {

$r="U.P";
} else if($rs["label"]=="Tamil Nadu" ) {

$r="T.N";
} 


else {

$r=$rs["label"];
}
	 if ($outp != "") {$outp .= ",";}
    $outp .= '{label:"'.$r. '" ,';
    $outp .= 'y:'   . $rs["y"]        . '}';
   

$myarr[]=$rs;


}
  // $me=json_encode($myarr);
//echo $me; 

//echo $outp;
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content=" <?php echo $metakey; ?>">
    <meta name="description" content=" <?php echo $metadesc; ?>">    
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

   <!-- <title>Young Drivers</title>-->
      <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/style-main.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
   <link href="../css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-1442327-10', 'auto');
  ga('send', 'pageview');
 
</script>
  </head>

  <body>  
      <header>
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header left-hd">
            <button type="button" class="navbar-toggle collapsed btn-collapse" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="hidden-xs navbar-brand" href="http://www.autocarindia.com/" target="_blank" style="float:left;"><img src="../images/autocar-logo.png"></a>
            <a href="http://www.autocarindia.com/" target="_blank"><img src="../images/autocar-logo.png" class="hidden-lg hidden-md hidden-sm img-responsive autocar_logo_mob"></a>
            <a href="http://www.youngdriver.in/"><img src="../images/maruti-suzuki-logo.png" class="hidden-lg hidden-md hidden-sm img-responsive suzuki_logo_mob"></a>
          </div>
          <div class="navbar-collapse collapse centr-hd">
            <ul class="nav navbar-nav">
            <li class="about"><a href="/">Home</a></li>
              <li class="about"><a href="about.php">About</a></li>
              <li class="rules-regulation"><a href="rules-regulation.php">Rules</a></li>
              <li class="instruction"><a href="instructions.php">Instructions</a></li>
              <!--<li><a href="quiz.php">Quiz</a></li>-->
           
                  <li class="roadsafety"><a href="roadsafetywars.php">Road Safety Wars</a></li>
              <li class="mds-center"><a href="mds-centres.php">MDS Centers</a></li>
              <li class="faq"><a href="faq.php">FAQ'<span style="text-transform:lowercase;">S </span></a></li>
              <li class="contact"><a href="contact-us.php">Contact Us</a></li>
            
 <li class="contact"><a href="index.php">Register</a></li>

            </ul>
          </div><!--/.nav-collapse -->
          <div class="rt-hd">
            <a href="http://www.marutisuzuki.com/" target="_blank" class="hidden-xs navbar-brand">
              <img src="../images/maruti-suzuki-logo.png" class="img-responsive">
            </a>
          </div>
        </div><!--/.container-fluid -->
      </div>
      </header>
     <!-- <div class="sticky_sectn">
           <a href="" class="modal-btn" data-toggle="modal" data-target="#myModal"> <img src="../images/scoreboard_icon.png" class="img-responsive" ></a>
        </div>--> <!--/sticky_sectn-->
      <div class="modal fade graph_content" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none; z-index:999999; clear:both; overflow:hidden;">
      <div class="modal-dialog" role="document">
        <div class="modal-content graph_inner_con">
        
          <div class="modal-body row">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="../images/cross-img.jpg"></span></button>
             <div class="graph_inner_con">
                 <h1>Young Drivers 2015 Scoreboard </h1><hr>
                 <h4>Participate and lead your city chart – Stand a chance to become Maruti Suzuki - Autocar Yound Driver of the Year 2015! </h4>
                  <!--<div class=""><img src="../images/graph.jpg"></div>-->
                  <div id="chartContainer" style="height: 100%; width: 100%;"></div>
             </div>
             
            
          </div>
        </div>
        
      </div>
    </div> <!--/popup graph-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">
window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer",
  {
    animationEnabled: true,
    title:{
      text: " "
    },
	axisY: {
				labelFontSize: 16,
				labelFontColor: "dimGrey"
			},
	axisX: {
		labelAngle: -50
	},
    data: [
    {
      type: "column", //change type to bar, line, area, pie, etc
      dataPoints:[
        <?php echo $outp; ?>
      ],
	  
    }
    ]
    });

  chart.render();
}
</script>
<style>
a.canvasjs-chart-credit {
display:none;
}
.graph_inner_con .modal-body {
    padding: 8%;
    min-height: 600px;
}
</style>