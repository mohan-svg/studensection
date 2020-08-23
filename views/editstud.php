<?php    
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
?>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 30px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2f3562;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2f3562;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.yes
{

    font-size: 18px;
    vertical-align: middle;
     
    padding: 5px;
    color: green;

}

.no
{

    font-size: 18px;
    vertical-align: middle;
     
    padding: 5px;
    color: #c4191f;

}
</style>



  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary"><br> 
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
            <div class="box-header with-border">
              <h3 class="box-title">Edit Student</h3>
              
            </div>
            <?php 
             
             foreach($student as $key => $data)  
             {
          
 ?>
            <?php echo form_open_multipart('updatestud');?>
              <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                       <input type="hidden" class="form-control" name="stud_id" value="<?php echo $data['stud_id'];?>">
                        <input type="hidden" class="form-control" name="profile_photo" value="<?php echo $data['profile_photo'];?>" >
                        <label>Student First Name</label>
                        <input type="text" class="form-control" placeholder="Student Name" name="firstname" required="" value="<?php echo $data['firstname'];?>">
                        <?php echo form_error('firstname',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <i class="pe-7s-user"></i>
                          <label>Student Last Name</label>
                          <input type="text" class="form-control" placeholder="Student Last Name" name="lastname" required="" value="<?php echo $data['lastname'];?>">
                          <?php echo form_error('lastname',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Userame" name="username" required="" value="<?php echo $data['username'];?>">
                        <?php echo form_error('username',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <i class="pe-7s-user"></i>
                          <label>Password</label>
                          <input type="password" class="form-control" placeholder="Password" name="password" required="" value="<?php echo $data['password'];?>">
                          <?php echo form_error('password',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Qualification</label>
                        <input type="text" class="form-control" placeholder="Qualification" name="qualification" required="" value="<?php echo $data['qualification'];?>">
                        <?php echo form_error('qualification',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <i class="pe-7s-user"></i>
                          <label>Year of Graduation</label>
                          <input type="text" class="form-control" placeholder="Year of Graduation" name="passing_year" required="" value="<?php echo $data['passing_year'];?>">
                          <?php echo form_error('passing_year',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                         <!-- <div class="col-md-6">
                            <div class="form-group">
                              <i class="pe-7s-user"></i>
                              <label>Student Photo</label>
                              <input type="file" class="form-control" placeholder="Profile Pic" 
                              name="profile_photo" required="">
                              <?php echo form_error('profile_photo',"<div style='color:red'>","</div>");?>
                            </div>
                          </div> -->



                      <div class="col-md-4">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Email Id</label>
                        <input type="text" class="form-control" placeholder="Student's Email Id" name="email" required="" value="<?php echo $data['email_id'];?>">
                        <?php echo form_error('email',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" required="" value="<?php echo $data['mobile'];?>">
                        <?php echo form_error('mobile',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>

                      <div class="col-md-4" id="subs">
                        <div class="form-group">
                            <i class="pe-7s-user"></i>
                            <label>Subscription expire <i style="color:red;">(for GRE coaching only)</i></label>
                            <input type="date"  class="form-control" placeholder="Subscription expire" name="subscription" value="<?php echo $data['mobile'];?>">
                            <?php echo form_error('subscription',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>

                      <div class="col-md-4" style="margin-top: 15px;">
                        <div class="form-group">
                          <span style="font-size: 18px; font-weight: bold; padding: 5px; border-left: 6px solid red; background-color: lightgrey; vertical-align: middle; margin-right: 15px;">Student Account Status</span>

                          <span class="no">Inactive</span>
                          <?php if($data['status']=='active'){ ?>
                              <label class="switch">
                                <input type="checkbox" name="status" checked="checked">
                                <span class="slider round"></span> 
                              </label> 
                          <?php } else { ?>

                              <label class="switch">
                                <input type="checkbox" name="status">
                                <span class="slider round"></span> 
                              </label> 

                          <?php } ?>

                          <span class="yes">Active</span>
                        </div>
                     </div>

                      <div class="col-md-4" style="margin-top: 15px;">
                        <div class="form-group">
                          <span style="font-size: 18px; font-weight: bold; padding: 5px; border-left: 6px solid red; background-color: lightgrey; vertical-align: middle; margin-right: 15px;">GRE Coaching</span>

                          <span class="no">No</span>
                          <?php if($data['gre_coaching_status']=='active'){ ?>
                              <label class="switch">
                                <input type="checkbox" name="gre_coaching" checked="checked">
                                <span class="slider round"></span> 
                              </label>

                          <?php } else { ?>

                              <label class="switch">
                                <input type="checkbox" name="gre_coaching">
                                <span class="slider round"></span> 
                              </label> 

                          <?php } ?>

                          <span class="yes">Yes</span>
                        </div>
                     </div>

                     <div class="col-md-4" style="margin-top: 15px;">
                        <div class="form-group">
                          <span style="font-size: 18px; font-weight: bold; padding: 5px; border-left: 6px solid red; background-color: lightgrey; vertical-align: middle; margin-right: 15px;">Consultancy</span>

                          <span class="no">No</span> 
                          <?php if($data['consultancy']=='active'){ ?>
                            <label class="switch">
                              <input type="checkbox" name="consultancy" checked="checked">
                              <span class="slider round"></span> 
                            </label>

                             <?php } else { ?>

                              <label class="switch">
                                <input type="checkbox" name="consultancy">
                                <span class="slider round"></span> 
                              </label> 

                          <?php } ?>
                          <span class="yes">Yes</span>
                        </div>
                     </div>

                    </div>
                  </div>

                  <!--hidden fields-->

                  <input type="hidden" name="stud_status" value="<?php echo $data['status']?>">
                  <input type="hidden" name="stud_gre_coaching" value="<?php echo $data['gre_coaching_status']?>">
                  <input type="hidden" name="stud_consultancy" value="<?php echo $data['consultancy']?>">
                  <input type="hidden" name="stud_subscription" value="<?php //echo $data['subscription']?>">

                  <!--hidden fields--> 

               <div class="box-footer">
               <?php } ?>
                <button type="submit" class="btn btn-info btn-fill pull-right" name="stu_submit">Submit</button>
                <div class="clearfix"></div>
              </div>
            </form>
          </div><!--box-->



        
        </div><!--col-md-12-->
      </div><!--row-->
    </section>
      </div><!--content wrapper-->




    
