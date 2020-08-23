<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');

class Upload extends CI_Controller {
	
    	public function index()
      {
        if($this->session->userdata('stud_login')=='true'){
          
            $this->load->view('header2');
            $this->load->view('sidebar');
            $this->load->view('upload_docs');
            $this->load->view('footer');
        }
        else{

          redirect('Student');
        }
        
      }
        
       

      public function stud_docs_upload(){

        if($this->session->userdata('stud_login')=='true'){

            // Check form submit or not
           if($this->input->post('upload') != NULL ){

            $this->load->model('Upload_model');

                      $stud_id = $this->session->userdata('id');
                      $name=$this->session->userdata('sname');

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
                          $fromname="Documents from New Student ";

                          $this->email->from($fromemail, $fromname);
                          $this->email->to('aabc54591@gmail.com');

                           $subject=$this->config->item('subject');
                           $message=$this->config->item('message');

                          $this->email->subject($subject);
                          $this->email->message($message);

                          $dat = array('doc_','ielts_toefl','lor','resume','ug_transcript','ug_marksheet','ug_degree','gre_scorecard','grad_transcript','grad_marksheet','grad_degree','diploma_transcript','diploma_marksheet','diploma_certificate');

                          $data = array();

                          
                                // Count total files
                                // $countfiles = count($_FILES['files']['name']);
                           
                                // Looping all files
                                for($i=0;$i<=16;$i++){
                           
                                  if(!empty($_FILES['files']['name'][$i])){
                           
                                    // Define new $_FILES array - $_FILES['file']
                                    // $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                                    // Set preference
                                    $config['upload_path'] = 'docs_uploaded/'; 
                                    $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx';
                                    $config['max_size'] = '50000'; // max_size in kb
                                    $name = $name."_".$dat[$i];
                                    $config['file_name'] = $name;
                           
                                    //Load upload library
                                    $this->load->library('upload',$config); 
                           
                                    // File upload
                                    if($this->upload->do_upload('file')){
                                      // Get data about the file
                                      $uploadData = $this->upload->data();
                                      $filename = $uploadData['file_name'];

                                      $this->email->attach($uploadData['full_path']);
                                      // Initialize array
                                      $data['filenames'][] = $filename;
                                    } 
                                    else{
                                     
                                        $data['filenames'][] ='no_file';
                                    
                                    }

                                  }  // if(!empty($_FILES['files']['name'][$i]))
                                  else{
                                     
                                        $data['filenames'][] ='no_file';
                                    
                                    }
                                

                                } //for loop
                      
                           

                      if($this->email->send())
                        {

                          $this->Upload_model->insert($stud_id,$data);

                          print_r($data['filenames']);
                         

                          } else {
                   
                            print_r($this->email->print_debugger());
                         
                           }
                 
                     }//if($this->input->post('upload') != NULL )

                } else{

                  redirect('Student');
                }

          }

    public function view_documents(){

      if($this->session->userdata('stud_login')=='true'){

       $this->load->model('Upload_model');

      $stud_id = $this->session->userdata('id');

      $data['docs']= $this->Upload_model->getstudent_docs($stud_id);

      $this->load->view('header2');
      $this->load->view('sidebar');
      $this->load->view('viewstdocs',$data);
      $this->load->view('footer');

    } else{

        redirect('Student');
    }


    }


    public function update_documents(){

      if($this->session->userdata('stud_login')=='true'){

       $this->load->model('Upload_model');

         $studid=$this->input->post('studid');
         $updfield=$this->input->post('updfield');
         $dtype=$this->input->post('docstype');

         $name = $this->session->userdata('sname');

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
                      $fromname="Updated Documents from New Student ";

                      $this->email->from($fromemail, $fromname);
                      $this->email->to('aabc54591@gmail.com');

                       $subject=$this->config->item('subject');
                       $message=$this->config->item('message');

                      $this->email->subject($subject);
                      $this->email->message($message);



        

         if(!empty($_FILES['updatefile']['name'])){
                       

                                // Set preference
                                $config['upload_path'] = 'docs_uploaded/'; 
                                $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx';
                                $config['max_size'] = '50000'; // max_size in kb
                                $name = $name."_".$dtype;
                                $config['file_name'] = $name;
                       
                                //Load upload library
                                $this->load->library('upload',$config); 
                       
                                // File upload
                                if($this->upload->do_upload('updatefile')){
                                  // Get data about the file
                                  $uploadData = $this->upload->data();
                                  $filename = $uploadData['file_name'];

                                  $this->email->attach($uploadData['full_path']);
                                  
                                } //if($this->upload->do_upload('file'))
                              
                              if($this->email->send())
                                  {

                                    $this->Upload_model->update($studid,$updfield,$filename);
                                                                   

                                    } else {
                             
                                      print_r($this->email->print_debugger());
                                   
                                     }


                              } //!empty($_FILES['updatefile']['name'])

                              else{

                                $this->session->set_flashdata('error', 'No File Selected to upload');

                                redirect('view_doc');
                              }
        } else{

          redirect('Student');
        }


    }

      public function student_dashboard(){

        $this->load->model('Student_model');

          if($this->session->userdata('stud_login')=='true'){
            $data['student_status'] = $this->Student_model->student($this->session->userdata('id'));
            $this->load->view('header2');
            $this->load->view('studentdashboard',$data);
            $this->load->view('footer2');
          }
          else{
            redirect('Student');       
          }
      }


    public function admin_update_documents(){

      if($this->session->userdata('admin_login')=='true'){

       $this->load->model('Upload_model');

         $studid=$this->input->post('studid');
         $updfield=$this->input->post('updfield');
         $dtype=$this->input->post('docstype');

         $this->db->where('stud_id',$studid);
         $query = $this->db->get('student');

          $row = $query->row();
          $name = $row->firstname.'_'.$row->lastname;
          

         if(!empty($_FILES['updatefile']['name'])){
                       

                                // Set preference
                                $config['upload_path'] = 'docs_uploaded/'; 
                                $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx';
                                $config['max_size'] = '50000'; // max_size in kb
                                $name = $name."_".$dtype;
                                $config['file_name'] = $name;
                       
                                //Load upload library
                                $this->load->library('upload',$config); 
                       
                                // File upload
                                if($this->upload->do_upload('updatefile')){
                                  // Get data about the file
                                  $uploadData = $this->upload->data();
                                  $filename = $uploadData['file_name'];

                                  $this->Upload_model->admin_update($studid,$updfield,$filename);

                                  $this->admin_view_documents($studid);

                                } //if($this->upload->do_upload('file'))
                              
                                  
                              } //!empty($_FILES['updatefile']['name'])

                              else{

                                $this->session->set_flashdata('error', 'No File Selected to upload');

                                $this->admin_view_documents($studid);
                              }
        } else{

          redirect('adminlogin');
        }

    }

    public function admin_view_documents($stud_id){

      if($this->session->userdata('admin_login')=='true'){

           // $this->load->model('Upload_model');
           $this->load->model('Sop_model');

          $data['docs'] = $this->Sop_model->get_docs($stud_id);
          $data['student'] = $this->Sop_model->view_student(); 

          $this->load->view('header');
          // $this->load->view('sidebar');
          $this->load->view('view_uploaded_doc',$data);
          $this->load->view('footer');

        } else{

            redirect('adminlogin');
          }


    }//function


    public function veronica_ques(){

      if($this->session->userdata('admin_login')=='true'){

          $this->load->model('Upload_model');
          $data['ver_ques']=$this->Upload_model->get_veronica_ques();
          $this->load->view('header');
          $this->load->view('add_veronica_questions',$data);
          $this->load->view('footer');

      } else{

            redirect('adminlogin');
          }
    }

    public function veronica_insert_ques(){

      if($this->session->userdata('admin_login')=='true'){

          $this->load->model('Upload_model');

          $ques = strtolower(trim($this->input->post('question')));

          $answer = $this->input->post('answer');

          $action = $this->input->post('action');

          if($action=="media"){

             if(!empty($_FILES['fileToUpload']['name'])){
                
              $filename = $this->upload_ver_file();

              if($filename=='false'){

                $this->session->set_flashdata('error', 'File Not Uploaded please try again');
                        redirect('ver_ques');

              } else{

                $data=$this->Upload_model->insert_ver_ques($ques,$answer,$action,$filename);
              }

            
            } else{
                $this->session->set_flashdata('error', 'Please upload file and try again ');
                        redirect('ver_ques');
            }

          } else{

            $data=$this->Upload_model->insert_veronica_ques($ques,$answer,$action);
          }

          redirect('ver_ques');
          
          
      } else{

            redirect('adminlogin');
          }
    }


    public function veronica_edit_ques(){

      if($this->session->userdata('admin_login')=='true'){

          $this->load->model('Upload_model');

          $id = $this->input->post('edit_id');

          $ques = strtolower(trim($this->input->post('question')));

          $answer = $this->input->post('answer');

          $action = $this->input->post('action');

          if($action=="media"){

             if(!empty($_FILES['fileToUpload']['name'])){
                
              $filename = $this->upload_ver_file();

              if($filename=='false'){

                $this->session->set_flashdata('error', 'File Not Uploaded please try again');
                        redirect('ver_ques');

              } else{

                $data=$this->Upload_model->update_ver_ques($id,$ques,$answer,$action,$filename);
              }

            
            } else{
                
                $data=$this->Upload_model->update_veronica_ques($id,$ques,$answer,$action);
            }

          } else{

            $data=$this->Upload_model->update_veronica_ques($id,$ques,$answer,$action);
          }

          redirect('ver_ques');
          
          
      } else{

            redirect('adminlogin');
          }
    }



    public function veronica_chat_history(){

      if($this->session->userdata('admin_login')=='true'){

          $this->load->model('Sop_model');

          $data['student'] = $this->Sop_model->view_student();
          $data['chats'] = ""; 

         $this->load->view('header');
         $this->load->view('view_chat_history',$data);
         $this->load->view('footer');

      } else{

            redirect('adminlogin');
          }
    }


    public function view_chat_history(){

      if($this->session->userdata('admin_login')=='true'){

          $this->load->model('Sop_model');

          $stud_id = $this->input->post('student_name');

          $data['chats'] = $this->Sop_model->get_chats($stud_id);
          $data['student'] = $this->Sop_model->view_student(); 

         $this->load->view('header');
         $this->load->view('view_chat_history',$data);
         $this->load->view('footer');

      } else{

            redirect('adminlogin');
          }
    }



    public function upload_ver_file(){

        // Set preference
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|rar|zip';
        $config['max_size'] = '50000'; // max_size in kb
        $config['overwrite'] = TRUE; 
                          
        //Load upload library
        $this->load->library('upload',$config); 

        // File upload
        if($this->upload->do_upload('fileToUpload')){
          // Get data about the file
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            return $filename;

          } else{

            return 'false';
          
          }

    }//function

} //class
    
