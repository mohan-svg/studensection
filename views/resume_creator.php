<?php
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
?>


  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Resume Builder
      </h1>
    
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Resume Builder</a></li>
      </ol>
    </section>


    <section class="content" style="font-size: 16px;">
      <div class="row">
        <div class="col-md-12">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personal_details" data-toggle="tab" aria-expanded="true">Personal Details</a></li>
              <li class=""><a href="education">Educational Details</a></li>
              <li class=""><a href="work_exp">Work Exp & Internships</a></li>
              <li class=""><a href="academic_proj">Academic Projects</a></li>
              <li class=""><a href="technical_skills" >Technical Skills</a></li>
              <li class=""><a href="view_resume">View Resume</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="personal_details">

                <?php if ($this->session->flashdata('success')) { ?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    <?php } ?>

                    <?php if ($this->session->flashdata('error')) { ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <?php echo $this->session->flashdata('error'); ?>
                      </div>

                    <?php } ?>

               <?php if(empty($resume)): ?>

                        <form class="form-horizontal" action="add_personal" method="post">
                                <h3 style="text-align: center;">Personal Details</h3>
                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Student Name:</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="stud_name" class="form-control input-lg" id="conc" placeholder="Enter Student Name" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Mobile No:</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="mobile_no" class="form-control input-lg" id="conc" placeholder="Enter Mobile No." required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Email ID:</label>

                                  <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control input-lg" id="conc" placeholder="Enter Email Id" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Address</label>

                                  <div class="col-sm-6">
                                    Address Line 1
                                    <input type="text" name="address" class="form-control input-lg" id="conc" placeholder="Address Line 1" required>
                                  </div>
                                  
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label"></label>
                                  
                                  <div class="col-sm-6">
                                    Address Line 2
                                    <input type="text" name="address2" class="form-control input-lg" id="conc" placeholder="Address Line 2">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">City</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="city" class="form-control input-lg" id="conc" placeholder="Enter City" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">State</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="state" class="form-control input-lg" id="conc" placeholder="Enter State" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Zip Code</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="zipcode" class="form-control input-lg" id="conc" placeholder="Zip code" required>
                                  </div>
                                </div>

                                <div class="col-sm-12 form-group">
                                  <div class="col-sm-12">
                                      <div class="col-sm-5 pull-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Save & Next</button>
                                      </div>
                                  </div>
                                </div>

                        </form>

              <?php else: ?>
                        <form class="form-horizontal" action="update_personal" method="post">
                                <h3 style="text-align: center;">Personal Details</h3>
                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Student Name:</label>
                                  <input type="hidden" name="resume_id" class="form-control input-lg" value="<?php echo $resume->resume_id ?>" required>
                                  <div class="col-sm-6">
                                    <input type="text" name="stud_name" class="form-control input-lg" id="conc" placeholder="Enter Student Name" value="<?php echo $resume->student_name ?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Mobile No:</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="mobile_no" class="form-control input-lg" id="conc" placeholder="Enter Mobile No." value="<?php echo $resume->contact_no ?>" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Email ID:</label>

                                  <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control input-lg" id="conc" placeholder="Enter Email Id" value="<?php echo $resume->email_id ?>" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Address</label>                                  
                                  <div class="col-sm-6">
                                    Address Line 1
                                    <input type="text" name="address" class="form-control input-lg" id="conc" placeholder="Enter Student Name" value="<?php echo $resume->address_line1 ?>" required>
                                  </div>
                                  
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label"></label>
                                  
                                  <div class="col-sm-6">
                                    Address Line 2
                                    <input type="text" name="address2" class="form-control input-lg" id="conc" placeholder="Enter Student Name" value="<?php echo $resume->address_line2 ?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">City</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="city" class="form-control input-lg" id="conc" placeholder="Enter City" value="<?php echo $resume->city ?>" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">State</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="state" class="form-control input-lg" id="conc" placeholder="Enter state" value="<?php echo $resume->state ?>" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-4 control-label">Zip Code</label>

                                  <div class="col-sm-6">
                                    <input type="text" name="zipcode" class="form-control input-lg" id="conc" placeholder="Enter Zip code" value="<?php echo $resume->zipcode ?>" required>
                                  </div>
                                </div>

                                <div class=" form-group">
                                  <div class="col-sm-12">
                                      <div class="col-sm-5 pull-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Save & Next</button>
                                      </div>
                                  </div>
                                </div>

                        </form>

                <?php endif; ?>        

              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>

                 
                    

        </div><!--col-md-12-->
      </div><!--row-->
    </section>
 </div><!--content wrapper-->
