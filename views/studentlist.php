<?php    
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        University Data
      </h1><br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">List</a></li>
        <li class="active">List of University</li>
      </ol>
    </section>
  <section class="content">
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
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">University Student Status</h3>
             
            </div>
            
            <div class="box-body">
          

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>University Name</th>
                  <th>Course Name</th>
                  <th>Status</th>
                  <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      foreach($university as $key => $data)  
                     {
                      
                    ?>
                 <tr>
                        <td><?php echo ucwords($data['student_name']);?></td>
                        <td><?php echo strtoupper($data['university_name']); ?></td>
                        <td><?php echo strtoupper($data['course_name']); ?></td>
                        <td><?php echo ucwords($data['decision']); ?></td>
                        <td><a class="btn btn-success" href="<?php echo base_url('edit/'.$data['university_id'])?>" >Edit</a>
                          <a class="btn btn-primary" href="<?php echo base_url('view/'.$data['university_id'])?>">View</a>
                         <button type="button" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['university_id']; ?>">Delete</button>
                         </td>
                   </tr>
              <div class="modal fade" id="myModal<?php echo $data['university_id']; ?>" role="dialog">
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
                      <a href="<?php echo base_url('del/' .$data['university_id']) ?>"><button type="button" class="btn btn-danger" name="delete"> Yes..! Delete</button></a>
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




          </div>
        </div>
      </div>
    </section>
  </div>
</div>