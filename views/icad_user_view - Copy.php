
<?php    
if(!($this->session->userdata('usname')) != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('icad');
}
?>

<style type="text/css">
hr {
border-top: 1px solid black;
}

footer.sticky-footer {
width: 100%;
}

.container{

max-width: 100% !important;
padding-left: 0px;
padding-right: 0px;
}

.col-lg-12{
padding-left: 0px;
padding-right: 0px;
}

.flt-left{
float: left;
}
.flt-right{
float: right;
}
.textcolor{
color: blue
}
thead{
background-color:#154360;

color:white;
}

</style>

<body>

<!-- <div class="content-wrapper"> --><section class="content">
    <h2 style="text-align: center; background-color: #1a5276;color: white; padding: 20px;" >ICAD Student's University Status</h2>
    <div style="background-color: #d7dbdd;text-align: right"><span style="padding: 5px;"><i class="fa fa-user" style="color: blue; font-size: 20px; margin-right: 10px;"></i><div class="btn btn-success" style="margin-right: 10px;"><?php echo $this->session->userdata('usname'); ?></div><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#logoutModel">logout</button></span> </div>

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Student's University Status </h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered ">
                <thead>
                <tr>
                  <th>Sr</th>
                  <th>Student Name</th>
                  <th>University Name</th>
                  <th>Course</th>
                  <th>Term</th>
                  <th>Status</th>
                  <th>Updated at</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      $i =0;
                      foreach($student as $key => $data)
                     {
                        $i++;
                    ?>
                 <tr>
                        <td><?php echo $i;?></td>
                      
                        <td><?php echo $data['firstname']." ".$data['lastname']; ?></td>
                        <td><?php echo $data['university_name']; ?></td>
                        <td><?php echo $data['student_course']; ?></td>
                        <td><?php echo $data['student_term']; ?></td>
                        <td><?php if($data['student_status']=='admit'){ ?>
                            <a class="btn btn-success"><?php echo $data['student_status']; ?></a>
                        <?php }  ?>

                        <?php if($data['student_status']=='reject'){ ?>
                            <a class="btn btn-danger"><?php echo $data['student_status']; ?></a>
                        <?php }  ?>
                            
                        </td>
                   

                        <td><?php //echo $data['icad_ss_updated']."<br/>" ?><?php echo date('d-m-Y',strtotime($data['icad_ss_updated'])); ?></td>
                    
                   </tr>
              
                  

                
              
                      <?php
                        }
                      ?>
                   </tbody>
              </table>
            </div><!--box-body-->
          </div><!--box-->
<!-- </div> -->
<!-- /.container-fluid -->
</section>
<!-- </div> -->
<br>
<!-- Sticky Footer -->
 <footer class="" style="background-color:#5d6d7e; color: white; padding-bottom: 10px;padding-top: 10px;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto" >
                    <span style="font-weight: bold; font-size: 16px;">Copyright © Design & Developed By Shah-Overseas 2019</span>
                </div>
            </div>
        </footer>

<div class="modal fade" id="logoutModel" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                   <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Logout</h4>
                    </div>
                    <form action="logout_user" method="post">
                    <div class="modal-body">
                        
                      <p>Are you sure want to Logout?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <input type="submit" class="btn btn-danger" name="delete" value="Logout">

                    </div>
                  </form>
                  </div>

                </div>
              </div>
<!-- end logout modal -->
