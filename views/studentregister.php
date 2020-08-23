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

    font-size: 16px;
    vertical-align: middle;
     
    padding: 5px;
    color: green;

}

.no
{

    font-size: 16px;
    vertical-align: middle;
     
    padding: 5px;
    color: #c4191f;

}

.col-sm-12 {

    
    overflow-x: scroll;

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
              <h3 class="box-title">Add Student</h3>
              
            </div>
            <?php echo form_open_multipart('insertstud');?>
              <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                       <input type="hidden" class="form-control" name="stud_id">
                        <label>Student First Name</label>
                        <input type="text" class="form-control" placeholder="Student Name" name="firstname" required="">
                        <?php echo form_error('firstname',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <i class="pe-7s-user"></i>
                          <label>Student Last Name</label>
                          <input type="text" class="form-control" placeholder="Student Last Name" name="lastname" required="">
                          <?php echo form_error('lastname',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Userame" name="username" required="">
                        <?php echo form_error('username',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <i class="pe-7s-user"></i>
                          <label>Password</label>
                          <input type="password" class="form-control" placeholder="Password" name="password" required="">
                          <?php echo form_error('password',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Qualification</label>
                        <input type="text" class="form-control" placeholder="Qualification" name="qualification" required="">
                        <?php echo form_error('qualification',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <i class="pe-7s-user"></i>
                          <label>Year of Graduation</label>
                          <input type="text" class="form-control" placeholder="Year of Graduation" name="passing_year" required="">
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
                          </div>
 -->

                      <div class="col-md-4">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Email Id</label>
                        <input type="text" class="form-control" placeholder="Student's Email Id" name="email" required="">
                        <?php echo form_error('email',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>



                      <div class="col-md-4">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" required="">
                        <?php echo form_error('mobile',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>

                      <div class="col-md-4" id="subs">
                        <div class="form-group">
                            <i class="pe-7s-user"></i>
                            <label>Subscription expire <i style="color:red;">(for GRE coaching only)</i></label>
                            <input type="date"  class="form-control" placeholder="Subscription expire" name="subscription">
                            <?php echo form_error('subscription',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>

                      <div class="col-md-4" style="margin-top: 15px;">
                        <div class="form-group">
                          <span style="font-size: 16px; font-weight: bold; padding: 5px; border-left: 6px solid red; background-color: lightgrey; vertical-align: middle; margin-right: 15px;">Student Account Status</span>

                          <span class="no">Inactive</span>
                            <label class="switch">
                              <input  id="sas" type="checkbox" name="status">
                              <span class="slider round"></span> 
                          </label> <span class="yes">Active</span>
                        </div>
                     </div>

                      <div class="col-md-4" style="margin-top: 15px;">
                        <div class="form-group">
                          <span style="font-size: 16px; font-weight: bold; padding: 5px; border-left: 6px solid red; background-color: lightgrey; vertical-align: middle; margin-right: 15px;">GRE Coaching</span>

                          <span class="no">No</span><label class="switch">
                            <input type="checkbox" name="gre_coaching">
                            <span class="slider round"></span> 
                          </label> <span class="yes">Yes</span>
                        </div>
                     </div>

                     <div class="col-md-4" style="margin-top: 15px;">
                        <div class="form-group">
                          <span style="font-size: 16px; font-weight: bold; padding: 5px; border-left: 6px solid red; background-color: lightgrey; vertical-align: middle; margin-right: 15px;">Consultancy</span>

                          <span class="no">No</span> <label class="switch">
                            <input type="checkbox" name="consultancy">
                            <span class="slider round"></span> 
                          </label><span class="yes">Yes</span>
                        </div>
                     </div>
                     <br>
                     <div class="col-md-12" style="border-bottom: 1px solid gray; margin-top: 10px; margin-bottom: 10px;"> </div>
                     <div class="col-md-12">
                       <label style="font-size: 16px;"><b style="color: red;">Note:</b> Slide the switch to <b style="color: green">yes</b> to activate <b style="color: green">Coaching</b> or <b style="color: green">Consultancy</b> status of Student</label>
                       <br/><span style="font-size: 16px; border-left: 6px solid red; background-color: lightgrey; padding: 2px;">GRE Coaching Include- <b>GRE Mock Test Portal - Topic Wise and Full Length Mocktest</b> </span>
                       <span class="pull-right" style="font-size: 16px; border-left: 6px solid red; background-color: lightgrey; padding: 2px;"> Consultancy Include- <b>Student University Status, Document Upload , Student Assistance Veronica </b> </span>
                     </div>

                    </div>
                  </div>
                 
               <div class="box-footer text-center">

                <button type="submit" class="btn btn-info btn-fill" name="stu_submit">Submit</button>
                <div class="clearfix"></div>
              </div>
            </form>
          </div><!--box-->



          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student List</h3>
             
            </div>
            
            <div class="box-body">
          

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Qualification</th>
                  <th>Passing Year</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                  <th>Status</th>
                  
                  <th>User Name</th>
                  <th>Password</th>
                <!--   <th>Profile Pic</th> -->
                  
                  <th>Updated</th>
                  <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      foreach($student as $key => $data)  
                     {
                      
                    ?>
                 <tr>
                        <td><?php echo $data['stud_id'];?></td>
                        <td><?php echo $data['firstname'];?></td>
                        <td><?php echo $data['lastname'];?></td>
                        <td><?php echo $data['qualification'];?></td>
                        <td><?php echo $data['passing_year'];?></td>
                        <td><?php echo $data['email_id'];?></td>
                        <td><?php echo $data['mobile'];?></td>
                        <td>Status:<b style="color: #2f3562; padding-left: 5px;"><?php echo $data['status'];?></b><br/>
                            Coaching:<b style="color: #2f3562; padding-left: 5px;"><?php echo $data['gre_coaching_status'];?></b><br/>
                            Consultancy:<b style="color: #2f3562; padding-left: 5px;"><?php echo $data['consultancy'];?></b>
                        </td>
                        <td><?php echo $data['username'];?></td>
                        <td><?php echo $data['password'];?></td>
                       <!--  <td><?php echo $data['profile_photo'];?></td> -->
                        
                        <td><?php echo date('d-m-Y H:i:s',strtotime($data['stud_updated'])); ?></td>
                        <td><a class="btn btn-success" href="<?php echo base_url('edits/'.$data['stud_id'])?>" >Edit</a>
                         
                         <button type="button" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['stud_id']; ?>">Delete</button>
                         </td>
                   </tr>
              <div class="modal fade" id="myModal<?php echo $data['stud_id']; ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete File</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a href="<?php echo base_url('delsname/' .$data['stud_id']) ?>"><button type="button" class="btn btn-danger" name="delete"> Yes..! Delete</button></a>
                    </div>
                  </div>
                  
                </div>
              </div>
                      <?php
                        }
                      ?>   
                   </tbody>
              </table>
            </div><!--box-body-->
          </div><!--box-->



        </div><!--col-md-12-->
      </div><!--row-->
    </section>
      </div><!--content wrapper-->

      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script>
      $(document).ready(function(){

          if ($("#sas").value()=="on") {
                $("#subs").show();
                // $("#AddPassport").hide();
            } else {
                $("#subs").hide();
                // $("#AddPassport").show();
            }
      });
      </script>




    
