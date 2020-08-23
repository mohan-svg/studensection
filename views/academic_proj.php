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
              <li class=""><a href="education">Educational Details</a></li>
              <li class=""><a href="work_exp">Work Exp & Internships</a></li>
              <li class="active"><a href="#academic_proj" data-toggle="tab" aria-expanded="true">Academic Projects</a></li>
              <li class=""><a href="technical_skills">Technical Skills</a></li>
              <li class=""><a href="view_resume">View Resume</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="academic_proj">
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


                        <h3 style="text-align: center;">Academic Projects<?php if($this->session->has_userdata('student_name')): ?>
                          (<?php echo $this->session->userdata('student_name'); ?>)
                        <?php endif; ?></h3>
                        
                        <div class="col-sm-12"> 
                            <div class="col-sm-6 lead text-red">Note: Add Project in same sequence as you want in resume </div>
                        </div>

                        <div class="col-sm-12" style="margin-bottom:20px;">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addProjDetail"> + Add Academic Projects</button>
                      </div>


                      <br/>
                      <?php if(empty($academic_proj)){ ?>
                        <div style="border: 1px dotted gray; text-align: center;">
                          <h1 style="color: gray">-- No Academic Projects Found -- </h1>
                        </div>
                      <?php } else { ?>
                        <table class="table table-bordered table-striped" role="grid">
                          <thead>
                            <tr>
                              <th>Project Title</th>
                              <th>Project Subtitle</th>
                              <th>Duration</th>
                              <th>Description</th>       
                              <th>Updated</th>
                              <th>Action</th>
                            </tr>
                            
                          </thead>
                          <tbody>
                            <?php foreach($academic_proj as $key => $val){?>
                            <tr>
                              <td><strong><?php echo $val['proj_title'] ?></strong></td>
                              <td><?php echo $val['proj_subtitle'] ?></td>
                              <td><?php echo $val['duration'] ?></td>
                              <td><?php echo $val['description'] ?></td>
                              
                              <td><?php echo date('d-m-Y',strtotime($val['proj_updated'])); ?></td>
                              <td><a class="btn btn-primary" data-toggle="modal" data-target="#editProject<?php echo $val['proj_id'] ?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Edit</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-danger" data-toggle="modal" data-target="#deleteProject<?php echo $val['proj_id'] ?>"><i class="glyphicon glyphicon-trash"></i>&nbsp;Delete</a></td>
                            </tr>

                            <div class="modal fade" id="deleteProject<?php echo $val['proj_id'] ?>" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <div class="form-group">
                                          <div class="col-sm-12" style="font-weight: bold; color: #a91b4b; text-align: center; font-size: 25px;"> Delete Project Details</div>
                                      </div>
                                    </div>
                                    <form class="form-horizontal" action="delete_academic_proj" method="post">
                                    <div class="modal-body">
                                        <div class="col-sm-1"></div>
                                        <input type="hidden" name="proj_id" value="<?php echo $val['proj_id'] ?>">
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


                            <div class="modal fade" id="editProject<?php echo $val['proj_id'] ?>" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <div class="form-group">
                                          <div class="col-sm-12" style="font-weight: bold; color: #a91b4b; text-align: center; font-size: 25px;"> Update Project Details</div>
                                      </div>
                                    </div>
                                    <form class="form-horizontal" action="update_academic_proj" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-11" style="margin-bottom: 20px;">
                                          <div class="form-group col-sm-12">
                                            <input type="hidden" name="proj_id" value="<?php echo $val['proj_id'] ?>">
                                                <label for="edu_level2" class="col-sm-4 control-label">Project Title*:</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="proj_title" id="edu_level2" value="<?php echo $val['proj_title'] ?>" placeholder="Project Title" required="required">
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12">
                                                <label for="colleg_name2" class="col-sm-4 control-label">Project Subtitle</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="proj_subtitle" id="colleg_name2" value="<?php echo $val['proj_subtitle'] ?>" placeholder="Project Subtitle">
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12">
                                                <label for="degree_name2" class="col-sm-4 control-label">Duration:</label>

                                                <div class="col-sm-6">
                                                  <input type="text" class="form-control input-lg" name="duration" id="degree_name2" value="<?php echo $val['duration'] ?>" placeholder="ex. Nov 2018 - Feb 2019">
                                                </div>
                                              </div>
                                              <div class="form-group col-sm-12">
                                                <label for="branch2" class="col-sm-4 control-label">Description*:</label>

                                                 <div class="col-sm-12">
                                                    <textarea id="editor2" name="description" rows="10" cols="80" required><?php echo $val['description'] ?></textarea>
                                                                                                  
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


                      <div class="modal fade" id="addProjDetail" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="form-group">
                                          <div class="col-sm-12" style="font-weight: bold; color: #a91b4b; text-align: center; font-size: 25px;"> Add Project Details</div>
                                </div>
                              </div>
                              <form class ="form-horizontal" action="add_academic_proj" method="post">
                              <div class="modal-body">
                                <div class="col-md-1"></div>
                                    <div class="col-md-11">                                        
                                            <div class="form-group">
                                              <label for="colleg_name1" class="col-sm-4 control-label">Project Title*:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="proj_title" id="colleg_name1" placeholder="Project Title" required="required">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="degree_name1" class="col-sm-4 control-label">Project Subtitle:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="proj_subtitle" id="degree_name1" placeholder="Project Subtitle">
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="start_date1" class="col-sm-4 control-label">Duration*:</label>

                                              <div class="col-sm-6">
                                                <input type="text" class="form-control input-lg" name="duration" id="duration" placeholder="ex. Aug 2015 - May 2019" required="required">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label for="branch1" class="col-sm-4 control-label">Description*:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor1" name="description" rows="10" cols="80">
                                                  
                                                </textarea>
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
                            <a href="work_exp" class="btn btn-warning btn-lg">Previous</a>
                            <a href="technical_skills" class="btn btn-primary btn-lg pull-right">Save & Next</a>
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
