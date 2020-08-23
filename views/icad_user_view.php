
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
              <div class="col-md-12"><br/>
                <label>You can view University Status of Specific Student by searching using select box and <a class="btn btn-sm btn-info">search</a> || <a class="btn btn-sm btn-warning">View all</a> option to view University status of all Students</label>
                <div class="row" >
                  
                  <form action="icad_data" method="post">
                    <div class="box-body">
                    <div class="form-group col-md-3">
                      <select name="student_id" class="form-control">
                        <option>--Select Student-- </option>
                        <?php foreach ($student_name as $key => $value): ?>                    
                          <option value="<?php echo $value['icad_stud_id'] ?>"><?php echo $value['firstname']." ".$value['lastname']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-sm-2" >
                        <input type="submit" value="Search" name="search" class="btn btn-info form-control">
                      </div>
                      <div class="col-sm-2" >
                        <input type="submit" value="View All" name="view_all" class="btn btn-warning form-control">
                      </div>
                    </div>
                  </div>
                  </form>
                  
              </div>

            </div>
          </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example2" class="table table-bordered ">
                <thead>
                <tr>
                  <th>Sr</th>
                  <th>Student Name</th>
                  <th>University Name</th>
                  <th>Course</th>
                  <th>Term</th>
                  <th>Status</th>
                 <!--  <th>Updated at</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php
                      $i =0;
                      foreach($studentids as $key => $data)
                     {
                        $i++;
                    ?>
                 <tr style="background-color: #fdebd0; border-top: 1px solid black;">
                        <td><?php echo $i;?></td>
                      
                        <td style="font-weight: bold;"><?php echo $data['firstname']." ".$data['lastname']; ?></td>
                        <td colspan="4"> </td>
             
                    
                   </tr>
                  <?php $id = $data['icad_stud_id'];
                  $this->db->where('icad_stud_id',$id);
                   $query = $this->db->get('icad_student_status');

                   $querys = $query->result_array();
                
                   foreach($querys as $key =>$val){
             
                    ?>

                  <tr>      
                            <td colspan="2"> </td>
                                                      
                            <td><?php echo $val['university_name']; ?></td>
                            <td><?php echo $val['student_course']; ?></td>
                            <td><?php echo $val['student_term']; ?></td>
                            <td><?php if($val['student_status']=='admit'){ ?>
                                <a class="btn bg-olive btn-flat margin"><?php echo $val['student_status']; ?></a>
                            <?php }  ?>

                            <?php if($val['student_status']=='reject'){ ?>
                                <a class="btn bg-orange btn-flat margin"><?php echo $val['student_status']; ?></a>
                            <?php }  ?>

                            <?php if($val['student_status']!='reject' && $val['student_status']!='admit'){ ?>
                                <a class=""><?php echo ucwords($val['student_status']); ?></a>
                            <?php }  ?>
                                
                            </td>
                       
                       
                       </tr>
                  
                  <?php } ?>

                
              
             <?php  }     ?>
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
