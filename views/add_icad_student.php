<?php
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style type="text/css">
    @media (min-width: 768px){
      .modal-dialog {
          width: 900px;
          margin: 30px auto;
      }
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
              <h3 class="box-title">Add ICAD Student Application Status</h3>

            </div>
            <?php echo form_open_multipart('insert_icad_data');?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Student Name: <span style="color:red;">*</span></label>
                        <select name="stud_id" class="form-control" required="Please Select Student">
                        	<option>--Select Student--</option>
                        	<?php foreach ($student as $key => $val) { ?>
                        	   	<option value="<?php echo $val['stud_id']; ?>"><?php echo $val['firstname']." ".$val['lastname']; ?></option>
                        	<?php  } 	?>
                        </select>

                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label>University Name: <span style="color:red;">*</span></label>
                        <select name="university" class="form-control" required="Please Select Student">
                          <option>--Select University--</option>
                          <?php foreach ($university as $key => $val) { ?>
                              <option value="<?php echo $val['u_name']; ?>"><?php echo $val['u_name']; ?></option>
                          <?php  }
                          ?>
                        </select>

                        </div>
                      </div>

                     <!-- <div id="row"> -->
                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Course: </label>
                        <input type="text" class="form-control" name="course" placeholder="ex. GRE Test Booking">

                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                        <label>Term<i style="color: red;">*</i>: </label>
                        <input type="text" class="form-control" name="term" placeholder="ex. 10000">

                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Application Status: </label>
                          <select name="appstatus" class="form-control">
                          <option value="admit">Admit</option>
                          <option value="reject">Reject</option>
                          <option value="insufficient document">Insufficient Document</option>
                          <option value="in submission process">In Submission Process</option>
                          <option value="application submitted">Application Submitted</option>
                          <option value="insufficient documents">Insufficient Documents</option>
                          <option value="under graduate commitee review">Under Graduate Commitee Review</option>
                          </select>

                          </div>
                      </div>

                     <!--  <div class="col-md-4">
                        <div class="form-group">
                          <label>Upload Decision Letter:</label>
                          <input type="file" name="receipts" class="form-control">
                        </div>
                        </div>
 -->
                      

                      <!-- </div> --> <!--Id="row"-->
                      <!-- <div class="col-md-12">
                        <button type="button" name="add" id="add" class="btn btn-success">+ Add More</button>
                      </div> -->

                     </div>
                  </div>

               <div class="box-footer" style="text-align: center;" >

                <button type="submit" class="btn btn-info btn-fill" name="stu_submit">Submit</button>
                <div class="clearfix"></div>
              </div>
            </form>
          </div><!--box-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Icad Students </h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                  <th>Sr</th>
                  <th>Student Name</th>
                  <th>University Name</th>
                  <th>Course</th>
                  <th>Term</th>
                  <th>Application Status</th>
                  <!-- <th>Receipt<br/>(Rs)</th> -->
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      $i =0;
                      foreach($icad_data as $key => $data)
                     {
                        $i++;
                    ?>
                 <tr">
                        <td><?php echo $i;?></td>
                        <td><?php echo $data['firstname']." ".$data['lastname'] ;?></td>
                        <td><?php echo $data['university_name']; ?></td>
                        <td><?php echo $data['student_course']; ?></td>
                        <td><?php echo $data['student_term']; ?></td>
                        <td><?php echo $data['student_status']; ?></td>
                     <!--    <td> <?php if($data['student_admits']!=''){ ?>
                            <a class="btn btn-success" href="<?php echo base_url('admit_receipt/'.$data['student_admits']); ?>" target="_blank" >View Receipt</a>
                          <?php } ?>
                        </td> -->

                        <td><?php //echo $data['icad_ss_updated']."<br/>" ?><?php echo date('d-m-Y H:i:s',strtotime($data['icad_ss_updated'])); ?></td>
                        <td>
                          <button type="button" name="delete" class="btn btn-warning" data-toggle="modal" data-target="#myModalu<?php echo $data['icad_ss_id']; ?>">Edit</button>
                         <button type="button" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['icad_ss_id']; ?>">Delete</button>
                         </td>
                   </tr>
              <div class="modal fade" id="myModal<?php echo $data['icad_ss_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                   <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete File</h4>
                    </div>
                    <form action="delete_icad_data" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="icad_status_id" value="<?php echo $data['icad_ss_id']; ?>">
                        <?php echo form_error('uniname',"<div style='color:red'>","</div>");?>
                      <p>Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <input type="submit" class="btn btn-danger" name="delete" value="Yes..! Delete">

                    </div>
                  </form>
                  </div>

                </div>
              </div>

               <div class="modal fade" id="myModalu<?php echo $data['icad_ss_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Icad Student Status</h4>
                    </div>
                    <div class="modal-body">
                       <?php echo form_open_multipart('update_icad_data');?>
                    <div class="row">
                      <input type="hidden" name="icad_id" value="<?php echo $data['icad_ss_id']; ?>">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Student Name: </label>
                        <select name="stud_id" class="form-control">
                              <option value="<?php echo $data['stud_id']; ?>"><?php echo $data['firstname']." ".$data['lastname']; ?></option>
                          ?>
                        </select>

                        </div>
                      </div>

                     <div class="col-md-4">
                      <div class="form-group">
                        <label>University Name: </label>
                        <input type="text" class="form-control" name="university_name" value="<?php echo $data['university_name']; ?>">

                        </div>
                      </div>
                      
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Course: </label>
                        <input type="text" class="form-control" name="course" value="<?php echo $data['student_course']; ?>">

                        </div>
                      </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Term: </label>
                        <input type="text" class="form-control" name="term" value="<?php echo $data['student_term']; ?>">

                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Application Status: </label>
                          <select name="appstatus" class="form-control">
                          <option value="<?php echo $data['student_status']; ?>"><?php echo $data['student_status']; ?></option>
                          <option value="admit">Admit</option>
                          <option value="reject">Reject</option>
                          <option value="insufficient document">Insufficient Document</option>
                          <option value="in submission process">In Submission Process</option>
                          <option value="application submitted">Application Submitted</option>
                          <option value="insufficient documents">Insufficient Documents</option>
                          <option value="under graduate commitee review">Under Graduate Commitee Review</option>
                          </select>

                          </div>
                      </div>
                    <!--  <div class="col-md-4">
                        <div class="form-group">
                          <label>Upload <i>(Receipt/Screenshot)</i></label>
                          <input type="file" name="receipts">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <?php if($data['student_admits']!=''){ ?>
                            <a class="btn btn-success" href="<?php echo base_url('admit_receipt/'.$data['student_admits']); ?>" target="_blank" >View Receipt</a>
                            <input type="hidden" name="uploaded_file" value="<?php echo $data['student_admits']; ?>">
                          <?php } ?>
                        </div>
                      </div> -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-success" name="submit"> Submit</button>
                    </form>
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


