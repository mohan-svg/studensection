<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {
	
	function __construct()
     {
       parent::__construct();
       $this->load->database();
       // $this->load->model('Expense_model');
       $this->load->library('form_validation');

     }


	public function index()
    {
        if($this->session->userdata('admin_login')=='true'){

                $this->load->model('Expense_model');

                $data['student'] = $this->Expense_model->get_student();
                $data['account'] = $this->Expense_model->get_account_info();
                $data['income'] = $this->Expense_model->get_income_data();
                $this->load->view('header');
                $this->load->view('adding_income',$data);
                $this->load->view('footer');
        } else{

        redirect('adminlogin');
    }

    }

    public function insert_credited_amount(){

      if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');

        $number = count($this->input->post('amount'));
        $stud_id = $this->input->post('stud_id');

        $stud_name = $this->Expense_model->get_stud_name_by_id($stud_id);

        //echo $number;

        $filename = '';

        if($number > 0){
            for($i = 0; $i<$number; $i++){

                if(!empty($_FILES['receipts']['name'][$i])){

                          // Define new $_FILES array - $_FILES['file']
                          $_FILES['file']['name'] = $_FILES['receipts']['name'][$i];
                          $_FILES['file']['type'] = $_FILES['receipts']['type'][$i];
                          $_FILES['file']['tmp_name'] = $_FILES['receipts']['tmp_name'][$i];
                          $_FILES['file']['error'] = $_FILES['receipts']['error'][$i];
                          $_FILES['file']['size'] = $_FILES['receipts']['size'][$i];

                          // Set preference
                          $config['upload_path'] = 'transaction_receipt/';
                          $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
                          $config['max_size'] = '50000'; // max_size in kb
                          $config['file_name'] = $stud_name."_".$_POST['purpose'][$i]."_credit";

                          //Load upload library
                          $this->load->library('upload',$config);

                          // File upload
                          if($this->upload->do_upload('file')){
                            // Get data about the file
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];

                          } else{
                                        $filename = '';
                                    }
                        }

                    $data = array('stud_id' => $stud_id,
                        'account_id' => $_POST['account'][$i],
                        'amount' => $_POST['amount'][$i],
                        'amt_in_dollars' => $_POST['usd'][$i],
                        'purpose' => $_POST['purpose'][$i],
                        'date_receive' => $_POST['date'][$i],
                        'income_receipt' => $filename,
                        'updated_by' => $this->session->userdata('admin_name'),
                        );

                    $sql = $this->db->insert('amount_income',$data);
                    $credit_id = $this->db->insert_id();
                    $debit_id = 0;
                    $type = 'credit';

                    $account_balance = $this->Expense_model->get_trans_balance_per_accounts($_POST['account'][$i]);

                    $account_balance = $account_balance + $_POST['amount'][$i];

                    $this->Expense_model->insert_transactions($stud_id,$type,$_POST['account'][$i],$_POST['amount'][$i],$_POST['usd'][$i],$_POST['purpose'][$i],$_POST['date'][$i],$account_balance,$credit_id,$debit_id,$filename,$this->session->userdata('admin_name'));

            }

            echo "Data Inserted";
            $this->session->set_flashdata('success','Account Data Inserted Successfully');
            redirect('Expense');

        } else{

            $this->session->set_flashdata('error','All fields are required');
            redirect('Expense');
        }

        } else{

        redirect('adminlogin');
    }


    }

public function receipt_upload($file){
        $config['upload_path'] ='./transaction_receipt/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docs';
        $config['overwrite'] = TRUE;
        $config['remove_space'] = FALSE;

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload($file)){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            return '';
        } else{
            $data = $this->upload->data();
            return $data['file_name'];
        }
}

    public function update_credited_amount(){

        if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');

        $id = $this->input->post('aid');
        $purpose = $this->input->post('purpose');
        $amount = $this->input->post('amount');
        $prev_amount = $this->input->post('prev_amount');
        $date = $this->input->post('date');
        $account = $this->input->post('account');
        $usd = $this->input->post('usd');
        $stud_id = $this->input->post('stud_id');
        $stud_name = $this->Expense_model->get_stud_name_by_id($stud_id);
        $filename = '';

        if(!empty($_FILES['receipts']['name'])){

             // Define new $_FILES array - $_FILES['file']
                          // $_FILES['file']['name'] = $_FILES['receipts']['name'][$i];
                          // $_FILES['file']['type'] = $_FILES['receipts']['type'][$i];
                          // $_FILES['file']['tmp_name'] = $_FILES['receipts']['tmp_name'][$i];
                          // $_FILES['file']['error'] = $_FILES['receipts']['error'][$i];
                          // $_FILES['file']['size'] = $_FILES['receipts']['size'][$i];

                          // Set preference
                          $config['upload_path'] = 'transaction_receipt/';
                          $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
                          $config['max_size'] = '50000'; // max_size in kb
                          $config['file_name'] = $stud_name."_".$purpose."_credit";
                          // $config['overwrite'] = true;

                          //Load upload library
                          $this->load->library('upload',$config);

                          // File upload
                          if($this->upload->do_upload('receipts')){
                            // Get data about the file
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];

                          } else{
                                        $filename = $this->input->post('uploaded_file');
                                }
                
        } else{
            $filename = $this->input->post('uploaded_file');
        }


    if($amount == 0){

        $query = $this->Expense_model->update_credits($id,$purpose,$date,$usd,$filename);

        if($query=='true'){

            $trans = $this->Expense_model->update_credit_in_transaction($id,$purpose,$date,$usd,$filename);

            $this->session->set_flashdata('success','Updated Successfully');
            redirect('Expense');
        } else{
            $this->session->set_flashdata('error','Error , Please Try Again');
            redirect('Expense');
        }

    } else{

        $this->session->set_flashdata('error','You cannot update Credit Amount ! <br/> Please contact support team for updation in Credit Amount ');
            redirect('Expense');

        }

        } else{

        redirect('adminlogin');
    }

    }

    public function delete_credited_amount(){

        if($this->session->userdata('admin_login')=='true'){

        $id = $this->input->post('abid');

        $this->load->model('Expense_model');

        $query = $this->Expense_model->delete_account_income($id);

        if($query=='true'){

            $this->session->set_flashdata('success','Successfully Deleted');
            redirect('Expense');

        } else{

            $this->session->set_flashdata('error','Error , Please Try Again');
            redirect('Expense');

        }

    } else{

        redirect('adminlogin');
    }


    }

    public function expenses(){

        if($this->session->userdata('admin_login')=='true'){

                $this->load->model('Expense_model');

                $data['student'] = $this->Expense_model->get_student();
                $data['account'] = $this->Expense_model->get_account_info();
                $data['expense'] = $this->Expense_model->get_expense_data();
                $this->load->view('header');
                $this->load->view('adding_expense',$data);
                $this->load->view('footer');

        } else{

        redirect('adminlogin');
    }

    }

    public function insert_expenses(){

        if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');

        $number = count($this->input->post('usd'));
        $stud_id = $this->input->post('stud_id');

        $stud_name = $this->Expense_model->get_stud_name_by_id($stud_id);

        echo $number;
        $fname = '';

        if($number > 0){

            for($i = 0; $i<$number; $i++){


                if(!empty($_FILES['screens']['name'][$i])){

                     // Define new $_FILES array - $_FILES['file']
                    $_FILES['file']['name'] = $_FILES['screens']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['screens']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['screens']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['screens']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['screens']['size'][$i];

                    //Set Preference
                    $config['upload_path'] = 'transaction_receipt/';
                    $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                    $config['max_size'] = '50000'; //in kb
                    $config['file_name'] = $stud_name."_".$_POST['purpose'][$i]."_debit";

                    $this->load->library('upload',$config);

                    if($this->upload->do_upload('file')){

                        $uploadData = $this->upload->data();
                        $fname = $uploadData['file_name'];

                    } else{

                        $fname = '';

                    }

                
                }//if(!empty(files))

                echo 'Filename:: '.$fname;

                    $data = array('stud_id' => $stud_id,
                        'amount_expent' => $_POST['amount'][$i],
                        'amt_exp_dollars' => $_POST['usd'][$i],
                        'expent_purpose' => $_POST['purpose'][$i],
                        'expent_card_id' => $_POST['account'][$i],
                        'expent_date' => $_POST['date'][$i],
                        'expent_receipt' => $fname,
                        'exp_updated_by' => $this->session->userdata('admin_name')
                     );

                    $sql = $this->db->insert('expense_record',$data);
                    $debit_id = $this->db->insert_id();
                    $credit_id = 0;
                    $type = 'debit';

                    $account_balance = $this->Expense_model->get_trans_balance_per_accounts($_POST['account'][$i]);

                    $account_balance = $account_balance - $_POST['amount'][$i];

                    $this->Expense_model->insert_transactions($stud_id,$type,$_POST['account'][$i],$_POST['amount'][$i],$_POST['usd'][$i],$_POST['purpose'][$i],$_POST['date'][$i],$account_balance,$credit_id,$debit_id,$fname,$this->session->userdata('admin_name'));
            } //for()

            echo "Data Inserted";
            $this->session->set_flashdata('success','Expense Added Successfully');
            redirect('expenses_s');

        } else{ //if($number >0)

            $this->session->set_flashdata('error','All fields are required');
            redirect('expenses_s');
        }

        } else{ 

        redirect('adminlogin');
    }

    }

    public function update_expenses_amount(){

        if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');

        $id = $this->input->post('aid');
        $purpose = $this->input->post('purpose');
        $amount = $this->input->post('amount');
        $date = $this->input->post('date');
        // $account = $this->input->post('account');

        $stud_id = $this->input->post('stud_id');
        $stud_name = $this->Expense_model->get_stud_name_by_id($stud_id);
        $filename = '';

        if(!empty($_FILES['receipts']['name'])){

             // Define new $_FILES array - $_FILES['file']
                          // $_FILES['file']['name'] = $_FILES['receipts']['name'][$i];
                          // $_FILES['file']['type'] = $_FILES['receipts']['type'][$i];
                          // $_FILES['file']['tmp_name'] = $_FILES['receipts']['tmp_name'][$i];
                          // $_FILES['file']['error'] = $_FILES['receipts']['error'][$i];
                          // $_FILES['file']['size'] = $_FILES['receipts']['size'][$i];

                          // Set preference
                          $config['upload_path'] = 'transaction_receipt/';
                          $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
                          $config['max_size'] = '50000'; // max_size in kb
                          $config['file_name'] = $stud_name."_".$purpose."_debit";
                          // $config['overwrite'] = true;

                          //Load upload library
                          $this->load->library('upload',$config);

                          // File upload
                          if($this->upload->do_upload('receipts')){
                            // Get data about the file
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];

                          } else{
                                        $filename = $this->input->post('uploaded_file');
                                }
                
        } else{
            $filename = $this->input->post('uploaded_file');
        }


    if($amount == 0){

        $query = $this->Expense_model->update_expenses($id,$purpose,$date,$filename);
        if($query=='true'){

            $trans = $this->Expense_model->update_debit_in_transaction($id,$purpose,$date,$filename);

            $this->session->set_flashdata('success','Updated Successfully');
            redirect('expenses_s');
        } else{
            $this->session->set_flashdata('error','Error , Please Try Again');
            redirect('expenses_s');
        }

    } else{
        $this->session->set_flashdata('error','Expense Amount cannot be updated <br/> Please contact Administrator to update expense amount');
            redirect('expenses_s');
    }

    } else{

        redirect('adminlogin');
    }

}

    public function view_total_income(){
    if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');
        $this->Expense_model->total_income();

        } else{

        redirect('adminlogin');
    }
}


    public function delete_expense_account(){

    if($this->session->userdata('admin_login')=='true'){

        $id = $this->input->post('abid');

        $this->load->model('Expense_model');

        $query = $this->Expense_model->delete_expense_account($id);

        if($query=='true'){

            $this->session->set_flashdata('success','Successfully Deleted');
            redirect('expenses_s');

        } else{

            $this->session->set_flashdata('error','Error , Please Try Again');
            redirect('expenses_s');

        }

        } else{

        redirect('adminlogin');
    }

    }


    public function view_transaction(){

        if($this->session->userdata('admin_login')=='true'){

                $this->load->model('Expense_model');

                $data['student'] = $this->Expense_model->get_student();
                $this->load->view('header');
                $this->load->view('view_transactions',$data);
                $this->load->view('footer');

            } else{

        redirect('adminlogin');
    }
    }

    public function transaction_list(){

    if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');
        $st_id = $this->input->post('student_name');
        $data['transaction']=$this->Expense_model->get_transaction($st_id);
        $data['stud']=$this->Expense_model->get_student_by_id($st_id);
        $data['student'] = $this->Expense_model->get_student();

        //Personal Account
        $data['total_credits_pa'] = $this->Expense_model->get_total_credits_pa($st_id);
        $data['total_debits_pa'] = $this->Expense_model->get_total_debits_pa($st_id);
        $data['total_balance_pa'] = $data['total_credits_pa'] - $data['total_debits_pa'];

        //Shah Overseas Account
        $data['total_credits_so'] = $this->Expense_model->get_total_credits_so($st_id);
        $data['total_debits_so'] = $this->Expense_model->get_total_debits_so($st_id);
        $data['total_balance_so'] = $data['total_credits_so'] - $data['total_debits_so'];

        //Shah Education Account
        $data['total_credits_se'] = $this->Expense_model->get_total_credits_se($st_id);
        $data['total_debits_se'] = $this->Expense_model->get_total_debits_se($st_id);
        $data['total_balance_se'] = $data['total_credits_se'] - $data['total_debits_se'];

        $this->load->view('header');
        $this->load->view('view_transactions',$data);
        $this->load->view('footer');

        } else{

        redirect('adminlogin');
    }

    }

    public function view_all_transactions(){

        if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');

        $data['account'] = $this->Expense_model->get_account_info();

        $this->load->view('header');
        $this->load->view('all_transactions',$data);
        $this->load->view('footer');

        } else{

        redirect('adminlogin');
    }

    }

    public function search_all_transactions(){

        if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');

        $account_id = $this->input->post('account');
        $data['account'] = $this->Expense_model->get_account_info();
        $data['transaction'] = $this->Expense_model->get_transaction_by_account($account_id);

        $data['total_credits'] = $this->Expense_model->get_total_credits_by_account($account_id);
        $data['total_debits'] = $this->Expense_model->get_total_debits_by_account($account_id);
        $data['total_balance'] = $data['total_credits'] - $data['total_debits'];
        $data['account_name'] = $this->Expense_model->get_account_by_id($account_id);

        $this->load->view('header');
        $this->load->view('all_transactions',$data);
        $this->load->view('footer');

        } else{

        redirect('adminlogin');
    }

    }

    public function accounts_summary(){

        if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Expense_model');
        for($i=1;$i<4;$i++){

        $data['total_credits'][$i] = $this->Expense_model->get_total_credits_by_account($i);
        $data['total_debits'][$i] = $this->Expense_model->get_total_debits_by_account($i);
        $data['total_balance'][$i] = $data['total_credits'][$i] - $data['total_debits'][$i];
        $data['account_name'][$i] = $this->Expense_model->get_account_by_id($i);
        }

        $this->load->view('header');
        $this->load->view('account_summary',$data);
        $this->load->view('footer');

        } else{

        redirect('adminlogin');
    }

    }


}
