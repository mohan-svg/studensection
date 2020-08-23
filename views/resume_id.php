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

	<h1 style="text-align: center; font-weight: bold;"><span class="hedpads" style="color: white; background-color: #c4191f; padding: 10px;">SOP Questionaire</span></h1>

	<div class="row" style="margin-top: 50px;">
		<?php // print_r($ques); ?>

		<?php if($this->session->flashdata('message')){?>
                                        <!-- <div class="col-sm-3 text-center"> -->
                                            <div id="hides" class="col-sm-12">

                                            <?php echo $this->session->flashdata('message');?>
                                            </div>
                                        <!-- </div> -->

        <?php  }   ?>
     	
     	<form role="form" action="<?php echo site_url('resume_id') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
              	<label style="color: #c4191f; font-size: 16px; text-align: center;">Note: All fields are required</label>
              		
					<div class="form-group margings"> 
			              <div class="input-group col-md-4 col-sm-12 col-xs-12 left">
			                <span class="input-group-addon"><i class="fa fa-user"></i></span>
			                <input type="text" name="sop_id" class="form-control input-lg" placeholder="Please Enter Your SOP id" >
			              </div>
			              <div class="form-group col-md-2" style="margin-top: 20px;" >
           				<button type="submit" value="submit" name="action" class="form-control btn btn-info" style="background-color: #2f3562; border-color:#2f3562; " >
           					Retrieve SOP
           				</button>
           			</div>
			              <div style="clear: both;"></div>
			        </div>
			       
           			<label style="color: white; font-size: 16px; text-align: justify-all; font-weight: 400px!important; background-color: #424949; padding: 10px;">Note: Honestly address my problems or special conditions. For example, your grades in one semester may be poor, because you had to work a part-time job or were affected by a family emergency. balance such negatives with positive points: " Though I had to take up a part-time job to support myself, I developed important time management skills. These skills helped me raise my grades the following semester while pursuing my research interests".</label>
           		

			    </div><!--box-body-->
		</form>
     </div><!--row-->
     <div style="clear: both;"></div>

     </div>
</section> 			              

