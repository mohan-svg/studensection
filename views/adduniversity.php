<?php    
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
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
            <h3 class="box-title">Formfsdaf </h3>
          </div>
          <?php echo form_open_multipart('insertuni');?>
            <div class="box-body">
              
            

              <div class="row">
                <div class="col-md-4">

                  <div class="form-group">

                    <i class="pe-7s-user"></i>

                   <input type="hidden" class="form-control" name="university_id">

                    <label>Student Name</label>
                    <select id="example-getting-started" class="form-control" name="stud_id">
                     <option value="0">Please select student</option>

                                        <?php
                      foreach($stud as $key => $val){ ?>
                    <option value="<?php echo $val['stud_id']; ?>" >
                    <?php echo $val['firstname']. "  ".$val['lastname']; ?></option>

                    <?php }
                      ?>        
                </select>

                  </div>   
                 </div>
                 <div class="col-md-4">
                     <div class="form-group">
                      <i class="pe-7s-culture"></i>
                      <label>University Name</label>
                      <select class="form-control" name="university_name" >

                      <?php
  foreach($uni as $key => $val){ ?>
<option value="<?php echo $val['u_name']; ?>" >
 <?php echo $val['u_name']; ?></option>

 <?php }
  ?>
                                             </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <i class="pe-7s-id"></i>
                      <label>Course Name</label>
                      <input type="text" class="form-control" placeholder="Course Name"  name="course_name">
                      </div>
                    </div>
                  </div>
                 
                <hr>
                <h4 class="title">Recommendation</h4>
            <br>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <i class="pe-7s-user"></i>
                        <label>Recommendation Name</label>
                        <input type="text" class="form-control" name="lor1_name" placeholder="Recommendation Name" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <i class="pe-7s-id"></i>
                          <label>Recommendation ID</label>
                          <input type="text" class="form-control" name="lor1_emailid" placeholder="Recommendation ID" >
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <i class="pe-7s-graph3"></i>
                            <label>Status</label>
                            <select class="form-control" name="lor1_status" >
                              <option value="Submitted">Submitted</option>
                              <option value="Not Submitted">Not Submitted</option>
                              <option value="Not Required">Not Required</option>
                              <option value="Waived">Waived</option>
                            </select>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <i class="pe-7s-user"></i>
                              <label>Recommendation Name</label>
                              <input type="text" class="form-control" name="lor2_name" placeholder="Recommendation Name" >
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <i class="pe-7s-id"></i>
                              <label>Recommendation ID</label>
                              <input type="text" class="form-control" name="lor2_emailid" placeholder="Recommendation ID" >
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <i class="pe-7s-graph3"></i>
                                <label>Status</label>
                                <select class="form-control" name="lor2_status" >
                                  <option value="Submitted">Submitted</option>
                                  <option value="Not Submitted">Not Submitted</option>
                                  <option value="Not Required">Not Required</option>
                                  <option value="Waived">Waived</option>
                                </select>
                              </div>
                             </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <i class="pe-7s-user"></i>
                                  <label>Recommendation Name</label>
                                  <input type="text" class="form-control" name="lor3_name" placeholder="Recommendation Name" >
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <i class="pe-7s-id"></i>
                                  <label>Recommendation ID</label>
                                  <input type="text" class="form-control" name="lor3_emailid" placeholder="Recommendation ID">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <i class="pe-7s-graph3"></i>
                                  <label>Status</label>
                                  <select class="form-control" name="lor3_status">
                                   <option value="Submitted">Submitted</option>
                                   <option value="Not Submitted">Not Submitted</option>
                                   <option value="Not Required">Not Required</option>
                                   <option value="Waived">Waived</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                                  <hr>
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <i class="pe-7s-id"></i>
                                  <label>University Code</label>
                                  <input type="text" class="form-control" placeholder="For Score Sending" name="etuniversity_code">
                                  </div>
                                </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <i class="pe-7s-note2"></i>
                                  <label>Entrance Test</label>
                                  <select class="form-control" name="et_name">
                                    <option value="GRE">GRE</option>
                                    <option value="GMAT">GMAT</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Official Score</label>
                                  <select class="form-control" name="et_ostatus">
                                    <option value="Sent">Sent</option>
                                    <option value="Not Required">Not Required</option>
                                    <option value="Pending">Pending</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Unofficial Score</label>
                                  <select class="form-control" name="et_unostatus">
                                    <option value="Sent">Sent</option>
                                    <option value="Not Required">Not Required</option>
                                    <option value="Pending">Pending</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <i class="pe-7s-id"></i>
                                  <label>University Code</label>
                                  <input type="text" class="form-control" placeholder="For Score Sending" name="epuniversity_code">
                                </div>
                               </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <i class="pe-7s-note2"></i>
                                    <label>English Proficiency Test</label>
                                    <select class="form-control" name="ep_name">
                                      <option value="TOEFL">TOEFL</option>
                                      <option value="IELTS">IELTS</option>
                                    </select>
                                 </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Official Score</label>
                                    <select class="form-control" name="ep_ostatus">
                                      <option value="Sent">Sent</option>
                                      <option value="Not Required">Not Required</option>
                                      <option value="Pending">Pending</option>
                                    </select>
                                  </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Unofficial Score</label>
                                      <select class="form-control" name="ep_unostatus" >
                                        <option value="Sent">Sent</option>
                                        <option value="Not Required">Not Required</option>
                                        <option value="Pending">Pending</option>
                                      </select>
                                  </div>
                                 </div>
                              </div>
                                        <hr>
                              <div class="row">
                                   <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Official Transcript</label>
                                        <select class="form-control" name="tofficial_status" >
                                          <option value="Uploaded">Uploaded</option>
                                          <option value="Required">Required</option>
                                          <option value="Not Required">Not Required</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Unofficial Transcript</label>
                                        <select class="form-control" name="tunofficial_status" >
                                          <option value="Uploaded">Uploaded</option>
                                          <option value="Required">Required</option>
                                          <option value="Not Required">Not Required</option>
                                        </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <i class="pe-7s-file"></i>
                                        <label>Resume</label>
                                        <select class="form-control" name="r_status" >
                                          <option value="Uploaded">Uploaded</option>
                                          <option value="Not Uploaded">Not Uploaded</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>SOP</label>
                                        <select class="form-control" name="sop_status" >
                                          <option value="Uploaded">Uploaded</option>
                                          <option value="Not Uploaded">Not Uploaded</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                          <hr>
                                <div class="row">
                                  <div class="col-md-4">
                                     <div class="form-group">
                                      <label>Passport</label>
                                      <select class="form-control" name="passport_status" >
                                        <option value="Uploaded">Uploaded</option>
                                        <option value="Not Uploaded">Not Uploaded</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Provisional Degree</label>
                                    <select class="form-control" name="pdegree_status" >
                                      <option value="Uploaded">Uploaded</option>
                                      <option value="Not Uploaded">Not Uploaded</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Degree Certificate</label>
                                    <select class="form-control" name="certificate_status" >
                                      <option value="Uploaded">Uploaded</option>
                                      <option value="Not Uploaded">Not Uploaded</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                                            <hr>
                         <h4 class="title">Application Fees</h4>
                                              <br>
                              <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Status</label>
                                      <select class="form-control" name="fees_status" >
                                        <option value="Paid">Paid</option>
                                        <option value="Not Paid">Not Paid</option>
                                        <option value="Free">Free</option>
                                        <option value="Waiver">Waiver</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Paid By</label>
                                      <input type="text" class="form-control" placeholder="Paid By" name="paidby">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Amount</label>
                                      <input type="text" class="form-control" placeholder="Amount" name="amount">
                                      </div>
                                    </div>
                                  </div>
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Decision</label>
                                      <select class="form-control" name="decision" >
                                        <option value="Admit">Admit</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Insufficient Documents">Insufficient Documents</option>
                                        <option value="Under Graduate Committee Review">Under Graduate Committee Review</option>
                                        <option value="Application Submitted">Application Submitted</option>
                                        <option selected="selected" value="In Submission Process">In Submission Process</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                                <hr>
                            <h4 class="title">Financial Document</h4>
                            <br>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Bank Statement</label>
                                    <select class="form-control" name="bstatement" >
                                      <option value="Uploaded">Uploaded</option>
                                      <option selected="selected" value="Not Uploaded">Not Uploaded</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Pre Sanction Letter</label>
                                    <select class="form-control" name="pre_status" >
                                      <option value="Uploaded">Uploaded</option>
                                      <option selected="selected" value="Not Uploaded">Not Uploaded</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                          <hr>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>I20 Status</label>
                                  <select class="form-control" name="i20_status" >
                                    <option value="Dispatched">Dispatched</option>
                                    <option selected="selected" value="Not Dispatched">Not Dispatched</option>
                                    <option value="Received">Received</option>
                                  </select>
                                </div>
                              </div>
                               <div class="col-md-6">
                                <div class="form-group">
                                  <label>Upload Fees Receipt</label>
                                   <input type="file" class="form-control" id="Filename" name="reciept_pic" value="$Filename" >
                                   <!-- <img id="myImg" src="#" alt="your image" /> -->
                                 </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right" name="uni_submit">Submit</button>
                            <div class="clearfix"></div>
                          </form>
                        </div>
                      </div>
                      </div>
                    </div>
        </div>
      </div>
    </div>

</section>