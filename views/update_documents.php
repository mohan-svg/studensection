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
          <h3 class="box-title" style="text-align:center">Edit Details</h3>
        </div>
        <?php 
             
             foreach($universe as $key => $data)  
             {
          
 ?>
        <?php echo form_open_multipart('updateuni');?>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <i class="pe-7s-user"></i>
                <input type="hidden" name="university_id" value="<?php echo $data['university_id']; ?>" >
                <input type="hidden" name="stud_id" value="<?php echo $data['stud_id']; ?>" >
                <input type="hidden" name="university_name" value="<?php echo $data['university_name']; ?>" >
                <input type="hidden" name="file_name" value="<?php echo $data['Filename']; ?>" >
              <label>Student Name</label>
              <input type="text" class="form-control" name="student_name" value="<?php echo $data['student_name']; ?>" disabled  >
              </div>
            </div>
              <div class="col-md-4">
                <div class="form-group">
                  <i class="pe-7s-culture"></i>
                  <label>University Name</label>
                  <select class="form-control" name="university_name" disabled  >
                   <option value="<?php echo $data['university_name'];?>"><?php echo strtoupper($data['university_name']);?></option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <i class="pe-7s-id"></i>
                  <label>Course Name</label>
                  <input type="text" class="form-control" name="course_name" value="<?php echo strtoupper($data['course_name']); ?>"  >
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
                        <input type="text" class="form-control" name="lor1_name"value="<?php echo ucwords($data['lor1_name']); ?>"  >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <i class="pe-7s-id"></i>
                          <label>Recommendation ID</label>
                          <input type="text" class="form-control" name="lor1_emailid" value="<?php echo $data['lor1_emailid']; ?>"  >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <i class="pe-7s-graph3"></i>
                            <label>Status</label>
                            <select class="form-control" name="lor1_status"  >
                              <option value="<?php echo $data['lor1_status'];?>"><?php echo ucwords($data['lor1_status']);?></option>
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
                    <input type="text" class="form-control" name="lor2_name" value="<?php echo ucwords($data['lor2_name']); ?>"  >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <i class="pe-7s-id"></i>
                      <label>Recommendation ID</label>
                      <input type="text" class="form-control" name="lor2_emailid" value="<?php echo $data['lor2_emailid']; ?>"  >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <i class="pe-7s-graph3"></i>
                        <label>Status</label>
                        <select class="form-control" name="lor2_status"  >
                          <option value="<?php echo $data['lor2_status'];?>"><?php echo ucwords($data['lor2_status']);?></option>
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
                                <input type="text" class="form-control" name="lor3_name" value="<?php echo ucwords($data['lor3_name']); ?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <i class="pe-7s-id"></i>
                                <label>Recommendation ID</label>
                                <input type="text" class="form-control" name="lor3_emailid" value="<?php echo $data['lor3_emailid']; ?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <i class="pe-7s-graph3"></i>
                                <label>Status</label>
                                <select class="form-control" name="lor3_status">
                                   <option value="<?php echo $data['lor3_status'];?>"><?php echo ucwords($data['lor3_status']);?></option>
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
                                <input type="text" class="form-control" value="<?php echo $data['etuniversity_code'] ?>" name="etuniversity_code"  >
                                </div>
                              </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <i class="pe-7s-note2"></i>
                                <label>Entrance Test</label>
                                <select class="form-control" name="et_name"  >
                                  <option value="<?php echo $data['et_name'];?>"><?php echo strtoupper($data['et_name']);?></option>
                                  <option value="GRE">GRE</option>
                                    <option value="GMAT">GMAT</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Official Score</label>
                                <select class="form-control" name="et_ostatus"  >
                                   <option value="<?php echo $data['et_ostatus'];?>"><?php echo ucwords($data['et_ostatus']);?></option>
                                   <option value="Not Required">Not Required</option>
                                    <option value="Pending">Pending</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Unofficial Score</label>
                                <select class="form-control" name="et_unostatus"  >
                                  <option value="<?php echo ucwords($data['et_unostatus']);?>"><?php echo $data['et_unostatus'];?></option>
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
                                <input type="text" class="form-control" value="<?php echo $data['epuniversity_code'] ?>" name="epuniversity_code"  >
                              </div>
                             </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <i class="pe-7s-note2"></i>
                                  <label>English Proficiency Test</label>
                                  <select class="form-control" name="ep_name"  >
                                     <option value="<?php echo $data['ep_name'];?>"><?php echo strtoupper($data['ep_name']);?></option>
                                     <option value="TOEFL">TOEFL</option>
                                      <option value="IELTS">IELTS</option>
                                  </select>
                               </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Official Score</label>
                                  <select class="form-control" name="ep_ostatus"  >
                                     <option value="<?php echo $data['ep_ostatus'];?>"><?php echo ucwords($data['ep_ostatus']);?></option>
                                     <option value="Sent">Sent</option>
                                        <option value="Not Required">Not Required</option>
                                        <option value="pending">Pending</option>
                                  </select>
                                </div>
                              </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Unofficial Score</label>
                                    <select class="form-control" name="ep_unostatus"  >
                                       <option value="<?php echo $data['ep_unostatus'];?>"><?php echo ucwords($data['ep_unostatus']);?></option>
                                       <option value="Sent">Sent</option>
                                        <option value="Not Required">Not Required</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                               </div>
                            </div>
                                      <hr>
                          <div class="row">
                               <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Official Transcript</label>
                                    <select class="form-control" name="tofficial_status"  >
                                       <option value="<?php echo $data['tofficial_status'];?>"><?php echo ucwords($data['tofficial_status']);?></option>
                                       <option value="Sent">Sent</option>
                                        <option value="Not Required">Not Required</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Unofficial Transcript</label>
                                    <select class="form-control" name="tunofficial_status"  >
                                       <option value="<?php echo $data['tunofficial_status'];?>"><?php echo ucwords($data['tunofficial_status']);?></option>
                                       <option value="Uploaded">Uploaded</option>
                                        <option value="required">Required</option>
                                        <option value="Not Required">Not Required</option>
                                    </select>
                                   </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <i class="pe-7s-file"></i>
                                    <label>Resume</label>
                                    <select class="form-control" name="r_status"  >
                                      <option value="<?php echo $data['r_status'];?>"><?php echo ucwords($data['r_status']);?></option>
                                      <option value="Uploaded">Uploaded</option>
                                    <option value="Not Uploaded">Not Uploaded</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label>SOP</label>
                                    <select class="form-control" name="sop_status"  >
                                      <option value="<?php echo $data['sop_status'];?>"><?php echo ucwords($data['sop_status']);?></option>
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
                                  <select class="form-control" name="passport_status"  >
                                    <option value="<?php echo $data['passport_status'];?>"><?php echo ucwords($data['passport_status']);?></option>
                                    <option value="Uploaded">Uploaded</option>
                                    <option value="Not Uploaded">Not Uploaded</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Provisional Degree</label>
                                <select class="form-control" name="pdegree_status"  >
                                  <option value="<?php echo $data['pdegree_status'];?>"><?php echo ucwords($data['pdegree_status']);?></option>
                                  <option value="Uploaded">Uploaded</option>
                                    <option value="Not Uploaded">Not Uploaded</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Degree Certificate</label>
                                <select class="form-control" name="certificate_status"  >
                                  <option value="<?php echo $data['certificate_status'];?>"><?php echo ucwords($data['certificate_status']);?></option>
                                  <option value="Uploaded">Uploaded</option>
                                    <option value="Not Uploaded">Not Uploaded</option>
                                </select>
                              </div>
                            </div>
                          </div>
                     <h4 class="title">Application Fees</h4>
                                          <br>
                          <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select class="form-control" name="fees_status"  >
                                    <option value="<?php echo $data['fees_status'];?>"><?php echo ucwords($data['fees_status']);?></option>
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
                                  <input type="text" class="form-control" value="<?php echo $data['paidby'] ?>" name="paidby"  >
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Amount</label>
                                  <input type="text" class="form-control" value="<?php echo $data['amount'] ?>" name="amount"  >
                                  </div>
                                </div>
                              </div>
                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Decision</label>
                                  <select class="form-control" name="decision"  >
                                     <option value="<?php echo $data['decision'];?>"><?php echo ucwords($data['decision']);?></option>
                                     <option value="Admit">Admit</option>
                                     <option value="Rejected">Rejected</option>
                                      <option value="Insufficient Documents">Insufficient Documents</option>
                                      <option value="Under Graduate Committee Review">Under Graduate Committee Review</option>
                                      <option value="Application Submitted">Application Submitted</option>
                                        <option value="In Submission Process">In Submission Process</option>
                                </select>
                                </div>
                              </div>
                            </div>
                        <h4 class="title">Financial Document</h4>
                        <br>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Bank Statement</label>
                                <select class="form-control" name="bstatement"  >
                                   <option value="<?php echo $data['bstatement'];?>"><?php echo ucwords($data['bstatement']);?></option>
                                   <option value="Uploaded">Uploaded</option>
                                    <option value="Not Uploaded">Not Uploaded</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Pre Sanction Letter</label>
                                <select class="form-control" name="pre_status"  >
                                   <option value="<?php echo $data['pre_status'];?>"><?php echo ucwords($data['pre_status']);?></option>
                                   <option value="Uploaded">Uploaded</option>
                                    <option value="Not Uploaded">Not Uploaded</option>
                                </select>
                              </div>
                            </div>
                          </div>
                      <hr>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>I20 Status</label>
                              <select class="form-control" name="i20_status"  >
                                 <option value="<?php echo $data['i20_status'];?>"><?php echo ucwords($data['i20_status']);?></option>
                                <option value="Dispatch">Dispatched</option>
                                <option value="Not Dispatched">Not Dispatched</option>
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
                        <div class="col-md-6">
                              <div class="form-group">
                                
                                <?php
                                  if ($data['Filename']) {
                                ?>
                                <!-- <a href="<?php echo base_url('reciept/'.str_replace(' ', '_', $data['Filename'])) ?>" class="btn btn-success btn-lg" target="_blank" style="margin: 20px">View Fees Receipt</a> -->
                                <a href="<?php echo base_url('reciept/'.$data['Filename']) ?>" class="btn btn-success btn-lg" target="_blank" style="margin: 20px">View Fees Receipt</a>
                                <?php
                                  }
                                ?>
                              </div>
                        </div>
                         

<?php } ?>
<input type="submit" class="btn btn-primary" id="update" name="update" value="Save Changes">
       </div>
     </form>                
  </div>
</div>
</div>
</section>


</div>
