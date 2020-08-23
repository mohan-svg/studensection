	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Student Resume
       <!--  <small>Preview</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
            </div>  
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <form role="form" method="post" action="view_stud_resume">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1" style="font-size: 16px;">Student Name</label>
                  <select class="form-control" name="resume_id" id="student_name" style="font-size: 16px;" data-search="true" placeholder="Select Student">
                    <option value="">--select student name--</option>
                    <?php 
                      foreach ($student as $key => $value) { ?>
                    
                    <option value="<?php echo $value['resume_id'] ?>"><?php echo ucwords(strtolower($value['student_name']));?></option>
                    
                    <?php 
                      }
                    ?>
                  </select>
                </div>
               <br/>
              <div class="box-footer col-md-3" >
                <button type="submit" name="getsop" value="submit" class="btn btn-primary col-md-3" >Search</button>
              </div>
             
             
            </form>
          


                 <?php if(empty($resume)): ?>
                      <div class="col-sm-12" style="margin-bottom: 50px;">
                        <div style="border: 1px dotted gray; text-align: center;">
                          <h1 style="color: gray">-- No Resume found -- </h1>
                        </div>
                      </div>
                      <?php else: ?>
                        <div class="col-sm-12">
                          <a href="create_resume" class="btn btn-warning">Edit Resume</a>
                          <a href="create_resume_pdf" class="btn btn-primary pull-right" target="_blank">Create Pdf</a>
                          <a href="to_word" class="btn btn-primary pull-right" style="margin-right: 20px;">Create Word</a>
                        </div>

                        <div class="col-sm-12" style="margin-bottom: 50px;">

                            <h3 style="text-align: center;">View Resume <?php if($this->session->has_userdata('student_name')): ?>
                          (<?php echo $this->session->userdata('student_name'); ?>)
                        <?php endif; ?></h3>
                            <table style="width: 600px; margin:0 auto; font-family: Times New Roman;">
                              <tr style="width: 100%">
                                <td width="45%">
                                    <?php // $myresume = $resume->row(); ?>

                                    <h3><strong><?php echo $resume->student_name; ?></strong></h3>
                                    <p><?php echo $resume->address_line1; ?></p>
                                    <p><?php echo $resume->address_line2; ?></p>
                                    <p><?php echo "India - ".$resume->zipcode; ?></p>                                         
                                </td>
                                <td style="text-align: right">
                                    <p><?php echo $resume->contact_no; ?></p>
                                    <p><?php echo $resume->email_id; ?></p>
                                </td>
                              </tr>

                              <tr class="sub-heading">
                                  <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                    <strong >EDUCATION</strong>
                                  </td>                    
                              </tr>
                              <?php foreach($education as $key => $val): ?>

                                 <?php if(($val["education_level"]=="Higher Secondary Education") || ($val["education_level"]=="Secondary School Education")): ?> 

                                      <tr style="width: 100%">
                                          <td width="65%">
                                              <div class="" style="margin-top: 20px;"><?php echo $val['college_board'] ?></div>
                                              <div><strong><?php echo $val['education_level'] ?></strong></div>
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong><?php echo $val['duration'] ?></strong></div>
                                              <div><strong><?php echo "GPA: ".$val['cgpa'] ?></strong></div>
                                          </td>                 
                                      </tr>

                                 <?php else:  ?>

                                      <tr style="width: 100%">
                                          <td width="65%">
                                              <div class="" style="margin-top: 20px;"><strong><?php echo $val['college_board'] ?></strong></div>
                                              <div><strong><?php echo $val['degree_name'] ?> , <?php echo $val['major'] ?> </strong></div>
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong><?php echo $val['duration'] ?></strong></div>
                                              <div><strong><?php echo "GPA: ".$val['cgpa'] ?></strong></div>
                                          </td>                 
                                      </tr>

                                 <?php endif;  ?>

                                  
                              <?php endforeach; ?>    
                              <!-- <tr>
                                <td colspan="2"> <div style="margin-top: 20px;"></div></td>
                              </tr> -->

                              <?php if(!empty($work_exp)): ?>
                                  <tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <div style="margin-top: 20px;"><strong>EXPERIENCE</strong></div>
                                      </td>                    
                                  </tr>
                                  <?php foreach($work_exp as $key => $val): ?>
                                      <tr style="width: 100%">
                                          <td width="66%">
                                              <div class="" style="margin-top: 20px;"><strong><?php echo $val['company_name'] ?></strong></div>
                                              <div><strong><?php echo $val['position'] ?></strong></div>
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong><?php echo $val['duration'] ?></strong></div>
                                              <!-- <div>GPA: 8.12</div> -->
                                          </td>                 
                                      </tr>

                                      <tr>
                                        <td colspan="2" style="text-align: justify;">
                                          <?php echo $val['description'] ?>
                                        </td>
                                      </tr>
                                  <?php endforeach; ?>  
                              <?php endif; ?>

                              <?php if(!empty($internship)): ?>
                                  <tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <div style="margin-top: 20px;"><strong>INTERNSHIP</strong></div>
                                      </td>                    
                                  </tr>
                                  <?php foreach($internship as $key => $val): ?>
                                      <tr style="width: 100%">
                                          <td width="66%">
                                              <div class="" style="margin-top: 20px;"><strong><?php echo $val['company_name'] ?></strong></div>                                              
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong><?php echo $val['duration'] ?></strong></div>
                                              <!-- <div>GPA: 8.12</div> -->
                                          </td>                 
                                      </tr>

                                      <tr>
                                        <td colspan="2" style="text-align: justify;">
                                          <?php echo $val['description'] ?>
                                        </td>
                                      </tr>
                                  <?php endforeach; ?>  
                              <?php endif; ?>

                              <?php if(!empty($project)): ?>
                                    <tr class="sub-heading">
                                        <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                          <div style="margin-top: 20px;">
                                            <strong>ACADEMIC PROJECTS</strong>
                                          </div>
                                        </td>                    
                                    </tr>
                                    <?php foreach($project as $key => $val): ?>
                                        <tr style="width: 100%">
                                            <td width="66%">
                                                <div class="" style="margin-top: 20px;"><strong><?php echo $val['proj_title'] ?></strong></div>
                                                <div><strong><?php echo $val['proj_subtitle'] ?></strong></div>
                                            </td>   
                                            <td style="text-align: right;">
                                                <div style="margin-top: 20px;"><strong><?php echo $val['duration'] ?></strong></div>
                                                <!-- <div>GPA: 8.12</div> -->
                                            </td>                 
                                        </tr>

                                        <tr>
                                          <td colspan="2" style="text-align: justify;">
                                              <?php echo $val['description'] ?>
                                          </td>
                                        </tr>

                                    <?php endforeach; ?>  
                              <?php endif; ?>


                              <?php if(($resume->activities !="") && ($resume->achievement !="")): ?>
                                  <tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                          <div style="margin-top: 20px;">
                                              <strong>ACTIVITIES & ACHIEVEMENTS</strong>
                                          </div>
                                      </td>                    
                                  </tr>

                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align: justify;">
                                          <?php echo $resume->achievement; ?>
                                          <?php echo $resume->activities; ?>
                                      </div>
                                    </td>
                                  </tr>
                              <?php endif; ?>

                              <?php if($resume->technical_skills !=""): ?>

                                  <tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <strong>TECHNICAL SKILLS</strong>
                                      </td>                    
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align: justify;">
                                        <?php echo $resume->technical_skills; ?>
                                      </div>
                                    </td>
                                  </tr>
                              <?php endif; ?>
                              <?php if($resume->hobbies !=""): ?>    
                                  <tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <strong>HOBBIES</strong>
                                      </td>                    
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align: justify;">
                                          <?php echo $resume->hobbies; ?>
                                      </div>
                                    </td>
                                  </tr>
                             <?php endif; ?>
                                  
                            </table>
                        </div>
                      <?php endif; ?>
           </div>
                  
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
