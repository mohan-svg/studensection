<?php    
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Student');
 }

$this->session->set_userdata('stude_id','21');
?>

<div class="content-wrapper">
    
  <section class="content">
    <div class="row">
      <div class="col-md-12">
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
            <h3 class="box-title">Upload Documents</h3>
            <br/><br/>
            <!-- <i>(Dear Student Please upload your all documents here for your University Applications)</i> -->
            <label>Instructions:</label>
            <ul>
              <li>Please Upload all available documents.</li>
              <li>You can later update or change documents if required</li>
            </ul>
          </div>
          
            <div class="box-body">
              <form method="post" action="<?php echo site_url('upload_documents');?>" enctype="multipart/form-data">
             <!-- <hr> -->
        <!--         <h4 class="title">Upload:</h4> -->
            <br>
            <hr>
             <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Passport</label>
                        
                       <input type="file" class="form-control" id="file_1" name="files[]" value="$Filename" >
                     
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>IELTS/TOEFL Scorecard</label>
                       <input type="file" class="form-control" id="file_2" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
              <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Letter of Recommendation(LORs)</label>
                       <input type="file" class="form-control" id="file_3" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Resume</label>
                       <input type="file" class="form-control" id="file_4" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
               <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Under Graduate Transcript</label>
                       <input type="file" class="form-control" id="file_5" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Under Graduate Marksheet</label>
                       <input type="file" class="form-control" id="file_6" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
               <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Under Graduate Degree/Provisional Degree</label>
                       <input type="file" class="form-control" id="file_7" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>GRE Scorecard</label>
                       <input type="file" class="form-control" id="file_8" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
              <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Graduate Transcript</label>
                       <input type="file" class="form-control" id="file_9" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Graduate Marksheets</label>
                       <input type="file" class="form-control" id="file_10" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
              <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Graduate Degree/Provisional Degree</label>
                       <input type="file" class="form-control" id="file_11" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Diploma Transcripts</label>
                       <input type="file" class="form-control" id="file_12" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
               <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Diploma Marksheets</label>
                       <input type="file" class="form-control" id="file_13" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Diploma Certificate</label>
                       <input type="file" class="form-control" id="file_14" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
              <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Statement of Purpose (SOP)</label>
                       <input type="file" class="form-control" id="file_15" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label>Miscellaneous Documents</label><small>(ex. thesis, research, etc.)</small>
                       <input type="file" class="form-control" id="file_16" name="files[]" value="$Filename" >
                       
                     </div>
                  </div>
              </div><!--row-->
              <input type="submit" class="btn btn-info btn-fill" name='upload' value="Submit">
              <div class="clearfix"></div>
            </form>
          </div><!--box-body-->
        </div><!--box box-primary-->
        </div><!--col-md-12-->
      </div><!--row-->
    
</section>
</div><!--content wrapper-->