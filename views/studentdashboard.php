<?php    
// if(!$this->session->userdata('username') != '') {
// $this->session->set_flashdata('msg', "You need to be logged in to access the page.");
// redirect('Student');
// }

?>

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

      .foter{
      margin-top: 40px; 
    }


  }

  @media screen and (min-width:750px)
  {
    .foter{
      margin-top: 150px; 
    }

    body{

        background-image: url('assets/images/index.jpg');
      }

     .box-widget{
      opacity: 0.85;
    }
     
    }
   

   .box.box-solid.box-warning>.box-header {
        color: #fff;
        background: #c4171d !important;
        background-color: #c4171d !important;
        border-color: #c4171d;
    }


    .bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
        background-color: #5f6a6a !important;
    }
.ftsize{
  font-size: 17px;
}


</style>
<body>

<div style="background-color: #2f3562; padding: 10px; padding-left: 46px;"><img src="<?php echo base_url('images/200x84.png')?>"></div>
    
  <section class="content">

    <div class="row">
      <div class="col-md-3 col-sm-12"> </div>
     <!--  <div class="col-md-12"> -->
        <!-- <div class="box box-primary"> -->
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
       
          
            <!-- <div class="box-body"> -->
                  <div class="col-md-6 col-sm-12">
                    <!-- Widget: user widget style 1 -->
                    <div style="text-align: center; font-size: 32px; font-weight: bold;">Student-Dashboard</div>
                    <div class="box box-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-yellow">
                        <div class="widget-user-image">
                         <!--  <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar"> -->

                        </div>
                        <!-- /.widget-user-image -->
                        <h2 class="widget-user-username" style="font-weight: bold"><?php echo $this->session->userdata('sname'); ?></h2>
                        <h4 class="widget-user-desc"><?php echo $this->session->userdata('username'); ?></h4>

                        <div class="pull-right" style="margin-top: -20px"><a href="<?php echo base_url('slogout'); ?>" class="btn btn-success">Sign Out</a></div>
                      </div>
                      <div class="box-footer no-padding">
                       
                        <br ><br ><br >

                        <div class="col-md-12 text-center"> <h2>Blog</h2> </div>
                            <div class="col-md-10 col-sm-12">
                              <div class="box box-warning box-solid collapsed-box">
                                <div class="box-header with-border">
                                  <h3 class="box-title"><i class="fa fa-commenting"></i> &nbsp;Blog Posts</h3>

                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: none;">
                                  <i class="ftsize">View blog post by Shah Overseas <br/>(Please use this portal credentials to loginto view blog)</i><br/><br/>
                                  <a href="https://www.shahgre.com/myblog" class="btn btn-info" target="_blank">View Blog</a>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div><!--class="col-md-6 col-sm-12"-->

                      <?php if($student_status[0]['consultancy']=='active'){ ?>
                          <div class="col-md-12 text-center"> <h2>Consultancy</h2> </div>
                            <div class="col-md-10 col-sm-12">
                              <div class="box box-warning box-solid collapsed-box">
                                <div class="box-header with-border">
                                  <h3 class="box-title"><i class="fa fa-bank"></i> &nbsp;University Application Status</h3>

                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: none;">
                                  <i class="ftsize">Student, you are just one click away to check your application status!</i><br/><br/>
                                  <a href="<?php echo base_url('sview'); ?>" class="btn btn-info">Application Status </a>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div><!--class="col-md-6 col-sm-12"-->

                         
                            <div class="col-md-10 col-sm-12">
                              <div class="box box-warning box-solid collapsed-box">
                                <div class="box-header with-border">
                                  <h3 class="box-title"><i class="fa fa-file-text"></i> &nbsp;Upload Your Document</h3>

                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: none;">
                                  <i class="ftsize">Hi Student, Please upload your pending document here!</i><br/><br/>
                                  <a href="<?php if($this->session->userdata('upd_status')=='true'){ 
                                              echo base_url('view_doc'); 
                                            } else{
                                              echo base_url('upload'); 
                                            }  ?>" class="btn btn-info">Upload Documents</a>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div><!--class="col-md-6 col-sm-12"-->

                            <?php 
                              $td=$this->session->userdata('id');
                            ?>

                            <div class="col-md-10 col-sm-12">
                              <div class="box box-warning box-solid collapsed-box">
                                <div class="box-header with-border">
                                  <h3 class="box-title"><i class="fa fa-drupal"></i> &nbsp;Student Assistant Veronica</h3>

                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: none;">
                                  <i class="ftsize">Need Help, Veronica will resolve your query </i><br/><i class="ftsize">Use our Student Assistant Veronica</i><br/><br/>
                                  <!-- <a href="<?php echo base_url(); ?>" class="btn btn-info">Ask Veronica</a> -->
                                  <a href="https://www.shahgre.com/chat-bot/index?ssf=<?php echo $td ?>" class="btn btn-info">Ask Veronica</a>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div><!--class="col-md-6 col-sm-12"-->
                            <br/>
                        <?php } // if($student_status[0]['consultancy']=='active')

                        if($student_status[0]['gre_coaching_status']=='active') { ?>


                           <div class="col-md-12 text-center"> <h2>GRE - Coaching</h2> </div>
                            
                            <div class="col-md-10 col-sm-12">
                              <div class="box box-warning box-solid collapsed-box">
                                <div class="box-header with-border">
                                  <h3 class="box-title"><i class="fa fa-desktop"></i> &nbsp;GRE: Full Length Mock Test</h3>

                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: none;">
                                  <i class="ftsize">Want Good GRE Score, Practise with our 18 GRE Full Length Mock Test </i><br/><br/>
                                  
                                  <a href="<?php echo site_url('gre_test'); ?>" class="btn btn-info">Take Test</a>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div><!--class="col-md-6 col-sm-12"-->

                            <div class="col-md-10 col-sm-12">
                              <div class="box box-warning box-solid collapsed-box">
                                <div class="box-header with-border">
                                  <h3 class="box-title"><i class="fa fa-television"></i> &nbsp;GRE: Topic Wise Mock Test</h3>

                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: none;">
                                  <i class="ftsize">Practise with our GRE Topic Wise Mock Test and get prepared with every topic </i><br/><br/>
                                  <!-- <a href="<?php echo base_url(); ?>" class="btn btn-info">Ask Veronica</a> -->
                                  <a href="<?php echo site_url('gre_topic'); ?>" class="btn btn-info">Take Test</a>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div><!--class="col-md-6 col-sm-12"-->

                          <?php } //$student_status[0]['gre_coaching_status']=='active' ?>

                          <?php
                              if($student_status[0]['gre_coaching_status']=='inactive' && $student_status[0]['consultancy']=='inactive') {
                           ?>     
                            <div class="col-md-12 text-center"> <h2><i class="fa fa-warning " style="color: red;"></i>&nbsp;No Service is active in your account</h2> </div>
                         <?php  } ?>
                
                      </div>
                    </div>
                    <!-- /.widget-user -->

                  </div>

        <!-- </div> --><!--box-body-->
        <!-- </div> --><!--box box-primary-->
        <!-- </div> --><!--col-md-12-->
      </div><!--row-->
  
</section>
  <footer class="foter">
        <div class="text-center">
          <b>Version</b> 2.4.0
        </div><br/>
        <div class="text-center"><strong>Copyright &copy; 2018-2019 <a href="">SHAH OVERSEAS</a>.</strong> All rights
        reserved.</div>
</footer>

