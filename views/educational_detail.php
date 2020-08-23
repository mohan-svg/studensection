<?php
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
?>

<style type="text/css">

 @media (min-width: 768px){
      .modal-dialog {
          width: 1000px;
          margin: 30px auto;
      }
    }

</style>

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
              <li class=""><a href="create_resume">Personal Details</a></li>
              <li class="active"><a href="#education" data-toggle="tab" aria-expanded="true">Educational Details</a></li>
              <li class=""><a href="work_exp">Work Exp & Internships</a></li>
              <li class=""><a href="academic_proj">Academic Projects</a></li>
              <li class=""><a href="technical_skills">Technical Skills</a></li>
              <li class=""><a href="view_resume">View Resume</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="education">
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


                        <h3 style="text-align: center;">Educational Details <?php if($this->session->has_userdata('student_name')): ?>
                          (<?php echo $this->session->userdata('student_name'); ?>)
                        <?php endif; ?></h3>
                        <div class="col-sm-12"> 
                            <div class="col-sm-6 lead text-red">Note: Add latest education first followed by further education </div>
                        </div>
                        
                        <div class="col-sm-12" style="margin-bottom:20px;">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addEduDetail"> + Add Education Details</button>
                      </div>


                      <br/>
                      <?php if(empty($education)){ ?>
                        <div style="border: 1px dotted gray; text-align: center;">
                          <h1 style="color: gray">-- No Education Details found -- </h1>
                        </div>
                      <?php } else { ?>
                        <table class="table table-bordered table-striped" role="grid">
                          <thead>
                            <tr>
                              <th>Education Level</th>
                              <th>College/Board Name</th>
                              <th>Degree Name</th>
                              <th>Major/Branch</th>
                              <th>Duration</th>
                              <th>CGPA</th>
                              <th>Updated</th>
                              <th>Action</th>
                            </tr>
                            
                          </thead>
                          <tbody>
                            <?php foreach($education as $key => $val){?>
                            <tr>
                              <td><strong><?php echo $val['education_level'] ?></strong></td>
                              <td><?php echo $val['college_board'] ?></td>
                              <td><?php echo $val['degree_name'] ?></td>
                              <td><?php echo $val['major'] ?></td>
                              <td><?php echo $val['duration'] ?></td>
                              <td><?php echo $val['cgpa'] ?></td>
                              <td><?php echo date('d-m-Y',strtotime($val['edu_updated'])); ?></td>
                              <td><a class="btn btn-primary" data-toggle="modal" data-target="#editEduDetail<?php echo $val['education_id'] ?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Edit</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-danger" data-toggle="modal" data-target="#deleteEduDetail<?php echo $val['education_id'] ?>"><i class="glyphicon glyphicon-trash"></i>&nbsp;Delete</a></td>
                            </tr>

                            <div class="modal fade" id="deleteEduDetail<?php echo $val['education_id'] ?>" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <div class="form-group">
                                          <div class="col-sm-12" style="font-weight: bold; color: #a91b4b; text-align: center; font-size: 25px;"> Delete Educational Details</div>
                                      </div>
                                    </div>
                                    <form class="form-horizontal" action="delete_education" method="post">
                                    <div class="modal-body">
                                        <div class="col-sm-1"></div>
                                        <input type="hidden" name="education_id" value="<?php echo $val['education_id'] ?>">
                                        <div class="col-sm-11">
                                          <div class="form-group col-sm-12">
                                            <h2 class="text-center">Do you really want to Delete</h2>
                                          </div>
                                              
                                  
                                        </div>

                                      </div><!--./modal-body-->

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cancel</button>
                                       <button type="submit" class="btn btn-danger btn-lg" name="submit"> Delete</button>                    
                                      </div>
                                    </form>

                                  </div><!--./model content-->

                                </div><!--./modal-dialog-->
                              </div><!--./modal fade-->


                            <div class="modal fade" id="editEduDetail<?php echo $val['education_id'] ?>" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <div class="form-group">
                                          <div class="col-sm-12" style="font-weight: bold; color: #a91b4b; text-align: center; font-size: 25px;"> Update Educational Details</div>
                                      </div>
                                    </div>
                                    <form class="form-horizontal" action="update_education" method="post">
                                    <div class="modal-body">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-11" style="margin-bottom: 20px;">
                                          <div class="form-group col-sm-12">
                                            <input type="hidden" name="education_id" value="<?php echo $val['education_id'] ?>">
                                                <label for="edu_level2" class="col-sm-4 control-label">Education Level*:</label>

                                                <div class="col-sm-6">
                                                  <select class="form-control input-lg" name="edu_level" id="edu_level2" required="required">
                                                    <option value="<?php echo $val['education_level'] ?>"><?php echo $val['education_level'] ?></option>
                                                      
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12">
                                                <label for="colleg_name2" class="col-sm-4 control-label">College Name/Board*</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="college_board" id="colleg_name2" value="<?php echo $val['college_board'] ?>" placeholder="College or Board Name" required="required">
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12">
                                                <label for="degree_name2" class="col-sm-4 control-label">Degree Name:</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="degree_name" id="degree_name2" value="<?php echo $val['degree_name'] ?>" placeholder="ex. B.E., M.Tech, MBA, BBA">
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12">
                                                <label for="branch2" class="col-sm-4 control-label">Major/Branch:</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="major" id="branch2" value="<?php echo $val['major'] ?>" placeholder="ex. Electrical Engineering">
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12">
                                                <label for="start_date2" class="col-sm-4 control-label">Duration*:</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="duration" id="start_date2" value="<?php echo $val['duration'] ?>" placeholder="ex Aug 2015 - May 2019" required="required">
                                                </div>
                                              </div>

                                              <div class="form-group col-sm-12">
                                                <label for="end_date2" class="col-sm-4 control-label">CGPA*:</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="cgpa" id="end_date2" value="<?php echo $val['cgpa'] ?>" placeholder="ex 9.5/10 or 92%" required="required">
                                                </div>
                                              </div>
                                              
                                  
                                        </div>

                                      </div><!--./modal-body-->

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cancel</button>
                                       <button type="submit" class="btn btn-success btn-lg" name="submit"> Submit</button>                    
                                      </div>
                                    </form>

                                  </div><!--./model content-->

                                </div><!--./modal-dialog-->
                              </div><!--./modal fade-->


                          <?php } ?>
                          </tbody>
                        </table>
                      <?php } ?>




                      <div class="modal fade" id="addEduDetail" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="form-group">
                                          <div class="col-sm-12" style="font-weight: bold; color: #a91b4b; text-align: center; font-size: 25px;"> Educational Details</div>
                                </div>
                              </div>
                              <form class ="form-horizontal" action="add_education" method="post">
                              <div class="modal-body">
                                <div class="col-md-1"></div>
                                    <div class="col-md-11">
                                        <div class="form-group">
                                              <label for="edu_level1" class="col-sm-4 control-label">Education Level*:</label>

                                              <div class="col-sm-6">
                                                <select class="form-control input-lg" name="edu_level" id="edu_level1">
                                                  <option value="">--Select Education Level--</option>
                                                    <option value="Diploma(12+3)">Diploma(12+3)</option>
                                                    <option value="Undergraduate">Undergraduate</option>
                                                    <option value="Post Graduate(Degree)">Post Graduate(Degree)</option>
                                                    <option value="Post Graduate(Diploma)">Post Graduate(Diploma)</option>
                                                    <option value="Higher Secondary Education">HSC (12th Board)</option>
                                                    <option value="Secondary School Education">SSC (10th Board)</option>

                                                </select>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="colleg_name1" class="col-sm-4 control-label">College Name/Board*:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="colleg_board" id="colleg_name1" placeholder="College Name" required="required">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="degree_name1" class="col-sm-4 control-label">Degree Name:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="degree_name" id="degree_name1" placeholder="ex. B.E./ B-Tech/ M-Tech/MBA">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="branch1" class="col-sm-4 control-label">Major/Branch:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="major" id="branch1" placeholder="ex. Electrical Engineering">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="start_date1" class="col-sm-4 control-label">Duration*:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="duration" id="duration" placeholder="ex. Aug 2015 - May 2019" required="required">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label for="end_date1" class="col-sm-4 control-label">CGPA*:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="cgpa" id="cgpa" placeholder="ex 9.5/10 or 92%" required="required">
                                              </div>
                                            </div>
                                                                       
                                                              
                                       </div>

                                </div><!--./modal-body-->

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                 <button type="submit" class="btn btn-success" name="submit"> Submit</button>                    
                                </div>
                              </form>

                            </div><!--./model content-->

                          </div><!--./modal-dialog-->
                        </div><!--./modal fade-->
                        <br /><br />
                       
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-6">
                            <a href="create_resume" class="btn btn-warning btn-lg">Previous</a>
                            <a href="work_exp" class="btn btn-primary btn-lg pull-right">Save & Next</a>
                            <div style="clear: both;"></div>
                          </div>
                          <div style="clear: both;"></div>
                        </div>

              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>

        </div><!--col-md-12-->
      </div><!--row-->
    </section>
 </div><!--content wrapper-->
