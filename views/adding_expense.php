<?php
if(!$this->session->userdata('username') != '') {
$this->session->set_flashdata('msg', "You need to be logged in to access the page.");
redirect('Admin');
}
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <style type="text/css">
    @media (min-width: 768px){
      .modal-dialog {
          width: 900px;
          margin: 30px auto;
      }
    }
  </style>

  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary"><br>
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
              <h3 class="box-title">Add Expenses</h3>

            </div>
            <?php echo form_open_multipart('expense_insert');?>
              <div class="box-body">
                  <div class="row" id="dynamic_field">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Student Name: </label>
                        <select name="stud_id" class="form-control" required="Please Select Student">
                        	<option>--Select Student--</option>
                        	<?php foreach ($student as $key => $val) { ?>
                        	   	<option value="<?php echo $val['stud_id']; ?>"><?php echo $val['firstname']." ".$val['lastname']; ?></option>
                        	<?php  }
                        	?>
                        </select>

                        </div>
                      </div>
                     <div id="row">
                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Purpose: </label>
                        <input type="text" class="form-control" name="purpose[]" placeholder="ex. GRE Test Booking" required>

                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                        <label>Amount<i style="color: red;">($)</i>: </label>
                        <input type="text" class="form-control" name="usd[]" placeholder="ex. 60" id="dollars" oninput="currencyConverter(this.value)" onchange="currencyConverter(this.value)" required>

                        </div>
                      </div>
                      <div class="col-md-2">
                      <div class="form-group">
                        <label>Amount<i style="color: red;">(in Rupees)</i>: </label>
                        <input type="text" class="form-control" name="amount[]" placeholder="ex. 10000" id= "rupees" required>

                        </div>
                      </div>

                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Date: </label>
                        <input type="date" class="form-control" name="date[]" required>


                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Card Used: </label>
                          <select name="account[]" class="form-control">
                          	<option> -- Select Card Used for transaction--</option>
                          <?php foreach ($account as $key => $val) { ?>

                          	<option value="<?php echo $val['card_id'] ?>"><?php echo $val['card_name']."<br/> (".$val['card_no'].")" ?></option>
                          <?php 	}    ?>

                          </select>

                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Upload (Receipt/Screenshots)</label>
                          <input type="file" name="screens[]" class="form-control">
                        </div>

                      </div>

                      </div> <!--Id="row"-->
                      <div class="col-md-12">
                        <button type="button" name="add" id="add" class="btn btn-success">+ Add More</button>
                      </div>

                     </div>
                  </div>

               <div class="box-footer" style="text-align: center;" >

                <button type="submit" class="btn btn-info btn-fill" name="stu_submit">Submit</button>
                <div class="clearfix"></div>
              </div>
            </form>
          </div><!--box-->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Expense Account </h3>

            </div>

            <div class="box-body" style="overflow-x: scroll;">


              <table id="example1" class="table table-bordered">
                <thead>
                <tr style="background-color:  #424949 ; color: white;">
                  <th>Sr</th>
                  <th>Student Name</th>
                  <th>Purpose</th>
                  <th>Amount Paid<br/>($)</th>
                  <th>Amount Paid<br/>(Rs.)</th>
                  <th>Account</th>
                  <th>Card</th>
                  <th>Date<br/>(dd-mm-yyyy)</th>
                  <th>Account Balance(Rs.)</th>
                  <th>Receipt</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      foreach($expense as $key => $data)
                     {

                    ?>
                 <tr style="<?php echo $data['color']; ?>">
                        <td><?php echo $data['expense_id'];?></td>
                        <td><?php echo $data['firstname']." ".$data['lastname'] ;?></td>
                        <td><?php echo $data['expent_purpose']; ?></td>
                        <td><?php echo "$ ".number_format($data['amt_exp_dollars'],2); ?></td>
                        <td><?php echo "Rs. ".number_format($data['amount_expent'],2); ?></td>
                        <td><?php echo $data['account_name']."<br/>(".$data['account_no'] .")" ;?></td>
                        <td><?php echo $data['card_name']."<br/>(".$data['card_no'] .")" ;?></td>
                        <td><?php echo date('d-m-Y',strtotime($data['expent_date'])); ?></td>
                        <td><?php echo "Rs. ".number_format($data['account_balance'],2); ?></td>
                        <!-- <td><?php echo $data['amount_expent']; ?></td> -->
                        <td> <?php if($data['expent_receipt']!=''){ ?>
                            <a class="btn btn-success" href="<?php echo base_url('transaction_receipt/'.$data['expent_receipt']); ?>" target="_blank">View Receipt</a>
                        <?php }
                              ?>
                          
                        </td>
                        <td><?php echo "[".$data['exp_updated_by']."]<br/>" ?><?php echo date('d-m-Y H:i:s',strtotime($data['exp_updated'])); ?></td>
                        <td>
                          <button type="button" name="delete" class="btn btn-warning" data-toggle="modal" data-target="#myModalu<?php echo $data['expense_id']; ?>">Edit</button>
                         <!-- <button type="button" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['expense_id']; ?>">Delete</button> -->
                         </td>
                   </tr>
              <div class="modal fade" id="myModal<?php echo $data['expense_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <!-- <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete File</h4>
                    </div>
                    <form action="delete_expenses" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="abid" value="<?php echo $data['expense_id']; ?>">
                        <?php echo form_error('uniname',"<div style='color:red'>","</div>");?>
                      <p>Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <input type="submit" class="btn btn-danger" name="delete" value="Yes..! Delete">

                    </div>
                  </form>
                  </div> -->

                </div>
              </div>

               <div class="modal fade" id="myModalu<?php echo $data['expense_id']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Expenses in Account</h4>
                    </div>
                    <div class="modal-body">
                       <?php echo form_open_multipart('expense_update');?>
                    <div class="row">
                      <input type="hidden" name="aid" value="<?php echo $data['expense_id']; ?>">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Student Name: </label>
                            <select name="stud_id" class="form-control">
                                  <option value="<?php echo $data['stud_id']; ?>"><?php echo $data['firstname']." ".$data['lastname']; ?></option>
                              ?>
                            </select>

                            </div>
                          </div>

                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Purpose: </label>
                        <input type="text" class="form-control" name="purpose" value="<?php echo $data['expent_purpose']; ?>">

                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Amount Paid ($): </label>
                        <input type="number" class="form-control" name="usd" value="<?php echo $data['amt_exp_dollars']; ?>" disabled>

                        </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Amount Paid (INR): </label>
                        <input type="number" class="form-control" name="amount" value="<?php echo $data['amount_expent']; ?>" disabled>

                        </div>
                      </div>


                     <div class="col-md-4">
                      <div class="form-group">
                        <label>Date:(mm/dd/yyyy) </label>
                        <input type="date" name="date" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo date('Y-m-d',strtotime($data['expent_date'])); ?>" >

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Card Used: </label>
                          <select name="account" class="form-control" disabled>

                            <option value="<?php echo $data['card_id'] ?>"><?php echo $data['card_name']."<br/> (".$data['card_no'].")" ?></option>
                            <option value="1">Credit Card (Nikit Shah)(XXX752)</option>
                            <option value="2">Debit Card (Shah Overseas Education)-(XXX507)</option>
                            <option value="3">Debit Card (Shah Education Services)(XXX006) </option>

                          </select>

                          </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Upload <i>(Receipt/Screenshot)</i></label>
                          <input type="file" name="receipts">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <?php if($data['trans_receipt']!=''){ ?>
                            <a class="btn btn-success" href="<?php echo base_url('transaction_receipt/'.$data['trans_receipt']); ?>" target="_blank" >View Receipt</a>
                            <input type="hidden" name="uploaded_file" value="<?php echo $data['trans_receipt']; ?>">
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                       <button type="submit" class="btn btn-success" name="submit"> Submit</button>
                     </div>
                    </form>
                    </div>
                  </div>

                </div>
              </div>
                      <?php
                        }
                      ?>
                   </tbody>
              </table>
            </div><!--box-body-->
          </div><!--box-->

        </div><!--col-md-12-->
      </div><!--row-->
    </section>
 </div><!--content wrapper-->

<script>
  $(document).ready(function(){
    var i =1;
    $('#add').click(function(){
      i++;
      $('#dynamic_field').append('<div id="row'+i+'" class="col-md-12" style="background-color: #95a5a6;padding:10px;margin-top: 15px;"><div class="col-md-12"><button type="button" name="remove" id="'+i+'" class="btn btn_remove pull-right" style="border-radius:50%; color:red;">X</button></div><div class="col-md-3"><div class="form-group"><label>Purpose: </label><input type="text" class="form-control" name="purpose[]" placeholder="ex. GRE Test Booking" required></div></div><div class="col-md-2"><div class="form-group"><label>Amount Paid($): </label><input type="text" class="form-control" name="usd[]" placeholder="ex. 10000" id="dollars'+i+'" onchange="currencyConverter1(this.value)" required></div></div><div class="col-md-2"><div class="form-group"><label>Amount Paid (INR): </label><input type="text" class="form-control" name="amount[]" placeholder="ex. 10000" id="rupees'+i+'" required></div></div><div class="col-md-2"><div class="form-group"><label>Date: </label><input type="date" class="form-control" name="date[]" required></div></div><div class="col-md-3"><div class="form-group"><label>Card Used: </label><select class="form-control" name="account[]" required><option value="1">Credit Card (Nikit Shah)(XXX752)</option><option value="2">Debit Card (Shah Overseas Education)-(XXX507)</option><option value="3">Debit Card (Shah Education Services)-(XXX006)</option></select></div></div><div class="col-md-3"><div class="form-group"><label>Upload(Screenshots/Receipt):</label><input type="file" name="screens[]" class="form-control"></div></div></div>');
    });

    $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });
  });
</script>

<script type="text/javascript">
  var j = 1;
   function currencyConverter(valNum){
    rupees = valNum*71.50;
    document.getElementById("rupees").value = rupees.toFixed(2);
   }

   function currencyConverter1(valNum){
    j++;
    rupees = valNum*71.50;
    document.getElementById("rupees"+j+'').value = rupees.toFixed(2);
   }
</script>
