<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sop extends CI_Controller {
	
	function __construct()
     {
       parent::__construct();
       $this->load->database();
       $this->load->model('Sop_model');
       $this->load->library('form_validation');
       // $this->load->library('encrypt');
       
     }

    public function index()

    {
        // if(isset($_SESSION['stop'])){
        //      redirect('error');
        //  }
        //  else{

                $data['ques'] = $this->Sop_model->getques();
                
                $this->load->view('sop_header');
                $this->load->view('stud_sop',$data);
                $this->load->view('sop_footer');
                
            // }
        
    }

    public function resume_sop(){
                
                $this->load->view('sop_header');
                $this->load->view('resume_id');
                $this->load->view('sop_footer');

    }

    public function resume_id(){

    }

    public function sop_ques(){
        // $this->encrypt->set_mode(MCRYPT_MODE_CFB);
        $action = $this->input->post('action');

        // $this->load->library('encrypt');


        if($action=='submit'){


        $this->form_validation->set_rules('stud_name','Student Name','required');
        $this->form_validation->set_rules('course','Course Name','required');
        $this->form_validation->set_rules('term','Term','required');
        // $this->form_validation->set_rules('1','Question 1 - Answer','required');
        // $this->form_validation->set_rules('2','Question 2 - Answer','required');
        // $this->form_validation->set_rules('3','Question 3 - Answer','required');
        // $this->form_validation->set_rules('4','Question 4 - Answer','required');
        // $this->form_validation->set_rules('5','Question 5 - Answer ','required');
        // $this->form_validation->set_rules('6','Question 6 - Answer','required');
        // $this->form_validation->set_rules('7','Question 7 - Answer','required');
        // $this->form_validation->set_rules('8','Question 8 - Answer','required');
        // $this->form_validation->set_rules('9','Question 9 - Answer','required');
        // $this->form_validation->set_rules('10','Question 10 - Answer','required');
        // $this->form_validation->set_rules('11','Question 11 - Answer','required');
        // $this->form_validation->set_rules('12','Question 12 - Answer','required');

        if ($this->form_validation->run()){

                $insert=$this->Sop_model->insert_answer();

                if($insert['status']=='true'){

                    $this->load->library('email');

                if($this->config->item('protocol')=="smtp"){
                      $config['protocol'] = "smtp";
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
                    
                    $this->email->from('students@shahgre.com','Student SOP');
                    $this->email->to('aabc54591@gmail.com');
                    // $this->email->to('apps.shahgre@gmail.com');

                    $subject=$this->config->item('sop_sent');
                    $subject=str_replace('[stud_name]',ucwords($this->input->post('stud_name')),$subject);
                    $subject=str_replace('[course]',ucwords($this->input->post('course')),$subject);
                    $subject=str_replace('[term]',ucwords($this->input->post('term')),$subject);

                    // $message=$this->config->item('send_sop');

                    $data['ques'] = $this->Sop_model->get_ques();

                    $htmlContent = "<h1 style='text-align:center;'>SOP</h1>";
                    $htmlContent .= "<div style='font-size:16px;'>";
                    foreach ($data['ques'] as $key => $val) {

                        $htmlContent .= '<p><b>Q1.'.$val['question'].'</b></p>';
                        $htmlContent .= '<p>'.$this->input->post($val['q_id']).'</p>';
                        
                    }   

                    $htmlContent .= "</div>";

                    $this->email->subject($subject);
                    $this->email->message($htmlContent);

                    if($this->email->send()){

                        redirect('thnkyou');

                    }

                    else{

                        show_error($this->email->print_debugger()); 
                        // $this->session->set_flashdata('message', "<div class='alert alert-danger'> Email Not sent </div>");

                        // redirect('sop');
                    }
                    
            }

                else{

                    $this->session->set_flashdata('message', "<div class='alert alert-danger'> Your Answer is not submitted please try again </div>");

                    // redirect('sop');
                }
                    

            }

            else{

                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
                    // redirect('sop');
            
            }
        }//if($action=='submit')

        if($action=='saveexit' || $action=='saveonly'){

            $this->form_validation->set_rules('stud_name','Student Name','required');
            $this->form_validation->set_rules('course','Course Name','required');
            $this->form_validation->set_rules('term','Term','required');

            $stud_name = strtolower($this->input->post('stud_name'));
            $course=$this->input->post('course');
            $term=$this->input->post('term');
            
            $stud_id = $this->Sop_model->get_stud_id($stud_name,$course,$term);

            $flag = $this->Sop_model->get_flag($stud_id);
            

            if($flag==1){ 

                $save_ans = $this->Sop_model->save_answer($stud_id,$stud_name);

                if($action=='saveexit'){
                    
                    if($save_ans=='true'){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'> Your SOP saved Successfully </div>");
                        redirect('save_link/'.$stud_id);
                    } else{
                        $this->session->set_flashdata('message', "<div class='alert alert-danger'> Error While Saving SOP please try again </div>");
                        redirect('resumes/'.$stud_id);
                    }

                } else if($action=='saveonly'){

                    if($save_ans=='true'){  
                        $this->session->set_flashdata('message', "<div class='alert alert-success'> Your SOP saved Successfully </div>");
                        redirect('resumes/'.$stud_id);
                    } else{
                        $this->session->set_flashdata('message', "<div class='alert alert-danger'> Error While Saving SOP please try again </div>");
                        redirect('resumes/'.$stud_id);
                    }
                }
                
            
            } else{

                $insert = $this->Sop_model->insert_answer();

                if($action=='saveexit'){

                    if($insert['status']=='true'){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'> Your SOP saved Successfully </div>");
                        redirect('save_link/'.$insert['id']);
                    } else{

                        $this->session->set_flashdata('message', "<div class='alert alert-danger'> Error While Saving SOP please try again </div>");

                        redirect('resumes/'.$insert['id']);
                    }

                } else if($action=='saveonly'){

                    if($insert['status']=='true'){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'> Your SOP saved Successfully </div>");

                        redirect('resumes/'.$insert['id']);

                    } else{
                        $this->session->set_flashdata('message', "<div class='alert alert-danger'> Error While Saving SOP please try again </div>");

                        redirect('resumes/'.$insert['id']);
                    }
                }
            }

            
        }


    }

    public function view_save_link(){

        $data['stud_id'] = $this->uri->segment(2);  
        $this->load->view('sop_header');
        $this->load->view('saves_link',$data);
        $this->load->view('sop_footer');
    }


    public function resumeSop(){
        // $this->load->library('encrypt');
        // $this->encrypt->set_mode(MCRYPT_MODE_CFB);
        $key = 'sop_id';

        $this->load->model('Sop_model');

        $stud_id = $this->uri->segment(2);

        // $stud_id = $this->encrypt->decode($stud_id);

        $data['sop']=$this->Sop_model->getSopdata($stud_id);
        $data['stud_info'] = $this->Sop_model->getstudinfo($stud_id);
        // $data['id'] = $stud_id;
        $data['ques'] = $this->Sop_model->getques();

        $this->load->view('sop_header');
        $this->load->view('resume_sop',$data);
        $this->load->view('sop_footer');
    }


    public function thank_u(){

        $this->load->view('sop_header');
        $this->load->view('thank_you');
        $this->load->view('sop_footer');
    }
    
    public function errored(){

        $this->load->view('sop_header');
        $this->load->view('errort');
        $this->load->view('sop_footer');
    }

    

public function sop_search(){

    if($this->session->userdata('admin_login')=='true'){

        // $stud_id = $this->uri->segment(2);
        $stud_id = $this->input->post('student_name');
        // $btn = $this->input->post('getsop');

        // if($btn =='submit'){

            $data['sop'] = $this->Sop_model->get_sop($stud_id);
            $data['student'] = $this->Sop_model->get_student(); 

            $this->load->view('header');
            // $this->load->view('sidebar');
            $this->load->view('admin_dash',$data);
            $this->load->view('footer');
        // } else if($btn=='toword') {

        //  $data['sop'] = $this->Sop_model->get_sop($stud_id);
            
        // }

        // }

    } else{

            redirect('adminlogin');
        }
        
}

public function conv_to_word(){

            header("Content-type: application/vnd.ms-word");
 
            # replace Wordfile.doc with whatever you want the filename to default to
            // $filename = $student->student_name."_sop.doc";
            header("Content-Disposition: attachment;Filename=towords.doc");
             
            header("Pragma: no-cache");
             
            header("Expires: 0");

            echo "ABC";
            echo "ABC";
            echo "ABC";
            echo "ABC";
            echo "ABC";
            echo "ABC";



}


public function doc_search(){

    if($this->session->userdata('admin_login')=='true'){

        // $stud_id = $this->uri->segment(2);
        $stud_id = $this->input->post('student_name');

        $data['docs'] = $this->Sop_model->get_docs($stud_id);
        $data['student'] = $this->Sop_model->view_student(); 

        $this->load->view('header');
        // $this->load->view('sidebar');
        $this->load->view('view_uploaded_doc',$data);
        $this->load->view('footer');

        }
        else{

            redirect('adminlogin');
        }
        
}

public function edit_question(){

    if($this->session->userdata('admin_login')=='true'){

        $data['ques'] = $this->Sop_model->get_ques();

        $this->load->view('header');
        // $this->load->view('sidebar');
        $this->load->view('admin_edit_questions',$data);
        $this->load->view('footer');


    }
    else{

            redirect('adminlogin');
        }
}


public function update_question(){

    if($this->session->userdata('admin_login')=='true'){

        $data['ques'] = $this->Sop_model->get_ques();
        $i=0;
        foreach ($data['ques'] as $key => $val) {
            $question = $this->input->post($val['q_id']);
            $this->Sop_model->update_ques($val['q_id'],$question);
            $i++;
        }

        if($i=12){

            $this->session->set_flashdata('message', "<div class='alert alert-success'> SOP Question Updated Successfully </div>");

            redirect('sop_edit');
        }
        else{
            $this->session->set_flashdata('message', "<div class='alert alert-danger'> SOP Question Updation Failed Please Try Again </div>");
            redirect('sop_edit');
        }

    }
    else{

            redirect('adminlogin');
        }
}

} //class
    
