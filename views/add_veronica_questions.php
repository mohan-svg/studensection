
<?php // include "sidebar.php"; ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">

@media screen and (min-width: 650px){
  .direct-chat-messages{
    /*height:600px!important;*/
    height: 650px!important;
    max-height: 650px;

    overflow-y: scroll!important;
  }
}
  .direct-chat-text{
        /*margin: 8px 0 0 50px!important;*/
        padding: 8px 6px !important;
  }

@media screen and (max-width: 600px){
  .direct-chat-messages{
    /*height:600px!important;*/
    height: 400px!important;
    overflow-y: scroll!important;
  }
}

.direct-chat-primary .right>.direct-chat-text {
    background: #2f3562;
    border-color: #2f3562;
    color: #fff;
}

.direct-chat-primary .right>.direct-chat-text:after, .direct-chat-primary .right>.direct-chat-text:before {
    border-left-color: #2f3562;
}

.btn-primary {
    background-color: #2f3562;
    border-color: #2f3562;
}

.box.box-primary {
    border-top-color: #2f3562;
}


/* Top Navigation*/


.w3-teal, .w3-hover-teal:hover {
    color: #fff !important;
background-color:#2f3562 !important;
line-height: 4;

}

.w3-sidebar {
    color: white;
    background-color: #c4191f;
}

@media screen and (max-width: 600px) {
  .w3-container{
    float: right;
    padding-top: 5px;
    padding-bottom: 5px;
    line-height: 2;
  }

  .w3-teal, .w3-hover-teal:hover {
   
  line-height: 2;

}
}

.box-body {
   
    overflow-y: scroll;
}


</style>



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
       
    <!-- Main content -->
    <section class="content container-fluid">


      <div class="box box-primary">

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
              <h3 class="box-title">Add Question-Answer to Veronica</h3>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="ver_insert_ques" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <label for="exampleInputEmail1">Question<span style="color: red;">*</span></label>
                      <span id='ques_error' style="color: red;"></span>
                      <textarea class="form-control" id="question" name="question" required> </textarea>

                      
                    </div>
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <label for="exampleInputEmail1">Answer<span style="color: red;">*</span></label>
                      <span id='ans_error' style="color: red;"></span>
                      <textarea class="form-control" id="answer" name="answer" required> </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <label for="questionType">Question Type<span style="color: red;">*</span> </label>
                      <select class="form-control" name="action" required>
                        <option value="text">Text</option>
                        <option value="query">Query</option>
                        <option value="media">Media</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <label for="uploadFile">Upload File <span style="color: red;">(only required for media type Ques.)</span></label>
                      <input type="file" name="fileToUpload" class="form-control" >
                    </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" style="margin-left: 40px;">
                <input type="submit" class="btn btn-primary" value="Add Question">
              </div>
            </form>
          </div>


    </section>
    <!-- /.content -->


<section class="content">
      <div class="row">
        <div class="col-xs-12">
                
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Question-Answer (Veronica)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Sr.No</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Action</th>
                      <th>File</th>
                      <th>Updated</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php

              if(empty($ver_ques)){
                  echo"<br>";
                  echo "<div class='container'>";
                  echo "<h3>Please select the student /No Document found for selected student</h3>";
                  echo "<div>";
    
              } else{

                  foreach($ver_ques as $key => $row){ ?>

                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['question']; ?></td>
                      <td><?php echo $row['answer']; ?></td>
                      <td><?php echo $row['action']; ?></td>
                      <td><?php echo $row['file']; 

                            if($row['file']!=''){ ?>
                              <a href="uploads/<?php echo($row['file']) ?>" target="_blank" class="btn btn-sm btn-success">View</a>

                          <?php    

                            }

                          ?>
                      </td>
                      <td><?php echo date('d M Y h:i:s', strtotime($row['updated'])) ; ?></td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Edit</button> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $row['id']; ?>">Delete</button></td>
                    </tr>
              
                  <!--Modal Starts Here-->

                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" role="dialog">
                      <div class="modal-dialog" style="width:fit-content!important;">
                      
                        <!-- Modal content-->
                        <div class="modal-content" style="width:fit-content!important;">
                           <div class="box-header with-border">
                                          <h3 class="box-title">Edit Question-Answer to Veronica</h3>
                                      
                           </div>
                          <div class="modal-body" style="width:100%!important;">
                                                                      
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <form action="ver_edit_ques" method="post" enctype="multipart/form-data" >
                                          <div class="box-body">
                                            <div class="col-md-12">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                  <label for="exampleInputEmail1">Question<span style="color: red;">*</span></label>
                                                  <span id='ques_error' style="color: red;"></span>
                                                  <textarea class="form-control" id="question" name="question" required><?php echo $row['question']; ?> </textarea>

                                                  
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                  <label for="exampleInputEmail1">Answer<span style="color: red;">*</span></label>
                                                  <span id='ans_error' style="color: red;"></span>
                                                  <textarea class="form-control" id="answer" name="answer" required> <?php echo $row['answer']; ?> </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                                  <label for="questionType">Question Type<span style="color: red;">*</span> </label>
                                                  <select class="form-control" name="action" required>
                                                    <option value="text" <?php if($row['action']=='text'){ ?>selected="selected" <?php } ?>>Text</option>
                                                    <option value="query" <?php if($row['action']=='query'){ ?>selected="selected" <?php } ?>>Query</option>
                                                    <option value="media" <?php if($row['action']=='media'){ ?>selected="selected" <?php } ?>>Media</option>
                                                  </select>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                                  <label for="uploadFile">Upload File <span style="color: red;">(only required for media type Ques.)</span></label>
                                                  <input type="file" name="fileToUpload" class="form-control" >

                                                  <br>
                                                  <?php if($row['file']!=''){ ?>
                                                      <?php echo($row['file']) ?> <a href="uploads/<?php echo($row['file']) ?>" target="_blank" class="btn btn-success btn-sm">View</a>

                                                  <?php    

                                                    }

                                                  ?>
                                                </div>
                                            </div>
                                          </div>
                                          <!-- /.box-body -->

                                          <div class="box-footer" style="margin-left: 40px;">
                                            <input type="submit" class="btn btn-primary" value="Update Question">
                                          </div>
                                        </form>
                                  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  <!--Modal Ends Here-->

                   <!-- Delete Modal -->
                          <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-body" style="text-align: center;">

                                  <form action="delete_ques" method="post">
                                    <input type="hidden" name="del_id" value="<?php echo $row['id']; ?>">
                                    <h2 style="color: green;">Are You Sure want to delete</h2>
                                    <div style="margin-top: 30px; "><input type="submit" value="Delete" class="btn btn-danger"> <button type="button" class="btn btn-info" data-dismiss="modal" style="margin-left: 60px;">Cancel</button></div>

                                  </form> 
                                  
                                </div>
                                
                              </div>
                              
                            </div>
                          </div>
                          <!-- Delete Modal Ends -->

                  <?php 

                  }//foreach()

                }//else

              ?>


                </tbody>
                <tfoot>
                <tr>
                      <th>Sr.No</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Action</th>
                      <th>File</th>
                      <th>Updated</th>
                      <th>Actions</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


  

  </div>
  <!-- /.content-wrapper -->



</span>
</body>

<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">

  // SELECTING ALL TEXT ELEMENTS
var ques = document.getElementById('question');
var ans = document.getElementById('answer');

// SELECTING ALL ERROR DISPLAY ELEMENTS
var ques_error = document.getElementById('ques_error');
var answer_error = document.getElementById('ans_error');

// SETTING ALL EVENT LISTENERS
ques.addEventListener('blur', quesVerify, true);
ans.addEventListener('blur', ansVerify, true);


// validation function
function Validate() {
  // validate username/email
    if (ques.value.trim() == "") {
    ques.style.border = "1px solid red";
    document.getElementById('ques_error').style.color = "red";
    name_error.textContent = "Question is required";
    ques.focus();
    return false;
  }

    if (ans.value.trim() == "") {
    ans.style.border = "1px solid red";
    document.getElementById('email_error').style.color = "red";
    ans_error.textContent = "Email is required";
    ans.focus();
    return false;
  }
  
    
}
// event handler functions

function quesVerify() {

  if (ques.value.trim() != "") {
    ques.style.border = "1px solid #5e6e66";
    document.getElementById('ques_error').style.color = "#5e6e66";
    ques_error.innerHTML = "";
    return true;
  }

}

function ansVerify() {

  if (ans.value.trim() != "") {
    ans.style.border = "1px solid #5e6e66";
    document.getElementById('ans_error').style.color = "#5e6e66";
    ans_error.innerHTML = "";
    return true;
  }

}


</script>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
