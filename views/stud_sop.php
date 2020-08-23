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
     	
     	<form role="form" action="<?php echo site_url('sopQues') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
              	<label style="color: #c4191f; font-size: 16px; text-align: center;">Instructions:</label>
              	<ol style="text-align: justify;">
              		<li><strong>'Save'</strong> button to save entered SOP answers </li>
              		<li><strong>'Save & Exit'</strong> button to save entered SOP answers and create resume link so that you can resume to fill SOP answers later</li>
              		<li>Please ensure to save the link you will get after <strong>'Save & Exit'</strong>, this link will recover your filled sop answers.</li>
              		<li>Once you have completed SOP answers and conviced with it, press <strong>'Submit & Send'</strong> button to send your SOP answers to application team</li>
              	</ol>
              		
					<div class="form-group margings"> 
			              <div class="input-group col-md-4 col-sm-12 col-xs-12 left">
			                <span class="input-group-addon"><i class="fa fa-user"></i></span>
			                <input type="text" name="stud_name" class="form-control input-lg" placeholder="Full Name as per Passport" >
			              </div>

			              <div class="input-group col-md-4 col-sm-12 col-xs-12 left marg">
			                <span class="input-group-addon"><i class="fa fa-book"></i></span>
			                <input type="text" name="course" class="form-control input-lg" placeholder="Course want to apply ex. MS CourseS" >
			              </div>

			              <div class="input-group col-lg-3 col-sm-12 col-xs-12 right">
			                <span class="input-group-addon"><i class="fa fa-cog"></i></span>
			                <input type="text" name="term" class="form-control input-lg" placeholder="Term ex. Fall 2020" >
			              </div>
			              <div style="clear: both;"></div>
			        </div>
			        <div class="form-group margings"> 
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 left">
				                
				                <div class="form-group">
				                  <!-- <label>1. After 12`th class what pushed you to choose your current bachelors? (Any inspiration or incident in your life)</label> -->
				                  <label><b style="color: #c4191f;">1.</b> <?php echo $ques[0]['question']; ?></label>
				                  <textarea name="<?php echo $ques[0]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 right">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">2.</b> <?php echo $ques[1]['question']; ?></label>
				                  <textarea name="<?php echo $ques[1]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div style="clear: both;"></div>
           			</div>
           			<div class="form-group margings"> 
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 left">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">3.</b><?php echo $ques[2]['question']; ?></label>
				                  <textarea name="<?php echo $ques[2]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 right">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">4.</b> <?php echo $ques[3]['question']; ?></label>
				                  <textarea name="<?php echo $ques[3]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div style="clear: both;"></div>
           			</div>
           			<div class="form-group margings"> 
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 left">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">5.</b> <?php echo $ques[4]['question']; ?></label>
				                  <textarea name="<?php echo $ques[4]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 right">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">6.</b> <?php echo $ques[5]['question']; ?></label>
				                  <textarea name="<?php echo $ques[5]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div style="clear: both;"></div>
           			</div>
           			<div class="form-group margings"> 
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 left">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">7.</b> <?php echo $ques[6]['question']; ?>
				                  </label>
				                  <textarea name="<?php echo $ques[6]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 right">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">8.</b> <?php echo $ques[7]['question']; ?></label>
				                  <textarea name="<?php echo $ques[7]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div style="clear: both;"></div>
           			</div>
           			<div class="form-group margings"> 
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 left">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">9.</b> <?php echo $ques[8]['question']; ?></label>
				                  <textarea name="<?php echo $ques[8]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 right">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">10.</b> <?php echo $ques[9]['question']; ?></label>
				                  <textarea name="<?php echo $ques[9]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div style="clear: both;"></div>
           			</div>
           			<div class="form-group margings"> 
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 left">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">11.</b> <?php echo $ques[10]['question']; ?></label>
				                  <textarea name="<?php echo $ques[10]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div class="input-group col-md-5 col-sm-12 col-xs-12 right">
				                
				                <div class="form-group">
				                  <label><b style="color: #c4191f;">12.</b> <?php echo $ques[11]['question']; ?></label>
				                  <textarea name="<?php echo $ques[11]['q_id']; ?>" class="form-control" rows="5" placeholder="Your answer here" ></textarea>
				                </div>
			              </div>
			              <div style="clear: both;"></div>
           			</div>
           			<label style="color: white; font-size: 16px; text-align: justify-all; font-weight: 400px!important; background-color: #424949; padding: 10px;">Note: Honestly address my problems or special conditions. For example, your grades in one semester may be poor, because you had to work a part-time job or were affected by a family emergency. balance such negatives with positive points: " Though I had to take up a part-time job to support myself, I developed important time management skills. These skills helped me raise my grades the following semester while pursuing my research interests".</label>
           			
           			<div class="form-group col-md-2 pull-left" style="margin-top: 20px;" >
           				<button type="submit" value="submit" name="action" class="form-control btn btn-info" style="background-color:  #117a65 ; border-color:# #117a65; " >
           					Submit & Send
           				</button>
           			</div>

           			
           			<div class="form-group col-md-2 pull-right" style="margin-top: 20px;" >
           				<button type="submit" value="saveexit" name="action" class="form-control btn btn-info" style="background-color: #2f3562; border-color:#2f3562; " >Save & Exit</button>
           			</div>
           			<div class="form-group col-md-2 pull-right" style="margin-top: 20px;" >
           				<button type="submit" value="saveonly" name="action" class="form-control btn btn-info" style="background-color: #2f3562; border-color:#2f3562; " >Save</button>
           			</div>

			    </div><!--box-body-->
		</form>
     </div><!--row-->
     <div style="clear: both;"></div>

     </div>
</section> 			              

