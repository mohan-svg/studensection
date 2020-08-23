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
        View All Resume
      </h1>
    
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">View All Resume</a></li>
      </ol>
    </section>


    <section class="content" style="font-size: 16px;">
      <div class="row">
        <div class="col-md-12">
         
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

                      <?php if(empty($all_resume)){ ?>
                        <div style="border: 1px dotted gray; text-align: center;">
                          <h1 style="color: gray">-- No Resume found -- </h1>
                        </div>
                      <?php } else{ 

                            $i = 0;
                        ?>
                        <h4>All Resume</h4>
                        <table id="example1" class="table table-bordered table-striped" role="grid">
                          <thead>
                            <tr>
                              <th>Sr. No</th>
                              <th>Student Name</th>
                              <th>Email id</th>
                              <th>Contact No</th>
                              <th>Updated</th>
                              <th>Action</th>
                            </tr>
                            
                          </thead>
                          <tbody>
                            <?php foreach($all_resume as $key => $val){
                                $i++;
                              ?>
                            <tr>
                              <td><strong><?php echo $i ?></strong></td>
                              <td><?php echo $val['student_name'] ?></td>
                              <td><?php echo $val['email_id'] ?></td>                              
                              <td><?php echo $val['contact_no'] ?></td>                  
                              <td><?php echo date('d-m-Y',strtotime($val['resume_updated'])); ?></td>
                              <td><a class="btn btn-success" href="view_single_resume/<?php echo $val['resume_id'] ?>"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;View</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo site_url('edit_single_resume/'.$val['resume_id']) ?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Edit</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-danger" data-toggle="modal" data-target="#deleteResume<?php echo $val['resume_id'] ?>"><i class="glyphicon glyphicon-trash"></i>&nbsp;Delete</a></td>
                            </tr>

                            <div class="modal fade" id="deleteResume<?php echo $val['resume_id'] ?>" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <div class="form-group">
                                          <div class="col-sm-12" style="font-weight: bold; color: #a91b4b; text-align: center; font-size: 25px;"> Delete Work Experience</div>
                                      </div>
                                    </div>
                                    <form class="form-horizontal" action="delete_resume" method="post">
                                    <div class="modal-body">
                                        <div class="col-sm-1"></div>
                                        <input type="hidden" name="resume_id" value="<?php echo $val['resume_id'] ?>">
                                        <div class="col-sm-11">
                                          <div class="form-group col-sm-12">
                                            <h2 class="text-center">Do you really want to Delete Work Experience</h2>
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

                          <?php }  ?>
                          </tbody>
                        </table>
                      <?php } ?>

                      
                       
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-6">
                            <a href="education" class="btn btn-warning btn-lg">Previous</a>
                            <a href="academic_proj" class="btn btn-primary btn-lg pull-right">Save & Next</a>
                            <div style="clear: both;"></div>
                          </div>
                          <div style="clear: both;"></div>
                        </div>

          </div>

        </div><!--col-md-12-->
      </div><!--row-->

    </section>


 </div><!--content wrapper-->
