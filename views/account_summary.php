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
        View All Accounts Summary
 
      </h1>
  
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->

         <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
             
            </div>
            
            <div class="box-body" style="overflow-x: scroll;">
          <h3 style="text-align: center; font-family: 'Expressway';"><?php echo "Three Accounts Summary"; ?> </h3>

          <table class="table table-bordered table-striped" style="margin-bottom: 20px;">
            <thead>
              <tr style="font-family: 'Georgia'; background-color:  #424949 ; color: white;">
                <th>Sr. No.</th>
                <th>Account No.</th>
                <th>Account Name</th>
                <th>Total Credits(Rs.)</th>
                <th>Total Debits(Rs.)</th>
                <th>Account Balance(Rs.)</th>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 1;$i<4;$i++) { ?>
                        
              <?php if($total_credits[$i] != 0 || $total_debits[$i] != 0 ){ ?>
              <tr style="<?php echo $account_name[$i]->color; ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo "XXXXX".$account_name[$i]->account_no; ?></td>
                <td><?php echo $account_name[$i]->account_name."/<br/>[".$account_name[$i]->card_name."]" ; ?></td>
                <td><?php echo "Rs. ".number_format($total_credits[$i],2); ?></td>
                <td><?php echo "Rs. ".number_format($total_debits[$i],2); ?></td>
                <td style="font-weight: bold;"><?php echo "Rs. ".number_format($total_balance[$i],2); ?></td>
              </tr>
              <?php } ?>

              <?php }; ?>

              <?php // print_r($account_name); ?>
            
            </tbody>
            <tr><td colspan="5">Note: "<b style="font-size: 20px;"> - </b>"&nbsp;sign represents amount debited is more than the amount credited in the account, thus that amount is pending on students end </td></tr>
          </table><hr/>

           
            </div><!--box-body-->
          </div><!--box-->
                
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
