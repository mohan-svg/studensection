	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

<style type="text/css">
  .pads{padding-right: 20px;}

  .btn{

        margin-left: 30px;
      }

      .marg_bot{

        margin-bottom: 20px;
      }
  
  label{
    font-size: 16px;
  }

@media screen and (max-width:650px){
      .padss{
        padding-bottom: 20px; 
      }

      
      label{
        font-size: 16px;
        margin-top: 20px;
      }
  }

  .red{
    color:red;
  }
</style>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        View Documents of Students
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section> -->



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
            <form role="form" method="post" action="view_chats">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1" style="font-size: 16px;">Student Name</label>
                  <select class="form-control" name="student_name" id="student_name" style="font-size: 16px;">
                    <option value="">--Please Select the Student--</option>
                    <?php 
                      foreach ($student as $key => $value) { ?>
                    
                    <option value="<?php echo $value['stud_id'] ?>"><?php echo ucwords($value['firstname'])." ".$value['lastname'];?></option>
                    <?php 
                      }
                    ?>
                  </select>
                </div>
               <br/>
              <div class="box-footer col-md-3" >
                <button type="submit" class="btn btn-primary col-md-3" >Search</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <?php 
      if(empty($chats)){
        echo"<br>";
        echo "<div class='container'>";
        echo "<h3>Please select the student /No Chat History found for selected student</h3>";
        echo "<div>";
    } else{

      // print_r($chats);
?>
         <div class="box box-primary" id="sop">
            <div class="box-header with-border">
            	
                  <div class="box-body">
                  <form method="post" action="<?php echo site_url('upload_documents');?>" enctype="multipart/form-data">
                 <hr>
                    <h2 class="title" style="text-align: center;">View Chat History:</h2>
                    <h3 style="text-align: center; font-weight: bold; color:#2f3562;">(<?php echo ucwords($chats[0]['firstname'])." ".$chats[0]['lastname']." / ".$chats[0]['username']; ?>)</h3>
                <br>
                <hr>

                <?php if($chats=='no_data'){

                  echo "<h3> No Document Uploaded </h3";

                } else{  

                foreach ($chats as $key => $val) { ?>

                 <?php if($val['action']=='text'){ ?>

              
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo ucfirst($val['firstname']." ".$val['lastname']); ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $val['date'];?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo base_url('images/avaatar.png') ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text" >
                        <?php echo ucfirst($val['user']); ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                   
                  

                     <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right" style="color: #c4191f;">Veronica</span>
                        <span class="direct-chat-timestamp pull-left"><?php echo $val['date'];?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo base_url('images/veronica.png') ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div  class="direct-chat-text">
                        <?php 
                      
                        echo $val['chatbot'];?>

                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
         <?php } else if($val['action']=='media'){ ?>


                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo ucfirst($val['firstname']." ".$val['lastname']); ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $val['date'];?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo base_url('images/avaatar.png') ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text" >
                        <?php echo ucfirst($val['user']); ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->


                  <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right" style="color: #c4191f;">Veronica</span>
                        <span class="direct-chat-timestamp pull-left"><?php echo $val['date'];?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo base_url('images/veronica.png') ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php  
                          echo $val['chatbot'];
                        ?>
                      </div>

                      <div class="direct-chat-text" style="text-align: right;">
                        <h6><?php echo $val['file']; ?></h6>
                        <a href="uploads/<?php echo $val['file'];?>" target="_blank" ><button class="btn-sm btn-warning">Open</button></a>  
                        <a href="uploads/<?php echo $val['file'];?>" download><button class="btn-sm btn-success">Download</button></a>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                <?php } //action ?>


    <?php   } //foreach
        }

      }
    ?> 
                  
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 