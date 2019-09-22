<?php
/**
 * Template Name: Staff Login Page
 */
session_start();
get_header();
 ?>
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<?php //echo do_shortcode('[employee_access_code]'); ?>
<style type="text/css">
.form-login {
	max-width: 500px;
	padding: 19px 29px 29px;
	margin: 0 auto;
	background-color: #fff;	
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	box-shadow: 0 1px 2px rgba(0,0,0,.05);			
	font-family:Tahoma, Geneva, sans-serif;
	color:#990000;
	font-weight:lighter;
}
.form-login .form-login-heading {
    color:#00A2D1;
}
.form-login input[type="text"],
.form-login input[type="password"],
.form-login input[type="email"] {
    font-size: 16px;
    height: 45px;
    padding: 7px 9px;
}
.body-container {
	margin-top:110px;
}
.navbar-brand {
	font-family:"Lucida Handwriting";
}
#btn-submit{
	height:45px;
}
</style>
<div class="container">
<?php
if(isset($_SESSION['user_session']) && $_SESSION['user_session'] !="" ){
global $wpdb;
$sql ="SELECT * from wp_employee_data WHERE id = '".$_SESSION['user_session']."'";
$resultset = $wpdb->get_results($sql);
if($resultset[0]->id!="" && $resultset[0]->emp_email !=""){
$name= $resultset[0]->emp_name;
if($name ==""){
$name= $resultset[0]->emp_email;
}
}
?>

<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/datatable-pro-bootstrap.min.css' type='text/css' media='all' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/dataTables.bootstrap.min.css' type='text/css' media='all' />
<div class="container">    
	<div id="navbar" class="navbar-collapse collapse">
	 <ul class="nav navbar-nav navbar-right">            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php echo $name; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="" onclick="logoutUser();" ><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
	</div>	
<div>
<?php 
$user_data = $wpdb->get_results('select * from wp_employee_data' );
?>
<form id="posts-filter"  method="get">
<div id="table_03">
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
        <tr>
		<th>ID</th>
		<th>Name</th>
		<th>Sunday</th>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		<th>Saturday</th>
		 </tr>
        </thead>
       <tfoot>
            <tr>
		<th>ID</th>
		<th>Name</th>
		<th>Sunday</th>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		<th>Saturday</th>
		 </tr>
		</tfoot>
<?php
$no =0;
foreach ($user_data as $value) {
$count = $value->id;
$no++;
?>
    <tr id="row_<?php echo $value->id;?>">
    <td><?php echo $no;?></td>
    	<td><?php echo $value->emp_name;?></td>
      	<td><?php echo $value->sunday;?></button></td>
		<td><?php echo $value->monday;?></button></td>
		<td><?php echo $value->tuesday;?></button></td>
        <td><?php echo $value->wednesday;?></button></td>
        <td><?php echo $value->thursday;?></button></td>
        <td><?php echo $value->friday;?></button></td>
        <td><?php echo $value->saturday;?></button></td>
      	 </tr>
<?php
} ?>       
        </tbody>
    </table>
	
</form>
    </div>		
</div>

<?php }else{ ?>
	<form class="form-login" method="post" id="login-form" onsubmit="return validateForm();">
		<h2 class="form-login-heading">Member Sign In</h2><hr />
		<div id="error">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Email address" name="username" id="username" />
			<div id="name_error" class="error"></div>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
			 <div id="password_error" class="error"></div>
		</div>
		<hr />
		<div class="form-group">
			<button type="submit" class="btn btn-default" name="login_button" id="login_button">
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
		</div> 
	</form>		
<?php  } ?>	
</div>

<?php
	get_footer();
?>
