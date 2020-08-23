	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Transactions
       <!--  <small>Preview</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
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
              <!-- <h3 class="box-title">Quick Example</h3> -->
            </div>  
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="evaluate_accounts">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1" style="font-size: 16px;">Account Name</label>
                  <select class="form-control" name="account" id="account_name" style="font-size: 16px;">
                    <option value="">--Please Select the Account--</option>
                    <?php 
                      foreach ($account as $key => $value) { ?>
                    
                    <option value="<?php echo $value['card_id'] ?>"><?php echo ucwords($value['account_name'])."<br/> (".$value['account_no'].")";?></option>
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

      if(isset($transaction)){


      if($transaction=='false'){
        echo"<br>";
        echo "<div class='container'>";
        echo "<h4>Please select the student /No Transactions found for selected student</h4>";
        echo "<div>";
    } else{

      // print_r($sop);
?>
         <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
             
            </div>
            
            <div class="box-body" style="overflow-x: scroll;">
          <h3 style="text-align: center; font-family: 'Expressway';"><?php echo $account_name->account_name."- Account Summary"; ?> </h3>

          <table class="table table-bordered table-striped" style="margin-bottom: 20px;">
            <thead>
              <tr style="font-family: 'Georgia'; background-color:  #424949 ; color: white;">
                <th>Account No.</th>
                <th>Account Name</th>
                <th>Total Credits(Rs.)</th>
                <th>Total Debits(Rs.)</th>
                <th>Account Balance(Rs.)</th>
              </tr>
            </thead>
            <tbody>
              
              <?php if($total_credits != 0 || $total_debits != 0 ){ ?>
              <tr style="<?php echo $account_name->color; ?>">
                <td><?php echo "XXXXX".$account_name->account_no; ?></td>
                <td><?php echo $account_name->account_name."/<br/>[".$account_name->card_name."]" ; ?></td>
                <td><?php echo "Rs. ".number_format($total_credits,2); ?></td>
                <td><?php echo "Rs. ".number_format($total_debits,2); ?></td>
                <td style="font-weight: bold;"><?php echo "Rs. ".number_format($total_balance,2); ?></td>
              </tr>
              <?php }; ?>

            
            </tbody>
            <tr><td colspan="5">Note: "<b style="font-size: 20px;"> - </b>"&nbsp;sign represents amount debited is more than the amount credited in the account, thus that amount is pending on students end </td></tr>
          </table><hr/>
            <h3 style="text-align: center;font-family: 'Expressway';">Transactions History</h3>
          <hr/>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="background-color: #424949; color: white;">
                  <th>Sr.No.</th>   
                  <th>Student Name</th>              
                  <th>Purpose</th>                  
                  <th>Account/Card type</th>
                  <th>Transaction Type</th>
                  <th>Amount</th>
                  <th>Account Balance</th>
                  <th>Transaction Date<br/>(dd-mm-yyyy)</th>
                  <th>Receipt</th>
                  <th>Updated</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php

                  $i = 0;
                      foreach($transaction as $key => $data)  
                     {
                      $i++;
                    ?>
                 <tr style="<?php echo $data['color']; ?>">
                        <!-- <td><?php echo $data['income_id'];?></td> -->
                        <td><?php echo $i;?></td>
                        <td><?php echo $data['firstname']." ".$data['lastname'] ;?></td>
                        <td><?php echo $data['purpose'] ;?></td>
                        
                        <td><?php 
                        if($data['trans_type']=='credit'){
                          echo $data['account_name']."<br/>(".$data['account_no'].")";
                        } else{
                          echo $data['card_name']."<br/>(".$data['card_no'].")";
                        }
                         ?></td>
                         <td><?php echo $data['trans_type']; ?></td>
                        <td><?php echo "Rs. ".number_format($data['amount'],2);?></td>
                        <td><?php echo "Rs. ".number_format($data['account_balance'],2); ?></td>
                        <td><?php echo date('d-m-Y',strtotime($data['date'])); ?></td>
                        <td><?php if($data['trans_receipt']!=''){ ?>
                            <a class="btn btn-success" href="<?php echo base_url('transaction_receipt/'.$data['trans_receipt']); ?>" target="_blank">View Receipt</a><br/>
                            <a class="btn btn-info" style="margin-top:10px;" href="<?php echo base_url('transaction_receipt/'.$data['trans_receipt']); ?>" download>Download</a>
                        <?php }  ?>
                          
                        </td>                    
                        <td><?php echo date('d-m-Y H:i:s',strtotime($data['trans_updated'])); ?></td>
                   
                   </tr>
            
                      <?php
                        }
                      ?>   
                   </tbody>
              </table>
            </div><!--box-body-->
          </div><!--box-->
<?php } 

 }
?>                   
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
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019-2020 &nbsp;<a href="https://www.shahgre.com">SHAH Overseas</a>.</strong> &nbsp;All rights
    reserved.
  </footer> -->
