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
              <h3 class="box-title">Manage ICAD User</h3>

            </div>
            <?php echo form_open_multipart('insert_icad_user');?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">

                   <!-- <div id="row"> -->
                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Username: </label>
                        <input type="text" class="form-control" name="username" placeholder="abc@soe.com">

                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                        <label>Password<i style="color: red;">*</i>: </label>
                        <input type="text" class="form-control" name="password">

                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>User Status: </label>
                          <select name="userstatus" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            
                          </select>

                          </div>
                      </div>

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
              <h3 class="box-title">Icad Users </h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr>
                  <th>Sr</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      $i =0;
                      foreach($icad_users as $key => $data)
                     {
                        $i++;
                    ?>
                 <tr>
                        <td><?php echo $i;?></td>
                      
                        <td><?php echo $data['icad_username']; ?></td>
                        <td><?php echo $data['icad_pass']; ?></td>
                        <td><?php echo $data['user_status']; ?></td>
                   

                        <td><?php //echo $data['icad_ss_updated']."<br/>" ?><?php echo date('d-m-Y H:i:s',strtotime($data['icad_user_updated'])); ?></td>
                        <td>
                          <button type="button" name="delete" class="btn btn-warning" data-toggle="modal" data-target="#myModalu<?php echo $data['icad_user_id']; ?>">Edit</button>
                         <button type="button" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['icad_user_id']; ?>">Delete</button>
                         </td>
                   </tr>
              <div class="modal fade" id="myModal<?php echo $data['icad_user_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                   <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete File</h4>
                    </div>
                    <form action="delete_ic_user" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="icad_user_id" value="<?php echo $data['icad_user_id']; ?>">
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

               <div class="modal fade" id="myModalu<?php echo $data['icad_user_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Icad User</h4>
                    </div>
                    <div class="modal-body">
                       <?php echo form_open_multipart('update_ic_user');?>
                    <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                        <input type="hidden" name="ss_id" value="<?php echo $data['icad_user_id']; ?>">
                        <label>Username: </label>
                        <input type="text" class="form-control" name="username" value="<?php echo $data['icad_username']; ?>" placeholder="abc@soe.com">

                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                        <label>Password<i style="color: red;">*</i>: </label>
                        <input type="text" class="form-control" name="password" value = "<?php echo $data['icad_pass']; ?>">

                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>User Status: </label>
                          <select name="userstatus" class="form-control"><option value="<?php echo $data['user_status']; ?>"><?php echo $data['user_status']; ?></option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            
                          </select>

                          </div>
                      </div>
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


