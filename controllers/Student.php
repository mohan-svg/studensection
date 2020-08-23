<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	
	function __construct() {
        parent::__construct();
                     
    }
    
    public function index()
    {
        
        $this->load->view('studentlogin');
    }
    

    public function studentdashboard(){

      if($this->session->userdata('username')!='' && $this->session->userdata('stud_login')=='true'){

        // $id=$this->uri->segment(2);
        $id=$this->session->userdata('id');
        $this->load->model('Student_model');    
        $data['university']=$this->Student_model->universitylist($id);
        $data['student']=$this->Student_model->student($id);
        $data['flash']=$this->session->flashdata('success');
        
        $this->load->view('header2');
        $this->load->view('studentview',$data);
        $this->load->view('footer2');

      } else{

        redirect('Student');
      }

    }

   
    public function studentlogincheck()

    {  
                
        $this->form_validation->set_rules('username','Username ','required');
        $this->form_validation->set_rules('password','Password ','required');
       
          if($this->form_validation->run()){
            $adminname=$this->input->post('username');
            $adminpswd=$this->input->post('password');
           
            //loading model
            $this->load->model('Student_model');
            $this->Student_model->loginstudent($adminname,$adminpswd);

            } else {
                $this->session->set_flashdata('error', 'Please check your Input value!!');
                  redirect('Student');                
                
            }

      
    }

    public function slogout()  
    {  
    $this->load->model('Student_model');  
    $id = $this->session->userdata('id');
    $this->Student_model->unset_login($id);


     $this->session->unset_userdata('username'); 
     $this->session->unset_userdata('id');  
     $this->session->unset_userdata('sname');  
     $this->session->unset_userdata('stud_login');   
     $this->session->sess_destroy();
     redirect('Student');  
     
    }  

    public function logouted()  
    {  
      $this->load->model('Student_model');  

        $id=$this->uri->segment(2);

        $this->Student_model->unset_login($id);

         $this->session->unset_userdata('username'); 
         $this->session->unset_userdata('id');  
         $this->session->unset_userdata('sname');  
         $this->session->unset_userdata('stud_login');   
         $this->session->sess_destroy();
         redirect('Student');  
         
    }  


    public function sendmessage()

        {

          if($this->session->userdata('username')!='' && $this->session->userdata('stud_login')=='true'){

            $studid = $this->session->userdata('id');
            $this->form_validation->set_rules('email','Username ','required');
            $this->form_validation->set_rules('message','Password ','required');


           
                if($this->form_validation->run()){
                $email=$this->input->post('email');
                $message=$this->input->post('message');
                $sname=$this->input->post('sname');
                $uname=$this->input->post('uname');
               
                //loading model
                $msg= $this->QuerryFunction($email,$message,$sname,$uname);

                $this->session->set_flashdata('success', 'Your Message Sent Successfully');
                    
                    redirect('sview/');

                } else {
                    $this->session->set_flashdata('error', 'Please check your Input value!!');
                    
                    redirect('sview/');
                    
                }

            } else{

                redirect('Student');
            }
            
        }



        public function QuerryFunction($email,$message,$sname,$uname) {

           if($this->session->userdata('username')!='' && $this->session->userdata('stud_login')=='true'){

                   $semail=$email;
                   $querry=$message;
                   $sname=$sname;
                   $uname=$uname;
         

            $this->load->library('email');
        
            if($this->config->item('protocol')=="smtp"){
                       $config['protocol'] = 'smtp';
                       $config['smtp_host'] = $this->config->item('smtp_hostname');
                       $config['smtp_user'] = $this->config->item('smtp_username');
                       $config['smtp_pass'] = $this->config->item('smtp_password');
                       $config['smtp_port'] = $this->config->item('smtp_port');
                       $config['smtp_timeout'] = $this->config->item('smtp_timeout');
                       $config['mailtype'] = $this->config->item('smtp_mailtype');
                       $config['starttls']  = $this->config->item('starttls');
                      $config['newline']  = $this->config->item('newline');
                       
                       $this->email->initialize($config);
                   }
                       $fromemail= "students@shahgre.com";
                       $fromname=$this->config->item('fromname');
                       $subject=$this->config->item('activation_subject');
                       $message=$this->config->item('activation_message');;
                       
                       $message=str_replace('[Querry]',$querry,$message);
                       $message=str_replace('[Sname]',$sname,$message);
                        $subject=str_replace('[Sname]',$sname,$subject);
                        $message=str_replace('[email]',$semail,$message);
                         $message=str_replace('[uname]',$uname,$message);
              
              
                   
                       $toemail="aabc54591@gmail.com";
                        
                       $this->email->to($toemail);
                       $this->email->from($fromemail, $fromname);
                       $this->email->subject($subject);
                       $this->email->message($message);
                       if(!$this->email->send()){
                        print_r($this->email->print_debugger());
                        exit;
                       }  

                       return "Email sent successfully";

                  } else{
                      redirect('Student');

                  }
            
              
    }

    public function gre_login(){

          $this->load->model('Student_model');

          $id = $this->session->userdata('id');

          $this->db->where('stud_id',$id);

          $query = $this->db->get('student');

          $row = $query->row();
          $firstname = $row->firstname ;
          $lastname = $row->lastname ;
          $email = $row->email_id;

          $data['status']=$this->Student_model->gre_test($id,$firstname,$lastname,$email);

          if($data['status']=='true'){
              redirect('http://localhost/full-length-test/index.php/to_login/'.$id);
          }
          else{

            $this->session->set_flashdata('error', 'You are not authorized User');

            redirect('Student');
          }

    }

    public function gre_topic(){

          $this->load->model('Student_model');

          $id = $this->session->userdata('id');

          $this->db->where('stud_id',$id);

          $query = $this->db->get('student');

          $row = $query->row();
          $firstname = $row->firstname ;
          $lastname = $row->lastname ;
          $email = $row->email_id;

          echo "ID: ". $id." " .$firstname." ".$lastname." ".$email;

          $data['status']=$this->Student_model->gre_topics($id,$firstname,$lastname,$email);

          print_r($data['status']);
          if($data['status']=='true'){
              redirect('http://localhost/topic-wise-test/index.php/to_logins/'.$id);
          }
          else{

            $this->session->set_flashdata('error', 'You are not authorized User');

            redirect('Student');
          }

    }

    public function gre_topicss(){

          $this->load->model('Student_model');

          $id = $this->session->userdata('id');

          $this->db->where('stud_id',$id);

          $query = $this->db->get('student');

          $row = $query->row();
          $stud_status = $row->stud_login ;
         


          if($stud_status=='true'){
              redirect('http://localhost/topic-wise-test/index.php/to_logins/'.$id);
          } else{

            $this->session->set_flashdata('error', 'You are not authorized User');

            redirect('Student');
          }

    }

    public function search_by_name(){

          $this->load->model('Sop_model');
          $this->load->model('Student_model');
          if($this->session->userdata('admin_login')=='true'){

        // $stud_id = $this->uri->segment(2);
        $stud_id = $this->input->post('student_name');
        // $btn = $this->input->post('getsop');

        // if($btn =='submit'){

          $data['university_data'] = $this->Student_model->universitylist($stud_id);
          $data['student'] = $this->Student_model->studentname(); 

          $this->load->view('header');
          // $this->load->view('sidebar');
          $this->load->view('search_university_by_name',$data);
          $this->load->view('footer');
        // } else if($btn=='toword') {

        //  $data['sop'] = $this->Sop_model->get_sop($stud_id);
          
        // }

        // }

      } else{

          redirect('adminlogin');
        }
    }

} //class
    
