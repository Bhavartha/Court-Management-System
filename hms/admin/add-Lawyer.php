<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	$Lawspecialization=$_POST['Doctorspecialization'];
$Lawyername=$_POST['docname'];
$lawcity = $_post['Lawcity'];
$Lawaddress=$_POST['clinicaddress'];
$Lawfees=$_POST['docfees'];
$Lawcontactno=$_POST['doccontact'];
$Lawemail=$_POST['docemail'];
$password=md5($_POST['npass']);
$sushant = $_POST['npass'];
$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,LawyerCity,address,docFees,contactno,docEmail,password) values('$Lawspecialization','$Lawyername','$lawcity','$Lawaddress','$Lawfees','$doccontactno','$Lawemail','$password')");
if($sql)
{
	
echo "<script>alert('Lawyer info send Successfully via Email to added Lawyer $Lawyername ');</script>";
echo "<script>window.location.href ='manage-Lawyers.php'</script>";
	
	     $to = "$Lawemail";
         $subject = "Lawyer Account Created";
         
         $message = "<h1>WELCOME TO CMS.</h1><br>";
         $message .= "<b>Name</b> = $Lawyername <br>";
		 $message .= "<b>Specialization</b> = $Lawspecialization<br>";
         $message .= "<b>Lawyer Fees</b> = $Lawfees <br>";
		 $message .= "<b>Contact Number</b> = $Lawcontactno <br>";
		  $message .= "<b>City</b> = $lawcity <br>";
		 $message .= "<b>Office Address</b> = $Lawaddress<br>";
		 $message .= "<b>Email ID</b> = $Lawemail<br>";
		 $message .= "<b>Password</b> =  $sushant <br>";
		 $message .= "This is your temporery pasword please change it when you log in on your account.";

		 $message .= "<br><br><br><br>Your account is successfully created as a <b>Lawyer</b>, <br> you can login now, <br> Team <b>CMS</b>";
		 
		 
         $header = "From:webuilder23@gmail.com \r\n";
         $header .= "Cc:webuilder23@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "mail is successfully sent on <b> $Lawemail </b>";
         }else {
            echo "Mail could not be sent...";
         }
	
	
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Lawyer</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#docemail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Add Lawyer</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Add Lawyer</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Lawyer</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Lawyer Specialization
															</label>
							<select name="Doctorspecialization" class="form-control" required="true">
																<option value="">Select Specialization</option>
<?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

<div class="form-group">
															<label for="doctorname">
																 Lawyer Name
															</label>
					<input type="text" name="docname" class="form-control"  placeholder="Enter Lawyer Name" required="true">
														</div>
														
														<div class="form-group">
															<label for="doctorname">
																 Lawyer City
															</label>
					<input type="text" name="Lawcity" class="form-control"  placeholder="Enter Lawyer City" required="true">
														</div>


<div class="form-group">
															<label for="address">
																 Lawyer Office Address
															</label>
					<textarea name="clinicaddress" class="form-control"  placeholder="Enter Lawyer Clinic Address" required="true"></textarea>
														</div>
<div class="form-group">
															<label for="fess">
																 Lawyer Consultancy Fees
															</label>
					<input type="text" name="docfees" class="form-control"  placeholder="Enter Lawyer Consultancy Fees" required="true">
														</div>
	
<div class="form-group">
									<label for="fess">
																 Lawyer Contact no
															</label>
					<input type="text" name="doccontact" class="form-control"  placeholder="Enter Lawyer Contact no" required="true">
														</div>

<div class="form-group">
									<label for="fess">
																 Lawyer Email
															</label>
<input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Lawyer Email id" required="true" onBlur="checkemailAvailability()">
<span id="email-availability-status"></span>
</div>



														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
														
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
