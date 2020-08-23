<?php    
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
?>
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
              <h3 class="box-title">Add New University</h3>
              
            </div>
            <?php echo form_open_multipart('adduniname');?>
              <div class="box-body">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                       <input type="hidden" class="form-control" name="stud_id">
                        <label>University Name</label>
                        <input type="text" class="form-control" placeholder="University Name" name="uniname" required="">
                        <?php echo form_error('uniname',"<div style='color:red'>","</div>");?>
                        </div>
                      </div>

                     

                    </div>
                  </div>
                 
               <div class="box-footer">

                <button type="submit" class="btn btn-info btn-fill pull-right" name="stu_submit">Submit</button>
                <div class="clearfix"></div>
              </div>
            </form>
          </div><!--box-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">University Student Status</h3>
             
            </div>
            
            <div class="box-body">
          

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>University Name</th>
                  
                  <th>Updated</th>
                  <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      foreach($university_name as $key => $data)  
                     {
                      
                    ?>
                 <tr>
                        <td><?php echo $data['id'];?></td>
                        <td><?php echo strtoupper($data['u_name']); ?></td>
                        
                        <td><?php echo date('d-m-Y H:i:s',strtotime($data['uname_updated'])); ?></td>
                        <td>
                          <button type="button" name="delete" class="btn btn-warning" data-toggle="modal" data-target="#myModalu<?php echo $data['id']; ?>">Edit</button>
                         <button type="button" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">Delete</button>
                         </td>
                   </tr>
              <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete File</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_error('uniname',"<div style='color:red'>","</div>");?>
                      <p>Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a href="<?php echo base_url('deluname/' .$data['id']) ?>"><button type="button" class="btn btn-danger" name="delete"> Yes..! Delete</button></a>

                    </div>
                  </div>
                  
                </div>
              </div>

               <div class="modal fade" id="myModalu<?php echo $data['id']; ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update University</h4>
                    </div>
                    <div class="modal-body">
                       <?php echo form_open('edituname/'.$data['id']);?>
                      <label>University Name</label>
                       <input type="text" class="form-control" placeholder="University Name" name="uniname" value="<?php echo $data['u_name'];?>" required="">
                        <?php echo form_error('uniname',"<div style='color:red'>","</div>");?>
              
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



    
