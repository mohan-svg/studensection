<?php    
// if(!$this->session->userdata('username') != '') {
// $this->session->set_flashdata('msg', "You need to be logged in to access the page.");
// redirect('Admin');
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
  }
</style>

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
            <h3 class="box-title">View Uploaded Documents</h3>
            <br/><br/>
            
          </div>
          <div class="box-header with-border">
         
            <label>Instructions:</label>
            <ul>
              <li>You can now update or view your uploaded documents.</li>
              <li>Also you can upload new document if not uploaded earlier using <button class="btn btn-success">update</button> option</li>
              <li><button class="btn btn-danger">view</button> button specifies that document is not uploaded</li>
            </ul>
          </div>
          
            <div class="box-body">
              <form method="post" action="<?php echo site_url('upload_documents');?>" enctype="multipart/form-data">
            <!--  <hr>
                <h4 class="title">View Uploaded Documents:</h4>
            <br>
            <hr> -->

            <?php if($docs=='no_data'){

              echo "<h3> No Document Uploaded </h3";

            } else{

            foreach ($docs as $key => $val) {
                # code...
              
           
            ?>

             <div class="row padss">
                <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Passport</label>
                        <span class="col-md-4 col-sm-12 col-xs-12">

                          <?php if($val['passport']!='no_file'){ 
                            ?>
                             <a class="btn btn-info btn pads" href="<?php echo base_url('docs_uploaded/'.$val['passport']) ?>" target="_blank" >View</a>
                           <?php } 

                           else{
                              echo "<i>Not uploaded</i>";

                           }?>

                         <a class="btn btn-success pads " href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="passport" doct="_passport" >Update</a>
                       </span>
                     
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">IELTS/TOEFL Scorecard</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['ielts_toefl']!='no_file'){ 
                        ?>
                        <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['ielts_toefl']) ?>" target="_blank" >View</a>    

                         <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>           
                 
                        <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="ielts_toefl" doct="_ielts_toefl_sc" target="_blank" >Update</a>
                      </span>
                       
                     </div>
                  </div>
                  <hr>
              
                <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Letter of Recommendation(LORs)</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['lor']!='no_file'){ 
                        ?>
                        <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['lor']) ?>" target="_blank" >View</a>

                         <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  
                        
                          <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="lor" doct="_lors" >Update</a>
                        </span>
                         
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Resume</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['resume']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['resume']) ?>" target="_blank" >View</a>

                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="resume" doct="_resume" >Update</a>
                     </span>
                       
                     </div>
                  </div>
                  <hr>
             
                <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Under Graduate Transcript</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['ug_transcript']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['ug_transcript']) ?>" target="_blank" >View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="ug_transcript" doct="_ug_transcript" >Update</a>
                     </span>
                       
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Under Graduate Marksheet</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['ug_marksheet']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['ug_marksheet']) ?>" target="_blank" >View</a>

                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="ug_marksheet" doct="_ug_marksheets" >Update</a>
                       </span>
                     </div>
                  </div>
                  <hr>
              
                <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Under Graduate Degree/Provisional Degree</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['ug_degree']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['ug_degree']) ?>" target="_blank" >View</a>

                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="ug_degree" doct="_ug_degree" >Update</a>
                     </span>
                       
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">GRE Scorecard</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['gre_scorecard']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['gre_scorecard']) ?>" target="_blank" >View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="gre_scorecard" doct="_gre_sc" >Update</a>
                     </span>
                       
                     </div>
                  </div>
                  <hr>
              
                <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Graduate Transcript</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['grad_transcript']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['grad_transcript']) ?>" target="_blank" >View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="grad_transcript" doct="_pg_transcript" >Update</a>
                     </span>
                       
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Graduate Marksheets</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['grad_marksheet']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['grad_marksheet']) ?>" target="_blank" >View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  
                       
                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="grad_marksheet" doct="_pg_marksheets" >Update</a>
                     </span>
                     </div>
                  </div>
                  <hr>
           
                <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Graduate Degree/Provisional Degree</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['grad_degree']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['grad_degree']) ?>" target="_blank">View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  
                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="grad_degree" doct="_pg_degree" >Update</a>
                     </span>
                       
                     </div>
                  </div>
                  <hr>
                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Diploma Transcripts</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['diploma_transcript']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['diploma_transcript']) ?>" target="_blank" >View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="diploma_transcript" doct="_diploma_transcript" >Update</a>
                     </span>
                       
                     </div>
                  </div>
                  <hr>
             
                <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Diploma Marksheets</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['diploma_marksheet']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['diploma_marksheet']) ?>" target="_blank" >View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  
                       
                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="diploma_marksheet" doct="diploma marksheet" >Update</a>
                     </span>
                       
                     </div>
                  </div>

                  <hr>
                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Diploma Certificate</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['diploma_certificate']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['diploma_certificate']) ?>" target="_blank">View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="diploma_certificate" doct="_diploma_certificate" >Update</a>
                     </span>
                       
                     </div>
                  </div>

                  <div class="col-md-12 col-sm-12 marg_bot">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Statement of Purpose (SOP)</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['sop']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['sop']) ?>" target="_blank">View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="sop" doct="_sop" >Update</a>
                     </span>
                       
                     </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label class="pads col-md-5 col-sm-12 col-xs-12">Miscellaneous Document (ex. thesis, research, etc.)</label>
                      <span class="col-md-4 col-sm-12 col-xs-12">
                        <?php if($val['miscellaneous']!='no_file'){ 
                        ?>
                       <a class="btn btn-info pads" href="<?php echo base_url('docs_uploaded/'.$val['miscellaneous']) ?>" target="_blank">View</a>
                        <?php } 

                       else{
                          echo "<i class='btn btn-danger pads'> View</i>";

                       }?>  

                       <a class="btn btn-success pads" href="" data-toggle="modal" data-target="#updateDocsModal" stdid="<?php echo $val['stud_id']; ?>" updname="miscellaneous" doct="_miscellaneous" >Update</a>
                     </span>
                       
                     </div>
                  </div>
              </div><!--row-->
<hr>
              <!-- <input type="submit" class="btn btn-info btn-fill" name='upload' value="Submit"> -->
              <div class="clearfix"></div>

            <?php }//foreach 
          } //else 

            ?>
            </form>
          </div><!--box-body-->
        </div><!--box box-primary-->
        </div><!--col-md-12-->
      </div><!--row-->


    
</section>
</div><!--content wrapper-->


<!-- Update Modal-->
<div class="modal fade" id="updateDocsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #f9e79f ; color: #2471a3;">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Update Document</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php $attributes = array('id' => 'updateForm'); echo form_open_multipart('updatefile',$attributes);?>
                  <div class="modal-body">
                   <h2 id="titles"></h2>
                    
                       <input name="updatefile" type="File" required="required">
                        <input name="studid" type="hidden" value="" class="form-control" required="required">
                        <input name="updfield" type="hidden" value=""  class="form-control" required="required">
                        <input name="docstype" type="hidden" value=""  class="form-control" required="required">

                  </div>  <!--modal body-->
                  <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Update">
                  </div> <!--modal footer-->
            </form>
        </div><!--"modal-content"-->
    </div><!--modal-dialog-->
</div>  <!--updateDocsModal-->                     
<!-- end Update modal -->

 <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/vendor/bootstrap.bundle.min.js'); ?>"></script>


<script>    
$('#updateDocsModal').on('show.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener=e.relatedTarget;//this holds the element who called the modal
   
   //we get details from attributes
 
  var id=$(opener).attr('stdid');
  var uvalue=$(opener).attr('updname');
  var dtype=$(opener).attr('doct');


//set what we got to our form
 $('#updateForm').find('[id="titles"]').val(dtype);
  $('#updateForm').find('[name="studid"]').val(id);
   $('#updateForm').find('[name="updfield"]').val(uvalue);
   $('#updateForm').find('[name="docstype"]').val(dtype);
   

   
});
</script>