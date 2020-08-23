<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
	.wrap{
		max-width: 1170px;
		margin: 25px auto;
	}

	.paddings{
		padding:0 20px;
	}
	.left{
		float: left !important;
	}
	.right{
		float: right!important;
	}

	.margings{
		margin-top: 40px!important;
	}

	@media screen and (max-width:640px){
		.marg{
			margin-left: 0px;
		}

		.input-group{
			margin-top:20px;
		}

		.margings{
		margin-top: 20px!important;
	}

	.hedpads{
			font-size: 28px;
			padding: 4px;
		}

	} 

	@media screen and (min-width:640px){
		.marg{
			margin-left:30px;
		}

		body{
			font-size: 15px;
		}
		.hedpads{
			/*padding: 25px 25px 6px 25px;*/
		}
	} 

	.heders{
		padding: 10px;
		background-color: #2f3562;
	}


	.input-group .input-group-addon {
   
		background-color:#2f3562!important;
	}

	.input-group-addon {
  
    	color: white;
	}

	body{
		color: #2f3562 !important;
		background-color:  #f2f3f4;
	}

</style>
<body>
<div class="col-lg-12 col-md-12 col-sm-12 heders">
	<img src="<?php echo base_url('images/200x84.png')?>"> 
</div>
<div class="col-lg-12 col-md-12 col-sm-12" style="min-height: 40px;">
</div>
<section class="content paddings">
	<div class="wrap">

	<h1 style="text-align: center; font-weight: bold;"><span class="hedpads" style="color: white; background-color: #c4191f; padding: 10px;">SOP Questionaire</span></h1><br>

		<h3 style="color:green;">Your SOP has been saved</h3>
		<!-- <div>Please save your SOP id - <b><?php echo $stud_id; ?></b> </div> -->
		<div style="font-size: 18px;">Please Save the below mentioned link and use it to resume your SOP Writing </div><br/>
		<b style="font-size: 16px; padding: 7px ; border:1px solid #c4191f;">https://www.shahgre.com/studentsection/resumes/<?php echo $stud_id; ?></b>
		<br/><br/><div>Please close the browser or tab to exit </div>
     </div>
</section> 			              

