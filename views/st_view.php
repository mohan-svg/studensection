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

    .ft-size{

        font-size: 20px;
        margin-bottom: 7px;
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
      opacity: 0.99;
    }
     
    .pad{

        padding: 20px!important ;
      }

      .ft-size{

        font-size: 32px;
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


/*University status*/

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

li {
  display: inline;
}

table>tbody>tr>th{
    background-color: #2f3562!important:
    color:white; 
    border: 1px solid #3e4095 !important;
}

table>tbody>tr>th{


}

table>tbody>tr>td{
  border: 1px solid #3e4095 !important;
}

.th_color{
  background-color:#2f3562; 
  color: white;
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
                <div class="col-md-1"> </div>
          
            <!-- <div class="box-body"> -->
                  <div class="col-md-10 col-sm-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="ft-size" style="text-align: center; font-weight: bold;"> Application Status</div>
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
                      <div class="box-footer no-padding pad">
                        <!-- <ul class="nav nav-stacked">
                          <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                          <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                          <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                          <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                        </ul> -->
                        <br ><br >

                <?php foreach($university as $key => $data){   ?>
                        
                              <div class="box box-warning box-solid collapsed-box">
                                <div class="box-header with-border">
                                  <h3 class="box-title" data-widget="collapse"><i class="fa fa-bank"></i> &nbsp;<?php echo ucwords($data['university_name']); ?></h3>

                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>

                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: none; overflow: scroll; background-color:#e5e5e5;">

                                  <p> Student can notify us for any change in status any of the fields                                    
                                    <a class="btn btn-primary action-button" role="button" data-toggle="modal" data-target="#smsModal<?php echo ucwords($data['university_id']); ?>">Send Message</a><br>
                                       <section id="conversation" class="modal-blue"> 
                                        <div class="container"> 
                                          <div id="myButton"></div>
                                        </div>
                                      </section>
                                   </p>
                                   <hr/>
                                   <span style="margin-bottom: 15px; font-size: 16px; font-weight: bold;">Course Name: <?php echo ucwords($data['course_name']); ?></span> <br/><br/>
                                   
                                   <!--original code starts here-->

                                    <div class="row">
                                                                        <table class="table table-responsive" style="font-size: 16px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="th_color">Recommendation Name</th>
                                                                                    <th class="th_color">Recommendation ID</th>
                                                                                    <th class="th_color">Recommendation Status</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo ucwords($data['lor1_name']); ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $data['lor1_emailid']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php 
                        if ($data['lor1_status']=='Submitted') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  ucwords($data['lor1_status']); }

                         elseif($data['lor1_status']=='Not Submitted') {
                            ?>
                                                                                                <i class="fa fa-times-circle" style="color:red"></i>
                                                                                                <?php echo ucwords($data['lor1_status']); }

                         elseif($data['lor1_status']=='Waived') {
                            ?>
                                                                                                    <i class="fa fa-check-circle" style="color:orange"></i>
                                                                                                    <?php echo ucwords($data['lor1_status']); }

                         else{
                            ?>
                                                                                                        <i class="fa fa-ban" style="color:red"></i>
                                                                                                        <?php echo  ucwords($data['lor1_status']); } 
                        ?>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo ucwords($data['lor2_name']); ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $data['lor2_emailid']; ?>
                                                                                    </td>

                                                                                    <td>
                                                                                        <?php 
                        if ($data['lor2_status']=='Submitted') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  ucwords($data['lor2_status']); }

                         elseif($data['lor2_status']=='Not Submitted') {
                            ?>
                                                                                                <i class="fa fa-times-circle" style="color:red"></i>
                                                                                                <?php echo  ucwords($data['lor2_status']); }

                         elseif($data['lor2_status']=='Waived') {
                            ?>
                                                                                                    <i class="fa fa-check-circle" style="color:orange"></i>
                                                                                                    <?php echo  ucwords($data['lor2_status']); }

                         else{
                            ?>
                                                                                                        <i class="fa fa-ban" style="color:red"></i>
                                                                                                        <?php echo  ucwords($data['lor2_status']); } 
                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo ucwords($data['lor3_name']); ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $data['lor3_emailid']; ?>
                                                                                    </td>

                                                                                    <td>
                                                                                        <?php 
                        if ($data['lor3_status']=='Submitted') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  ucwords($data['lor3_status']); }

                         elseif($data['lor3_status']=='Not Submitted') {
                            ?>
                                                                                                <i class="fa fa-times-circle" style="color:red"></i>
                                                                                                <?php echo  ucwords($data['lor3_status']); }

                         elseif($data['lor3_status']=='Waived') {
                            ?>
                                                                                                    <i class="fa fa-check-circle" style="color:orange"></i>
                                                                                                    <?php echo  ucwords($data['lor3_status']); }

                         else{
                            ?>
                                                                                                        <i class="fa fa-ban" style="color:red"></i>
                                                                                                        <?php echo  ucwords($data['lor3_status']); } 
                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                        <table class="table table-responsive">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="th_color">Entrance Test</th>
                                                                                    <th class="th_color">University Code</th>
                                                                                    <th class="th_color">Official Status</th>
                                                                                    <th class="th_color">Unofficial Status</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo strtoupper($data['et_name']); ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $data['etuniversity_code']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['et_ostatus']=='Sent') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  $data['et_ostatus']; }

                         elseif($data['et_ostatus']=='Not Required') {
                            ?>
                                                                                                <i class="fa fa-ban" style="color:red"></i>
                                                                                                <?php echo  $data['et_ostatus']; }

                        else{
                            ?>
                                                                                                    <i class="fa fa-exclamation-circle" style="color:orange"></i>
                                                                                                    <?php echo  $data['et_ostatus']; } 
                        ?>
                                                                                    </td>

                                                                                    <td>

                                                                                        <?php
                        if ($data['et_unostatus']=='Sent') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  $data['et_unostatus']; }

                         elseif($data['et_unostatus']=='Not Required') {
                            ?>
                                                                                                <i class="fa fa-ban" style="color:red"></i>
                                                                                                <?php echo  $data['et_unostatus']; }

                         else{
                            ?>
                                                                                                    <i class="fa fa-exclamation-circle" style="color:orange"></i>
                                                                                                    <?php echo  $data['et_unostatus']; } 
                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo strtoupper($data['ep_name']); ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $data['epuniversity_code']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['ep_ostatus']=='Sent') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  $data['ep_ostatus']; }

                         elseif($data['ep_ostatus']=='Not Required') {
                            ?>
                                                                                                <i class="fa fa-ban" style="color:red"></i>
                                                                                                <?php echo  $data['ep_ostatus']; }

                        else{
                            ?>
                                                                                                    <i class="fa fa-exclamation-circle" style="color:orange"></i>
                                                                                                    <?php echo  $data['ep_ostatus']; } 
                        ?>
                                                                                    </td>

                                                                                    <td>

                                                                                        <?php
                        if ($data['ep_unostatus']=='Sent') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  $data['ep_unostatus']; }

                         elseif($data['ep_unostatus']=='Not Required') {
                            ?>
                                                                                                <i class="fa fa-ban" style="color:red"></i>
                                                                                                <?php echo  $data['ep_unostatus']; }

                         else{
                            ?>
                                                                                                    <i class="fa fa-exclamation-circle" style="color:orange"></i>
                                                                                                    <?php echo  $data['ep_unostatus']; } 
                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                        <table class="table table-responsive">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="th_color">Resume</th>
                                                                                    <th class="th_color">SOP</th>
                                                                                    <th class="th_color">Official Transcript</th>
                                                                                    <th class="th_color">Unofficial Transcript</th>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <?php
                        if ($data['r_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['r_status']; }

                         else{
                            ?>
                                                                                                <i class="fa fa-file-text" style="color: red"></i>
                                                                                                <?php echo  $data['r_status']; }
                          ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['sop_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['sop_status']; }

                         else{
                            ?>
                                                                                                <i class="fa fa-file-text" style="color: red"></i>
                                                                                                <?php echo  $data['sop_status']; }
                          ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['tofficial_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['tofficial_status']; }

                         elseif($data['tofficial_status']=='Not Required') {
                            ?>
                                                                                                <i class="fa fa-ban" style="color:red"></i>
                                                                                                <?php echo  $data['tofficial_status']; }

                         else{
                            ?>
                                                                                                    <i class="fa fa-check-circle" style="color:red"></i>
                                                                                                    <?php echo  $data['tofficial_status']; } 
                        ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['tunofficial_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['tunofficial_status']; }

                         elseif($data['tunofficial_status']=='Not Required') {
                            ?>
                                                                                                <i class="fa fa-ban" style="color:red"></i>
                                                                                                <?php echo  $data['tunofficial_status']; }

                         else{
                            ?>
                                                                                                    <i class="fa fa-check-circle" style="color:red"></i>
                                                                                                    <?php echo  $data['tunofficial_status']; } 
                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="table table-responsive">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="th_color">Passport</th>
                                                                                    <th class="th_color">Provisional Degree</th>
                                                                                    <th class="th_color">Degree Certificate</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php
                        if ($data['passport_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['passport_status']; }

                         else{
                            ?>
                                                                                                <i class="fa fa-file-text" style="color: red"></i>
                                                                                                <?php echo  $data['passport_status']; }
                          ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['pdegree_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['pdegree_status']; }

                         else{
                            ?>
                                                                                                <i class="fa fa-file-text" style="color: red"></i>
                                                                                                <?php echo  $data['pdegree_status']; }
                          ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['certificate_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['certificate_status']; }

                         else{
                            ?>
                                                                                                <i class="fa fa-file-text" style="color: red"></i>
                                                                                                <?php echo  $data['certificate_status']; }
                          ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                        <table class="table table-responsive">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="th_color">Application Fees</th>
                                                                                    <th class="th_color">Paid By</th>
                                                                                    <th class="th_color">Amount</th>
                                                                                    <th class="th_color">Download Receipt</th>
                                                                                    <th class="th_color">Decision</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php 
                        if ($data['fees_status']=='Paid') {
                            ?>
                                                                                            <i class="fa fa-check-circle" style="color:green"></i>
                                                                                            <?php echo  ucwords($data['fees_status']); }

                         elseif($data['fees_status']=='Not Paid') {
                            ?>
                                                                                                <i class="fa fa-times-circle" style="color:red"></i>
                                                                                                <?php echo ucwords($data['fees_status']); }

                         elseif($data['fees_status']=='Free') {
                            ?>
                                                                                                    <i class="fa fa-check-circle" style="color:orange"></i>
                                                                                                    <?php echo ucwords($data['fees_status']); }

                         else{
                            ?>
                                                                                                        <i class="fa fa-check-circle" style="color:orange"></i>
                                                                                                        <?php echo  ucwords($data['fees_status']); } 
                        ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo ucwords($data['paidby']); ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo ucwords($data['amount']); ?>
                                                                                    </td>
                                                                                    <?php 
                          if ($data['Filename']==true) {
                        ?>
                                                                                        <td><a href="<?php echo base_url()?>/reciept/<?php echo $data['Filename'];?>" download="<?php echo $data['Filename'];?>">Download</a></td>
                                                                                        <?php  
                            }
                            else{
                              echo "<td>No Receipt Uploaded</td>";
                            }

                        ?>

                                                                                            <td>
                                                                                                <?php 
                        if ($data['decision']=='Admit') {
                            ?>
                                                                                                    <i class="fa fa-check-double" style="color:green"></i>
                                                                                                    <?php echo  ucwords($data['decision']); }

                         elseif($data['decision']=='Rejeted') {
                            ?>
                                                                                                        <i class="fa fa-times-circle" style="color:red"></i>
                                                                                                        <?php echo ucwords($data['decision']); }

                         elseif($data['decision']=='Insufficient Documents') {
                            ?>
                                                                                                            <i class="fa fa-exclamation-circle" style="color:orange"></i>
                                                                                                            <?php echo ucwords($data['decision']); }

                         else{
                            ?>
                                                                                                                <i class="fa fa-search" style="color:green"></i>
                                                                                                                <?php echo  ucwords($data['decision']); } 
                        ?>
                                                                                            </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="table table-responsive">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="th_color">Bank Statement</th>
                                                                                    <th class="th_color">Pre Sanction Letter</th>
                                                                                    <th class="th_color">I20 Status</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php
                        if ($data['bstatement']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['bstatement']; }

                         else{
                            ?>
                                                                                                <i class="fa fa-file-text" style="color: red"></i>
                                                                                                <?php echo  $data['bstatement']; }
                          ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['pre_status']=='Uploaded') {
                            ?>
                                                                                            <i class="fa fa-file-text" style="color: green"></i>
                                                                                            <?php echo  $data['pre_status']; }

                         else{
                            ?>
                                                                                                <i class="fa fa-file-text" style="color: red"></i>
                                                                                                <?php echo  $data['pre_status']; }
                          ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                        if ($data['i20_status']=='Dispatched') {
                            ?>
                                                                                            <i class="fa fa-arrow-circle-right" style="color: green"></i>
                                                                                            <?php echo  $data['i20_status']; }

                         elseif($data['i20_status']=='Received') {
                            ?>
                                                                                                <i class="fa fa-arrow-circle-down" style="color: green"></i>
                                                                                                <?php echo  $data['i20_status']; }

                         else{
                            ?>
                                                                                                    <i class="fa fa-arrow-circle-right" style="color: red"></i>
                                                                                                    <?php echo  $data['i20_status']; } 
                        ?>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div><!--row-->

                                   <!--original Code Ends here-->

                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->



                           
                              <!-- Code for Modal  -->
                                    <div id="smsModal<?php echo ucwords($data['university_id']); ?>" class="modal fade services-modal-6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <button type="button" class="close" data-dismiss="modal">&times;X</button>
                                            <div class="modal-content">
                                                <div class="modal-body modal-blue">
                                                    <h3 class="modal-btn-red">Message Box</h3>
                                                    <br>
                                                    <h4 class="text-left" style="font-weight: bold;">Enter Your Query Below:</h4>
                                                    <br>
                                                    <?php echo form_open_multipart('querry');?>
                                                        <div class="form-group">

                                                            <input type="text" class="form-control" placeholder="Enter Your Query here" name="message" required="">
                                                            <input type="hidden" class="form-control" placeholder="Email Id for communication" name="email" required="" value="<?php echo $student[0]['email_id']; ?>">
                                                            <input type="hidden" class="form-control" placeholder="Student Name" name="sname" required="" value=" <?php echo $student[0]['firstname']. " ".$student[0]['lastname']; ?>">
                                                            <input type="hidden" class="form-control" placeholder="University Name" name="uname" required="" value=" <?php echo $data['university_name'] ?>">
                                                            <br>

                                                            <input type="submit" name="submit" value="Submit" class="btn btn-danger"> <button class="btn btn-danger close mod-c pull-right" data-dismiss="modal">Close</button>
                                                        </div>
                                                        
                                                        </form>

                                                        <!-- <a data-dismiss="modal" class="mod-c"><strong>Close</strong></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Code end Here -->
                                                   
                            <?php }// foreach() ?>

                
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

