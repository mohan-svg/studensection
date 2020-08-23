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
        Search Applied University By Student Name
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
            <form role="form" method="post" action="search_by_student">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1" style="font-size: 16px;">Student Name</label>
                  <select class="form-control" name="student_name" id="student_name" style="font-size: 16px;" data-search="true" placeholder="Select Student">
                    
                    <?php 
                      foreach ($student as $key => $value) { ?>
                    
                    <option value="<?php echo $value['stud_id'] ?>"><?php echo ucwords(strtolower($value['firstname']))." ".ucwords(strtolower($value['lastname']));?></option>
                    
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
          </div>
          <!-- /.box -->
          <?php 
      if(empty($university_data)){
        echo"<br>";
        echo "<div class='container'>";
        echo "<h3>Please select the student /University Applied for selected student</h3>";
        echo "<div>";
    } else{

      // print_r($sop);
?>  <div class="box">
            <div class="box-header" style="text-align: center;">
              <h3 class="box-title" ><?php echo ucwords($university_data[0]['student_name']); ?> : University Application Status</h3>
             
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
                      foreach($university_data as $key => $data)  
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

<?php } ?> 
                  
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
