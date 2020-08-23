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
        View SOP of Students
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
            <form role="form" method="post" action="sopss">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1" style="font-size: 16px;">Student Name</label>
                  <select class="form-control" name="student_name" id="student_name" style="font-size: 16px;">
                    <option value="">--Please Select the Student--</option>
                    <?php 
                      foreach ($student as $key => $value) { ?>
                    
                    <option value="<?php echo $value['stud_id'] ?>"><?php echo ucwords($value['student_name'])." : ".$value['course'];?></option>
                    <?php 
                      }
                    ?>
                  </select>
                </div>
               <br/>
              <div class="box-footer col-md-3" >
                <button type="submit" name="getsop" value="submit" class="btn btn-primary col-md-3" >Search</button>
              </div>
              <div class="box-footer col-md-3" >
                <button type="submit" name="getsop" value="toword" class="btn btn-primary col-md-3" >Search</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <?php 
      if(empty($sop)){
        echo"<br>";
        echo "<div class='container'>";
        echo "<h3>Please select the student /No SOP found for selected student</h3>";
        echo "<div>";
    } else{

      // print_r($sop);
?>
         <div class="box box-primary" id="sop">
            <div class="box-header with-border">
            	<div class="box-body">
            		<h2 style="text-align: center; font-weight: bold; text-decoration:underline; color:#c4191f;">SOP</h2>
                <p style="text-align: center; font-size:18px;">(<?php echo ucwords($sop[0]['student_name'])." / ".$sop[0]['course']." / ".ucwords($sop[0]['term']); ?>)</p>
            		<div id="sopdata" style="font-size: 18px;"> 
                    <?php foreach ($sop as $key => $val) { ?>
                      <p style="color: #2f3562; font-weight: bold;"><?php echo "<span style='color:#c4191f;'>".$val['q_id'].".</span> ".$val['question']; ?></p>
                      <!-- <p style="border:1px solid gray; padding: 5px;"><?php echo $val['answer']; ?></p> -->
                      <div style="font-size: 18px; padding: 6px; " ><?php echo $val['answer']; ?></div>
                      
                    <?php } ?>
                  
            			
            		</div>

            	</div>
            </div>
          </div>
<?php } ?> 
                  
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019-2020 &nbsp;<a href="https://www.shahgre.com">SHAH Overseas</a>.</strong> &nbsp;All rights
    reserved.
  </footer> -->
