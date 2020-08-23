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
              <li class=""><a href="create_resume">Personal Details</a></li>
              <li class=""><a href="education">Educational Details</a></li>
              <li class=""><a href="work_exp" >Work Exp & Internships</a></li>
              <li class=""><a href="academic_proj">Academic Projects</a></li>
              <li class="active"><a href="#technical_skills" data-toggle="tab" aria-expanded="true">Technical Skills</a></li>
              <li class=""><a href="view_resume">View Resume</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="technical_skills">

                <h3 style="text-align: center;"> Technical Skills | Activities | Achievements | Hobbies <?php if($this->session->has_userdata('student_name')): ?>(<?php echo $this->session->userdata('student_name'); ?>)<?php endif; ?>
                </h3>

                    <?php if(empty($resume)): ?>

                          <form class ="form-horizontal" action="add_other_details" method="post">                              
                                
                                    <div class="col-md-12"> 
                                            <div class="form-group col-sm-6">
                                              <label for="editor1" class="col-sm-4 control-label">Technical Skills:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor1" name="technical_skills" rows="15" cols="50">
                                                  
                                                </textarea>
                                              </div>
                                            </div>

                                            <div class="form-group col-sm-6">
                                              <label for="editor2" class="col-sm-4 control-label">Activities:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor2" name="activites" rows="15" cols="50">
                                                  
                                                </textarea>
                                              </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                              <label for="editor3" class="col-sm-4 control-label">Achievements:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor3" name="achievement" rows="10" cols="80">
                                                  
                                                </textarea>
                                              </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                              <label for="editor4" class="col-sm-4 control-label">Hobbies:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor4" name="hobbies" rows="10" cols="80">
                                                  
                                                </textarea>
                                              </div>
                                           </div>
                                                              
                                    </div>
                                
                                 <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-6">
                                      <input type="submit" class="btn btn-warning btn-lg" value="Previous" name="submit">
                                      <input type="submit" class="btn btn-primary btn-lg pull-right" value="Save & Next" name="submit">                                      
                                      <div style="clear: both;"></div>
                                    </div>
                                    <div style="clear: both;"></div>
                                  </div>                
                                
                          </form>

                    <?php else: ?>  
                        <form class ="form-horizontal" action="add_other_details" method="post">                              
                                
                                    <div class="col-md-12"> 
                                            <div class="form-group col-sm-6">
                                              <label for="editor1" class="col-sm-4 control-label">Technical Skills:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor1" name="technical_skills" rows="15" cols="50">
                                                  <?php echo $resume->technical_skills ?>
                                                </textarea>
                                              </div>
                                            </div>

                                            <div class="form-group col-sm-6">
                                              <label for="editor2" class="col-sm-4 control-label">Activities:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor2" name="activites" rows="15" cols="50">
                                                  <?php echo $resume->activities ?>
                                                </textarea>
                                              </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                              <label for="editor3" class="col-sm-4 control-label">Achievements:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor3" name="achievement" rows="10" cols="80">
                                                  <?php echo $resume->achievement ?>
                                                </textarea>
                                              </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                              <label for="editor4" class="col-sm-4 control-label">Hobbies:</label>

                                              <div class="col-sm-12">
                                                <!-- <textarea class="textarea input-lg" name="description" placeholder="Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->

                                                <textarea id="editor4" name="hobbies" rows="10" cols="80">
                                                  <?php echo $resume->hobbies ?>
                                                </textarea>
                                              </div>
                                           </div>
                                                              
                                    </div>
                                
                                 <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-6">
                                      <input type="submit" class="btn btn-warning btn-lg" value="Previous" name="submit">
                                      <input type="submit" class="btn btn-primary btn-lg pull-right" value="Save & Next" name="submit">                                      
                                      <div style="clear: both;"></div>
                                    </div>
                                    <div style="clear: both;"></div>
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
