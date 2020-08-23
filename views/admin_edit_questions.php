	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update SOP Questions
        <small>Preview</small>
      </h1>
     <!--  <ol class="breadcrumb">
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
              <h3 class="box-title">SOP Questions</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php if($this->session->flashdata('message')){?>
                                        <!-- <div class="col-sm-3 text-center"> -->
                                            <div id="hides" class="col-sm-12">

                                            <?php echo $this->session->flashdata('message');?>
                                            </div>
                                        <!-- </div> -->

          <?php  }   ?>

            <form role="form" method="post" action="<?php echo base_url('sop_update');?>">
              <div class="box-body">
                <div class="form-group col-md-10 col-sm-12">
                  <?php foreach ($ques as $key => $val) {  ?>
                    <label style="color: red;"><?php echo "Ques ".$val['q_id'].". " ; ?></label>
                    <textarea class="form-control" style="font-size: 16px; margin-bottom: 30px;" name="<?php echo $val['q_id'] ?>"><?php echo $val['question'] ?></textarea>
                 
                 <?php } ?>
                 
                </div>
               <br/>
              <div class="box-footer col-md-6 col-sm-6">
                <button type="submit" class="btn btn-primary">Update Questions</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
     
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
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->
