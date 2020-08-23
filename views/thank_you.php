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

	} 

	@media screen and (min-width:640px){
		.marg{
			margin-left:30px;
		}
	} 

.heders{
		padding: 10px;
		background-color: #2f3562;
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

	<h1 style="text-align: center; font-weight: bold; color: green;">Dear <?php echo ucwords($this->session->userdata('stop')); ?>, Thank You for Submitting Your Answer</h1>
	<h3 style="text-align: center; font-weight: bold; color: green;">You can now close the browser</h3>

	

     </div>
</section> 			              