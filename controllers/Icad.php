<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icad extends CI_Controller {
	
	function __construct()
     {
       parent::__construct();
       $this->load->database();
       $this->load->model('Icad_model');
       $this->load->library('form_validation');

     }

    public function index()
    {
        if($this->session->userdata('admin_login')=='true'){

                $this->load->model('Expense_Model');

                $data['student'] = $this->Expense_Model->get_student();
                
                $data['university'] = $this->Icad_model->get_university_name();
                $data['icad_data'] = $this->Icad_model->icad_student_data();
                
                $this->load->view('header');
                $this->load->view('add_icad_student',$data);
                $this->load->view('footer');
        } else{

            redirect('adminlogin');
        }

    }

    public function upload_file(){
        if(!empty($_FILES['receipts']['name'])){

                          // Define new $_FILES array - $_FILES['file']
                          $_FILES['file']['name'] = $_FILES['receipts']['name'];
                          $_FILES['file']['type'] = $_FILES['receipts']['type'];
                          $_FILES['file']['tmp_name'] = $_FILES['receipts']['tmp_name'];
                          $_FILES['file']['error'] = $_FILES['receipts']['error'];
                          $_FILES['file']['size'] = $_FILES['receipts']['size'];

                          // Set preference
                          $config['upload_path'] = 'admit_receipt/';
                          $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
                          $config['max_size'] = '50000'; // max_size in kb
                          $config['file_name'] = $stud_name."_".$university_name.$course;

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

    }

    public function insert_icad_student(){

      if($this->session->userdata('admin_login')=='true'){

            
        $stud_id = $this->input->post('stud_id');
        $university_name = $this->input->post('university');
        $course = $this->input->post('course');
        $term = $this->input->post('term');
        $status = $this->input->post('appstatus');

            
            $query= $this->Icad_model->insert_stud_data($stud_id,$university_name,$course,$term,$status);           
            if($query=='true'){
                echo "Data Inserted";
            $this->session->set_flashdata('success','Icad Student Status Inserted Successfully');
            redirect('icad_status');

            } else{

            $this->session->set_flashdata('error','Data Not Inserted, 
                Please Try again');
            redirect('icad_status');
        }

        } else{

        redirect('adminlogin');
    }


    }



    public function update_icad_student(){

      if($this->session->userdata('admin_login')=='true'){
            
        $icad_id = $this->input->post('icad_id');
        $university_name = $this->input->post('university_name');
        $course = $this->input->post('course');
        $term = $this->input->post('term');
        $status = $this->input->post('appstatus');

            
            $query= $this->Icad_model->update_icad_student($icad_id,$university_name,$course,$term,$status);            
            if($query=='true'){
                echo "Data Updated";
            $this->session->set_flashdata('success','Icad Student Status Updated Successfully');
            redirect('icad_status');

            } else{

            $this->session->set_flashdata('error','Status not updated, 
                Please Try again');
            redirect('icad_status');
        }

        } else{

        redirect('adminlogin');
    }


    }


    public function delete_icad_status(){
        if($this->session->userdata('admin_login')=='true'){
        
        $id = $this->input->post('icad_status_id');
        $query = $this->Icad_model->delete_icad_stud_status($id);

        if($query=='true'){
                echo "Data Updated";
            $this->session->set_flashdata('success','Icad Student Status Deleted Successfully');
            redirect('icad_status');

            } else{

            $this->session->set_flashdata('error','Status not Deleted, 
                Please Try again');
            redirect('icad_status');
        }

        } else{

        redirect('adminlogin');
    }
}

public function add_icad_users()
    {
        if($this->session->userdata('admin_login')=='true'){

            
                $data['icad_users'] = $this->Icad_model->get_icad_users();
                
                $this->load->view('header');
                $this->load->view('add_icad_user',$data);
                $this->load->view('footer');
        } else{

            redirect('adminlogin');
        }

    }

    public function insert_icad_users(){
        if($this->session->userdata('admin_login')=='true'){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $status = $this->input->post('userstatus');

                $query = $this->Icad_model->insert_icad_user($username,$password,$status);

                if($query=='true'){
                    echo "Data Inserted";
                $this->session->set_flashdata('success','Icad User Created Successfully');
                redirect('icad_users');

                } else{

                $this->session->set_flashdata('error','Icad User Not Created,Please Try again');
                redirect('icad_users');
            }
        } else{

            redirect('adminlogin');
        }
    }

    public function update_icad_user(){
        if($this->session->userdata('admin_login')=='true'){
                $ss_id = $this->input->post('ss_id');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $status = $this->input->post('userstatus');

                $query = $this->Icad_model->update_icad_user($ss_id,$username,$password,$status);

                if($query=='true'){
                    echo "Data Inserted";
                $this->session->set_flashdata('success','Icad User Updated Successfully');
                redirect('icad_users');

                } else{

                $this->session->set_flashdata('error','Icad User Not Updated,Please Try again');
                redirect('icad_users');
            }
        } else{

            redirect('adminlogin');
        }
    }

    public function delete_icad_user(){
            if($this->session->userdata('admin_login')=='true'){
            
            $id = $this->input->post('icad_user_id');
            $query = $this->Icad_model->delete_icad_user($id);

            if($query=='true'){
                    echo "Data Updated";
                $this->session->set_flashdata('success','Icad User Deleted Successfully');
                redirect('icad_users');

                } else{

                $this->session->set_flashdata('error','Icad User Not Deleted, Please Try again');
                redirect('icad_users');
            }

            } else{

            redirect('adminlogin');
        }
    }


    public function login(){
        $this->load->view('icad_login');
        //$this->load->view('icad_login_stud_doc');
    }


    public function login_check()

    {  
        // $captcha = $this->input->post('captcha_code');

        // if($captcha == $this->session->userdata('captcha_code')){
        
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
       
          if($this->form_validation->run()){
            $adminname=$this->input->post('username');
            $adminpswd=$this->input->post('password');
      
            $query = $this->Icad_model->loginuser($adminname,$adminpswd);

            if($query = 'true'){

                redirect('icad_data');

            } else{
                $this->session->set_flashdata('error', 'Wrong Credentials, Please input correct logins');
                  redirect('icad');
            }

            } else {
                $this->session->set_flashdata('error', 'Please check your Input value');
                  redirect('icad');                
                
            }


        // } else{ 
              //   $this->session->set_flashdata('error', '! Invalid Captcha');
        //     redirect('Student');
        // } 
    }

    // public function icad_student_data(){
    //  if($this->session->userdata('icad_login')=='true'){

        

    //  $data['student']=$this->Icad_model->get_all_data();
    //  $this->load->view('header2');
    //  $this->load->view('icad_user_view',$data);
    //  $this->load->view('footer2');

    // } else{
    //  redirect('icad');
    // }
    // }

    //  public function icad_student_data(){
    //  if($this->session->userdata('icad_login')=='true'){

    //  $data['student_name']=$this->Icad_model->get_icad_students();
    //  $data['studentids']=$this->Icad_model->get_all_students();
    //  $this->load->view('header_icad');
    //  $this->load->view('icad_user_view',$data);
    //  $this->load->view('footer_icad');

    // } else{
    //  redirect('icad');
    // }
    // }

     public function icad_student_data(){
        if($this->session->userdata('icad_login')=='true'){

        if(isset($_POST['search'])){

            $data['student_name']=$this->Icad_model->get_icad_students();
            $data['studentids']=$this->Icad_model->get_student_by_id($this->input->post('student_id'));
            $this->load->view('header_icad');
            $this->load->view('icad_user_view',$data); 
            $this->load->view('footer2');

            } else if(isset($_POST['view_all'])) {

                    $data['student_name']=$this->Icad_model->get_icad_students();
                    $data['studentids']=$this->Icad_model->get_all_students();
                    $this->load->view('header_icad');
                    $this->load->view('icad_user_view',$data);
                    $this->load->view('footer2');
            } else{
                    $data['student_name']=$this->Icad_model->get_icad_students();
                    $data['studentids']=$this->Icad_model->get_all_students();
                    $this->load->view('header_icad');
                    $this->load->view('icad_user_view',$data);
                    $this->load->view('footer2');
            }

        } else{
            redirect('icad');
        }
   }
       

    public function icad_logout(){
        $this->session->set_userdata('icad_login','false');
        $this->session->unset_userdata('usname');
        $this->session->unset_userdata('icad_login');
        $this->session->sess_destroy();

        echo "logout";

        redirect('icad');
    }

}
    
