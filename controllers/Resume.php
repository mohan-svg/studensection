<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');

class Resume extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Resume_model');
    $this->load->library('pdf');
  }
	
    	public function index()
      {
          if($this->session->userdata('admin_login')=='true'){

              if($this->session->has_userdata('resume_id')){

                $html_content = $this->resume_template();
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->set_option('defaultFont', 'Cambria');
                $this->pdf->loadHtml($html_content);
                $this->pdf->render();
                $this->pdf->stream("".$this->session->userdata('student_name').rand(1,999).".pdf",array("Attachment"=>1)); //1 -> for download

             } else{
                 $this->session->set_flashdata('error',"No Resume Found for PDF Conversion");
                 redirect('view_resume');
              }
            

         } else{

            redirect('adminlogin');
         }
        
      }

      function convert_to_word(){
        if($this->session->userdata('admin_login')=='true'){

          if($this->session->has_userdata('resume_id')){
              $this->load->library('doc');
              $html_content = $this->word_data1();
              $this->doc->createDoc($html_content,$this->session->userdata('student_name'),true);
          } else{
             $this->session->set_flashdata('error',"No Resume Found for Word Conversion");
             redirect('view_resume');
          }
            

         } else{

            redirect('adminlogin');
         }
      }
        
      function resume_page(){

         if($this->session->userdata('admin_login')=='true'){
          
            $this->load->view('header');
            $this->load->view('resume_page');
            $this->load->view('footer');

         } else{

          redirect('adminlogin');
         }

      }

      function view_student_resume(){

         if($this->session->userdata('admin_login')=='true'){

           if($this->input->post('resume_id')==''){              
              

           } else{
              $this->destroy_resume_session();

              $data['resume']= $this->Resume_model->get_resume_by_id($this->input->post('resume_id'));
               $data['education']= $this->Resume_model->get_education_data_by_resume_id($this->input->post('resume_id'));
               $data['work_exp']= $this->Resume_model->get_work_exp_by_resume_id($this->input->post('resume_id'));
               $data['internship']= $this->Resume_model->get_internship_by_resume_id($this->input->post('resume_id'));
               $data['project']= $this->Resume_model->get_project_by_resume_id($this->input->post('resume_id'));

               $this->create_resume_session($this->input->post('resume_id'),$data['resume']->student_name);
           }

            $data['student'] = $this->Resume_model->get_student_name_from_resume();

            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache");
            $this->load->view('header');
            $this->load->view('search_resume',$data);
            $this->load->view('footer');

         } else{

          redirect('adminlogin');
         }

      }

      function view_single_resume(){
        if($this->session->userdata('admin_login')=='true'){
              $this->destroy_resume_session();
               $resume_id = $this->uri->segment(2);

               $data['resume']= $this->Resume_model->get_resume_by_id($resume_id);
               $data['education']= $this->Resume_model->get_education_data_by_resume_id($resume_id);
               $data['work_exp']= $this->Resume_model->get_work_exp_by_resume_id($resume_id);
               $data['internship']= $this->Resume_model->get_internship_by_resume_id($resume_id);
               $data['project']= $this->Resume_model->get_project_by_resume_id($resume_id);
               $this->create_resume_session($resume_id,$data['resume']->student_name);

                $this->load->view('header');
                $this->load->view('view_one_resume',$data);
                $this->load->view('footer');

        } else{

          redirect('adminlogin');
         }

      }

       function edit_single_resume(){
        if($this->session->userdata('admin_login')=='true'){
              $this->destroy_resume_session();
               $resume_id = $this->uri->segment(2);

               $data['resume']= $this->Resume_model->get_resume_by_id($resume_id);
               
               $this->create_resume_session($resume_id,$data['resume']->student_name);
               redirect('create_resume');

        } else{

          redirect('adminlogin');
         }

      }



      function destroy_resume_session(){
        $this->session->unset_userdata('resume_id');
        $this->session->unset_userdata('student_name');
        return true;
      }

      function create_resume_session($resume_id,$student_name){
        $this->session->set_userdata('resume_id',$resume_id);
        $this->session->set_userdata('student_name',$student_name);
        return true;

      }

      function destroy_redirect(){
        $this->session->unset_userdata('resume_id');
        $this->session->unset_userdata('student_name');
        redirect('create_resume');
      }

      function create_resumes(){

        if($this->session->userdata('admin_login')=='true'){

          if($this->session->has_userdata('resume_id')):

            $data['resume'] = $this->Resume_model->get_resume_by_id($this->session->userdata('resume_id'));

            $this->load->view('header');
            $this->load->view('resume_creator',$data);
            $this->load->view('footer');

          else:
            $this->load->view('header');
            $this->load->view('resume_creator');
            $this->load->view('footer');

          endif;  

        } else{

          redirect('adminlogin');
         }
      }

      function education_details(){

        if($this->session->userdata('admin_login')=='true'){
            // if($this->session->has_userdata('resume_id')){
              $data['education'] = $this->Resume_model->get_education_data_by_resume_id($this->session->userdata('resume_id'));
              //}
            
            $this->load->view('header');
            $this->load->view('educational_detail',$data);
            $this->load->view('footer');

        } else{

          redirect('adminlogin');
         }
      }

      function work_exp_details(){

        if($this->session->userdata('admin_login')=='true'){

            $data['work_exp'] = $this->Resume_model->get_work_exp_by_resume_id($this->session->userdata('resume_id'));
            $data['internship'] = $this->Resume_model->get_internship_by_resume_id($this->session->userdata('resume_id'));
            $this->load->view('header');
            $this->load->view('work_exp',$data);
            $this->load->view('footer');

        } else{

          redirect('adminlogin');
         }
      }

      function academic_project(){

        if($this->session->userdata('admin_login')=='true'){

            $data['academic_proj'] = $this->Resume_model->get_project_by_resume_id($this->session->userdata('resume_id'));
            $this->load->view('header');
            $this->load->view('academic_proj',$data);
            $this->load->view('footer');

        } else{

          redirect('adminlogin');
         }
      }

      function technical_skills(){

        if($this->session->userdata('admin_login')=='true'){
            $data['resume']= $this->Resume_model->get_resume_by_id($this->session->userdata('resume_id'));
            $this->load->view('header');
            $this->load->view('technical_skills',$data);
            $this->load->view('footer');

        } else{

          redirect('adminlogin');
         }
      }

     

      function add_personal_details(){
        if($this->session->userdata('admin_login')=='true'){
            
            $query = $this->Resume_model->insert_personal_detail();

            if($query!=false){
              
              $this->create_resume_session($query,$this->input->post('stud_name'));
              $this->session->set_flashdata('success','Personal Details added Successfully');
              redirect('education');
            } else{
              $this->session->set_flashdata('error','Error while adding details, Please try again');
              redirect('create_resume');
            }

        } else{

          redirect('adminlogin');
         }

      }
      
      function add_education_details(){
        if($this->session->userdata('admin_login')=='true'){
            $query = $this->Resume_model->insert_education_detail($this->session->userdata('resume_id'));

            if($query){
              $this->session->set_flashdata('success','Education Details added Successfully');
              redirect('education');
            } else{
              $this->session->set_flashdata('error','Error while adding details, Please try again');
              redirect('education');
            }

         } else{

            redirect('adminlogin');
         }

      }
       
       function add_work_exp_details(){
          if($this->session->userdata('admin_login')=='true'){

              if($this->input->post('exp_type')=='full_time'):

                   $query = $this->Resume_model->insert_experience($this->session->userdata('resume_id')); 

                   if($query):
                      $this->session->set_flashdata('success','Work Experience Added Successfully');
                   else:
                      $this->session->set_flashdata('error','Error while adding work experience, Please Try Again');
                   endif;

                   redirect('work_exp');

              elseif($this->input->post('exp_type')=='internship'):

                  $query = $this->Resume_model->insert_internship($this->session->userdata('resume_id')); 

                   if($query):
                      $this->session->set_flashdata('success','Internship Data Added Successfully');
                   else:
                      $this->session->set_flashdata('error','Error while adding Internship Data, Please Try Again');
                   endif;

                   redirect('work_exp');

              endif;

              

         } else{

          redirect('adminlogin');
         }
      }


      function add_academic_project(){
          if($this->session->userdata('admin_login')=='true'){

              $query = $this->Resume_model->insert_proj_details($this->session->userdata('resume_id'));

              if($query):
                  $this->session->set_flashdata('success','Project Data Added Successfully');
               else:
                  $this->session->set_flashdata('error','Error while adding Project Data, Please Try Again');
               endif;

               redirect('academic_proj');

         } else{

          redirect('adminlogin');
         }
      } 

      function add_other_details(){
          if($this->session->userdata('admin_login')=='true'){

              $query = $this->Resume_model->update_resume_to_add_activities($this->session->userdata('resume_id'));

              if($query):
                  $this->session->set_flashdata('success','Added Successfully');

                  if($this->input->post('submit')=='Previous'):
                      redirect('academic_proj');
                  else:
                      redirect('view_resume');
                  endif;
               else:
                  $this->session->set_flashdata('error','Error while adding Data, Please Try Again');
                  redirect('technical_skills');
               endif;


         } else{

          redirect('adminlogin');
         }
      }

      function view_created_resume(){
          if($this->session->userdata('admin_login')=='true'){

             $data['resume']= $this->Resume_model->get_resume_by_id($this->session->userdata('resume_id'));
             $data['education']= $this->Resume_model->get_education_data_by_resume_id($this->session->userdata('resume_id'));
             $data['work_exp']= $this->Resume_model->get_work_exp_by_resume_id($this->session->userdata('resume_id'));
             $data['internship']= $this->Resume_model->get_internship_by_resume_id($this->session->userdata('resume_id'));
             $data['project']= $this->Resume_model->get_project_by_resume_id($this->session->userdata('resume_id'));
              $this->load->view('header');
              $this->load->view('view_resume_html',$data);
              $this->load->view('footer');

         } else{

              redirect('adminlogin');
         }
      }

      //updating resume

      function update_personal_details(){
          if($this->session->userdata('admin_login')=='true'){
            
            $query = $this->Resume_model->update_personal_detail();

            if($query!=false){
              
                $this->session->set_flashdata('success','Personal Details Updated Successfully');
              redirect('education');
            } else{
                $this->session->set_flashdata('error','Error while Updating details, Please try again');
              redirect('create_resume');
            }

        } else{

          redirect('adminlogin');
         }
      }

      function update_education_details(){

          if($this->session->userdata('admin_login')=='true'){
            $query = $this->Resume_model->update_education_detail($this->input->post('education_id'));

            if($query){
              $this->session->set_flashdata('success','Education Details Updated Successfully');
              redirect('education');
            } else{
              $this->session->set_flashdata('error','Error while updating details, Please try again');
              redirect('education');
            }

         } else{

            redirect('adminlogin');
         }
        
      }

      function update_work_exp_details(){
          
             if($this->session->userdata('admin_login')=='true'){
                $query = $this->Resume_model->update_work_exp($this->input->post('exp_id'));

                if($query){
                    $this->session->set_flashdata('success','Work Experience Details Updated Successfully');
                    redirect('work_exp');
                } else{
                    $this->session->set_flashdata('error','Error while updating details, Please try again');
                    redirect('work_exp');
                }

           } else{

              redirect('adminlogin');
           }
      }

      function update_internship_details(){
          
             if($this->session->userdata('admin_login')=='true'){
                $query = $this->Resume_model->update_internship($this->input->post('internship_id'));

                if($query){
                    $this->session->set_flashdata('success','Internship Details Updated Successfully');
                    redirect('work_exp');
                } else{
                    $this->session->set_flashdata('error','Error while updating details, Please try again');
                    redirect('work_exp');
                }

           } else{

              redirect('adminlogin');
           }
      }

      function update_project_details(){
          
          if($this->session->userdata('admin_login')=='true'){
                $query = $this->Resume_model->update_academic_proj($this->input->post('proj_id'));

                if($query){
                    $this->session->set_flashdata('success','Project Details Updated Successfully');
                    redirect('academic_proj');
                } else{
                    $this->session->set_flashdata('error','Error while updating details, Please try again');
                    redirect('academic_proj');
                }

           } else{

              redirect('adminlogin');
           }
      }
    


      //deleting functions 

      function delete_education_details(){
          
        if($this->session->userdata('admin_login')=='true'){
            $query = $this->Resume_model->delete_education_detail($this->input->post('education_id'));

            if($query){
              $this->session->set_flashdata('success','Education Details Deleted Successfully');
              redirect('education');
            } else{
              $this->session->set_flashdata('error','Error while Deleting details, Please try again');
              redirect('education');
            }

         } else{

            redirect('adminlogin');
         }
          
      }

      function delete_work_exp_details(){
          
        if($this->session->userdata('admin_login')=='true'){
            $query = $this->Resume_model->delete_work_exp($this->input->post('exp_id'));

            if($query){
              $this->session->set_flashdata('success','Work Experience Deleted Successfully');
              redirect('work_exp');
            } else{
              $this->session->set_flashdata('error','Error while Deleting Work Experience, Please try again');
              redirect('work_exp');
            }

         } else{

            redirect('adminlogin');
         }
          
      }


      function delete_internship_details(){
          
        if($this->session->userdata('admin_login')=='true'){
            $query = $this->Resume_model->delete_internship($this->input->post('internship_id'));

            if($query){
              $this->session->set_flashdata('success','Internship Deleted Successfully');
              redirect('work_exp');
            } else{
              $this->session->set_flashdata('error','Error while Deleting Internship, Please try again');
              redirect('work_exp');
            }

         } else{

            redirect('adminlogin');
         }
          
      }

      function delete_project_details(){
          
        if($this->session->userdata('admin_login')=='true'){
            $query = $this->Resume_model->delete_project($this->input->post('proj_id'));

            if($query){
              $this->session->set_flashdata('success','Project Details Deleted Successfully');
              redirect('academic_proj');
            } else{
              $this->session->set_flashdata('error','Error while Deleting details, Please try again');
              redirect('academic_proj');
            }

         } else{

            redirect('adminlogin');
         }
          
      }

      function delete_resume_data(){

          if($this->session->userdata('admin_login')=='true'){
                $query = $this->Resume_model->delete_resume_by_id($this->input->post('resume_id'));
                $this->Resume_model->delete_project_by_resume_id($this->input->post('resume_id'));
                $this->Resume_model->delete_internship_by_resume_id($this->input->post('resume_id'));
                $this->Resume_model->delete_work_exp_by_resume_id($this->input->post('resume_id'));
                $this->Resume_model->delete_education_detail_by_resume_id($this->input->post('resume_id'));

            if($query){
                $this->session->set_flashdata('success','Resume Deleted Successfully');
                redirect('view_all_resume');
            } else{
                $this->session->set_flashdata('error','Error while Deleting Resume, Please try again');
                redirect('view_all_resume');
            }

         } else{

            redirect('adminlogin');
         }
      }

      function view_all_resume(){
        if($this->session->userdata('admin_login')=='true'){

            $this->destroy_resume_session();
            
            $data['all_resume'] = $this->Resume_model->get_all_resume();
            $this->load->view('header');
            $this->load->view('view_all_resume_data',$data);
            $this->load->view('footer');

         } else{

            redirect('adminlogin');
         }
      }

      function resume_template(){
      	
          if($this->session->userdata('admin_login')=='true'){

             $resume= $this->Resume_model->get_resume_by_id($this->session->userdata('resume_id'));
             $education= $this->Resume_model->get_education_data_by_resume_id($this->session->userdata('resume_id'));
             $work_exp= $this->Resume_model->get_work_exp_by_resume_id($this->session->userdata('resume_id'));
             $internship= $this->Resume_model->get_internship_by_resume_id($this->session->userdata('resume_id'));
             $project= $this->Resume_model->get_project_by_resume_id($this->session->userdata('resume_id'));
              
             $output ='<table style="width: 700px;">
                              <tr style="width: 100%">
                                <td width="45%">                                    

                                    <h3><strong>'.$resume->student_name.'</strong></h3>
                                    <p>'.$resume->address_line1.'</p>  
                                    <p>'.$resume->address_line2.'</p>
                                    <p>'.$resume->city.' - '.$resume->zipcode.'</p>
                                    <p>'.$resume->state.', India'.'</p>                                        
                                </td>
                                <td style="text-align: right">
                                    <p>'.$resume->contact_no.'</p>
                                    <p>'.$resume->email_id.'</p>
                                </td>
                              </tr>

                              <tr class="sub-heading">
                                  <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                    <strong >EDUCATION</strong>
                                  </td>                    
                              </tr>';

            foreach($education as $key => $val):

	                if(($val["education_level"]=="Higher Secondary Education") || ($val["education_level"]=="Secondary School Education")): 

	                     $output.= '<tr style="width: 100%">
	                                          <td width="65%">
	                                              <div class="" style="margin-top: 20px;">'. $val['college_board'] .'</div>
	                                              <div><strong>'.$val['education_level'] .'</strong></div>
	                                          </td>   
	                                          <td style="text-align: right;">
	                                              <div style="margin-top: 20px;"><strong>'. $val['duration']. '</strong></div>
	                                              <div><strong>'."GPA: ".$val['cgpa'] .'</strong></div>
	                                          </td>                 
	                                      </tr>';

	                else:

                         $output.= '<tr style="width: 100%">
                                          <td width="65%">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['college_board'] .'</strong></div>
                                              <div><strong>'.$val['degree_name'].' , '.$val['major'].'</strong></div>
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'. $val['duration'] .'</strong></div>
                                              <div><strong>'."GPA: ".$val['cgpa'] .'</strong></div>
                                          </td>                 
                                      </tr>';

                    endif;
                                 
            endforeach;    
                              
            if(!empty($work_exp)):
                        $output.= '<tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <div style="margin-top: 20px;"><strong>EXPERIENCE</strong></div>
                                      </td>                    
                                  </tr>';

                        foreach($work_exp as $key => $val):
                            $output.= '<tr style="width: 100%">
                                          <td width="66%">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['company_name'].'</strong></div>
                                              <div><strong>'.$val['position'] .'</strong></div>
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'.$val['duration'].'</strong></div>
                                              
                                          </td>                 
                                      </tr>

                                      <tr>
                                        <td colspan="2" style="text-align: justify;">'.
                                          $val['description'].'
                                        </td>
                                      </tr>';
                        endforeach;  
            endif;

            if(!empty($internship)):
                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <div style="margin-top: 20px;"><strong>INTERNSHIP</strong></div>
                                      </td>                    
                                  </tr>';
                    foreach($internship as $key => $val):
                            $output.= '<tr style="width: 100%">
                                          <td width="66%">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['company_name'] .'</strong></div>                                              
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'.$val['duration'] .'</strong></div>
                                             
                                          </td>                 
                                      </tr>

                                      <tr>
                                        <td colspan="2" style="text-align: justify;">
                                          '. $val['description'] .
                                        '</td>
                                      </tr>';
                    endforeach;  
            endif;

            if(!empty($project)):
                    $output.= '<tr class="sub-heading">
                                        <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                          <div style="margin-top: 20px;">
                                            <strong>ACADEMIC PROJECTS</strong>
                                          </div>
                                        </td>                    
                                    </tr>';
                        foreach($project as $key => $val):
                            $output.='<tr style="width: 100%">
                                            <td width="66%">
                                                <div class="" style="margin-top: 20px;"><strong>'. $val['proj_title'] .'</strong></div>
                                                <div><strong>'.$val['proj_subtitle'] .'</strong></div>
                                            </td>   
                                            <td style="text-align: right;">
                                                <div style="margin-top: 20px;"><strong>'.$val['duration'] .'</strong></div>
                                                
                                            </td>                 
                                        </tr>

                                        <tr>
                                          <td colspan="2" style="text-align:justify">
                                              '.$val['description']
                                          .'</td>
                                        </tr>';

                        endforeach;  
            endif;

            if(($resume->activities !="") && ($resume->achievement !="")):
                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                          <div style="margin-top: 20px;">
                                              <strong>ACTIVITIES & ACHIEVEMENTS</strong>
                                          </div>
                                      </td>                    
                                  </tr>

                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align:justify">
                                          '.$resume->achievement.
                                             $resume->activities
                                      .'</div>
                                    </td>
                                  </tr>';
            endif;

            if($resume->technical_skills !=""):

                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <strong>TECHNICAL SKILLS</strong>
                                      </td>                    
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align:justify">'.
                                        $resume->technical_skills
                                      .'</div>
                                    </td>
                                  </tr>';
            endif;
            
            if($resume->hobbies !=""):    
                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%; border-bottom: 1px solid #000" colspan="2">
                                        <strong>HOBBIES</strong>
                                      </td>                    
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align:justify">'.
                                        $resume->hobbies
                                      .'</div>
                                    </td>
                                  </tr>';
            endif;
                                  
          	$output.= '</table> ';

             return $output;
         } else{

              redirect('adminlogin');
         }
      }




      function word_data(){
        
          if($this->session->userdata('admin_login')=='true'){

             $resume= $this->Resume_model->get_resume_by_id($this->session->userdata('resume_id'));
             $education= $this->Resume_model->get_education_data_by_resume_id($this->session->userdata('resume_id'));
             $work_exp= $this->Resume_model->get_work_exp_by_resume_id($this->session->userdata('resume_id'));
             $internship= $this->Resume_model->get_internship_by_resume_id($this->session->userdata('resume_id'));
             $project= $this->Resume_model->get_project_by_resume_id($this->session->userdata('resume_id'));
              
             $output ='<div style="width: 600px;">
                              <div style="width: 600px">
                                <div style="width:350px; float:left;">                                   

                                    <h3><strong>'.$resume->student_name.'</strong></h3>
                                    <p>'.$resume->address_line1.'</p>  
                                    <p>'.$resume->address_line2.'</p>
                                    <p>'.$resume->city.' - '.$resume->zipcode.'</p>
                                    <p>'.$resume->state.', India'.'</p>   
                                </div>
                                <div style="width:150px; float:right; text-align: right">
                                    <p>'.$resume->contact_no.'</p>
                                    <p>'.$resume->email_id.'</p>
                                </div>
                                <div style="clear:both;"></div>
                              </div>

                              <div class="sub-heading">
                                  <div style="width: 600px; border-bottom: 1px solid #000">
                                    <strong >EDUCATION</strong>
                                  </div>                    
                              </div>';

            foreach($education as $key => $val):

                  if(($val["education_level"]=="Higher Secondary Education") || ($val["education_level"]=="Secondary School Education")): 

                       $output.= '<div style="width: 100%" padding: 96px>
                                          <div style="width: 60%; display: inline-block;">
                                                <div class="" style="margin-top: 20px;">'. $val['college_board'] .'</div>
                                                <div><strong>'.$val['education_level'] .'</strong></div>
                                            </div>   
                                          <div style="width: 30%; display: inline-block; text-align: right;">
                                                <div style="margin-top: 20px;"><strong>'. $val['duration']. '</strong></div>
                                                <div><strong>'."GPA: ".$val['cgpa'] .'</strong></div>
                                            </div>                 
                                      </div>';

                  else:

                         $output.= '<div style="width: 100%">
                                          <div style="width: 60%; display: inline-block;">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['college_board'] .'</strong></div>
                                              <div><strong>'.$val['degree_name'].' , '.$val['major'].'</strong></div>
                                          </div>   
                                          <div style="width: 32%; display: inline-block; text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'. $val['duration'] .'</strong></div>
                                              <div><strong>'."GPA: ".$val['cgpa'] .'</strong></div>
                                          </div>                 
                                      </div>';

                    endif;
                                 
            endforeach;    
                              
            if(!empty($work_exp)):
                        $output.= '<div class="sub-heading">
                                      <div style="width: 100%; border-bottom: 1px solid #000">
                                        <div style="margin-top: 20px;"><strong>EXPERIENCE</strong></div>
                                      </div>                    
                                  </div>';

                        foreach($work_exp as $key => $val):
                            $output.= '<div style="width: 100%">
                                          <div style="width: 65%; display: inline-block;">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['company_name'].'</strong></div>
                                              <div><strong>'.$val['position'] .'</strong></div>
                                          </div>   
                                          <div style="width: 32%; display: inline-block; text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'.$val['duration'].'</strong></div>
                                              
                                          </div>                 
                                      </div>

                                      <div>
                                        <div style="width:100%" style="text-align: justify;">'.
                                          $val['description'].'
                                        </div>
                                      </div>';
                        endforeach;  
            endif;

            if(!empty($internship)):
                    $output.='<div class="sub-heading">
                                      <div style="width: 100%; border-bottom: 1px solid #000">
                                        <div style="margin-top: 20px;"><strong>INTERNSHIP</strong></div>
                                      </div>                    
                                  </div>';
                    foreach($internship as $key => $val):
                            $output.= '<div style="width: 100%">
                                          <div style="width: 65%; display: inline-block;">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['company_name'] .'</strong></div>                                              
                                          </div>   
                                          <div style="width: 32%; display: inline-block; text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'.$val['duration'] .'</strong></div>
                                             
                                          </div>                 
                                      </div>

                                      <div>
                                        <div style="width:100%; text-align: justify;">
                                          '. $val['description'] .
                                        '</div>
                                      </div>';
                    endforeach;  
            endif;

            if(!empty($project)):
                    $output.= '<div class="sub-heading">
                                        <div style="width: 100%; border-bottom: 1px solid #000">
                                          <div style="margin-top: 20px;">
                                            <strong>ACADEMIC PROJECTS</strong>
                                          </div>
                                        </div>                    
                                    </div>';
                        foreach($project as $key => $val):
                            $output.='<div style="width: 100%">
                                            <div style="width: 65%; display: inline-block;">
                                                <div class="" style="margin-top: 20px;"><strong>'. $val['proj_title'] .'</strong></div>
                                                <div><strong>'.$val['proj_subtitle'] .'</strong></div>
                                            </div>   
                                            <div style="width: 32%; display: inline-block; text-align: right;">
                                                <div style="margin-top: 20px;"><strong>'.$val['duration'] .'</strong></div>
                                                
                                            </div>                 
                                        </div>

                                        <div>
                                          <div style="width:100%; text-align: justify;">
                                              '.$val['description']
                                          .'</div>
                                        </div>';

                        endforeach;  
            endif;

            if(($resume->activities !="") && ($resume->achievement !="")):
                    $output.='<div class="sub-heading">
                                      <div style="width: 100%; border-bottom: 1px solid #000">
                                          <div style="margin-top: 20px;">
                                              <strong>ACTIVITIES & ACHIEVEMENTS</strong>
                                          </div>
                                      </div>                    
                                  </div>

                                  <div>
                                    <div style="width:100%">
                                      <div style="margin-top: 20px; text-align:justify">
                                          '.$resume->achievement.
                                             $resume->activities
                                      .'</div>
                                    </div>
                                  </div>';
            endif;

            if($resume->technical_skills !=""):

                    $output.='<div class="sub-heading">
                                      <div style="width: 100%; border-bottom: 1px solid #000">
                                        <strong>TECHNICAL SKILLS</strong>
                                      </div>                    
                                  </div>
                                  <div>
                                    <div style="width: 100%">
                                      <div style="margin-top: 20px; text-align:justify">'.
                                        $resume->technical_skills
                                      .'</div>
                                    </div>
                                  </div>';
            endif;
            
            if($resume->hobbies !=""):    
                    $output.='<div class="sub-heading">
                                      <div style="width: 100%; border-bottom: 1px solid #000">
                                        <strong>HOBBIES</strong>
                                      </div>
                                  <div>
                                    <div style="width:100%">
                                      <div style="margin-top: 20px; text-align:justify">'.
                                        $resume->hobbies
                                      .'</div>
                                    </div>
                                  </div>';
            endif;
                                  
            $output.= '</div> ';

             return $output;
         } else{

              redirect('adminlogin');
         }
      }

       function word_data1(){
        
          if($this->session->userdata('admin_login')=='true'){

             $resume= $this->Resume_model->get_resume_by_id($this->session->userdata('resume_id'));
             $education= $this->Resume_model->get_education_data_by_resume_id($this->session->userdata('resume_id'));
             $work_exp= $this->Resume_model->get_work_exp_by_resume_id($this->session->userdata('resume_id'));
             $internship= $this->Resume_model->get_internship_by_resume_id($this->session->userdata('resume_id'));
             $project= $this->Resume_model->get_project_by_resume_id($this->session->userdata('resume_id'));
              
              $output ='<table style="margin:10px;">
                              <tr style="width: 100%">
                                <td width="50%">                                    

                                    <h3><strong>'.$resume->student_name.'</strong></h3>
                                    <p>'.$resume->address_line1.'</p>  
                                    <p>'.$resume->address_line2.'</p>
                                    <p>'.$resume->city.' - '.$resume->zipcode.'</p>
                                    <p>'.$resume->state.', India'.'</p>                                        
                                </td>
                                <td style="text-align: right">
                                    <p>'.$resume->contact_no.'</p>
                                    <p>'.$resume->email_id.'</p>
                                </td>
                              </tr>

                              <tr class="sub-heading">
                                  <td width="100%" colspan="2">
                                    <div style="margin-top: 20px; border-bottom: 1px solid #000"><strong >EDUCATION</strong></div>
                                  </td>                    
                              </tr>';

            foreach($education as $key => $val):

                  if(($val["education_level"]=="Higher Secondary Education") || ($val["education_level"]=="Secondary School Education")): 

                       $output.= '<tr style="width: 100%">
                                            <td width="65%">
                                                <div class="" style="margin-top: 20px;">'. $val['college_board'] .'</div>
                                                <div><strong>'.$val['education_level'] .'</strong></div>
                                            </td>   
                                            <td style="text-align: right;">
                                                <div style="margin-top: 20px;"><strong>'. $val['duration']. '</strong></div>
                                                <div><strong>'."GPA: ".$val['cgpa'] .'</strong></div>
                                            </td>                 
                                        </tr>';

                  else:

                         $output.= '<tr style="width: 100%">
                                          <td width="65%">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['college_board'] .'</strong></div>
                                              <div><strong>'.$val['degree_name'].' , '.$val['major'].'</strong></div>
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'. $val['duration'] .'</strong></div>
                                              <div><strong>'."GPA: ".$val['cgpa'] .'</strong></div>
                                          </td>                 
                                      </tr>';

                    endif;
                                 
            endforeach;    
                              
            if(!empty($work_exp)):
                        $output.= '<tr class="sub-heading">
                                      <td style="width: 100%;" colspan="2">
                                        <div style="margin-top: 20px; border-bottom: 1px solid #000"><strong>EXPERIENCE</strong></div>
                                      </td>                    
                                  </tr>';

                        foreach($work_exp as $key => $val):
                            $output.= '<tr style="width: 100%">
                                          <td width="66%">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['company_name'].'</strong></div>
                                              <div><strong>'.$val['position'] .'</strong></div>
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'.$val['duration'].'</strong></div>
                                              
                                          </td>                 
                                      </tr>

                                      <tr>
                                        <td colspan="2" style="text-align: justify;">'.
                                          $val['description'].'
                                        </td>
                                      </tr>';
                        endforeach;  
            endif;

            if(!empty($internship)):
                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%;" colspan="2">
                                        <div style="margin-top: 20px; border-bottom: 1px solid #000"><strong>INTERNSHIP</strong></div>
                                      </td>                    
                                  </tr>';
                    foreach($internship as $key => $val):
                            $output.= '<tr style="width: 100%">
                                          <td width="66%">
                                              <div class="" style="margin-top: 20px;"><strong>'.$val['company_name'] .'</strong></div>                                              
                                          </td>   
                                          <td style="text-align: right;">
                                              <div style="margin-top: 20px;"><strong>'.$val['duration'] .'</strong></div>
                                             
                                          </td>                 
                                      </tr>

                                      <tr>
                                        <td colspan="2" style="text-align: justify;">
                                          '. $val['description'] .
                                        '</td>
                                      </tr>';
                    endforeach;  
            endif;

            if(!empty($project)):
                    $output.= '<tr class="sub-heading">
                                        <td style="width: 100%; " colspan="2">
                                          <div style="margin-top: 20px; border-bottom: 1px solid #000">
                                            <strong>ACADEMIC PROJECTS</strong>
                                          </div>
                                        </td>                    
                                    </tr>';
                        foreach($project as $key => $val):
                            $output.='<tr style="width: 100%">
                                            <td width="66%">
                                                <div class="" style="margin-top: 20px;"><strong>'. $val['proj_title'] .'</strong></div>
                                                <div><strong>'.$val['proj_subtitle'] .'</strong></div>
                                            </td>   
                                            <td style="text-align: right;">
                                                <div style="margin-top: 20px;"><strong>'.$val['duration'] .'</strong></div>
                                                
                                            </td>                 
                                        </tr>

                                        <tr>
                                          <td colspan="2" style="text-align:justify">
                                              '.$val['description']
                                          .'</td>
                                        </tr>';

                        endforeach;  
            endif;

            if(($resume->activities !="") && ($resume->achievement !="")):
                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%; " colspan="2">
                                          <div style="margin-top: 20px; border-bottom: 1px solid #000">
                                              <strong>ACTIVITIES & ACHIEVEMENTS</strong>
                                          </div>
                                      </td>                    
                                  </tr>

                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align:justify">
                                          '.$resume->achievement.
                                             $resume->activities
                                      .'</div>
                                    </td>
                                  </tr>';
            endif;

            if($resume->technical_skills !=""):

                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%;" colspan="2">
                                          <div style="border-bottom: 1px solid #000"> <strong>TECHNICAL SKILLS</strong></div>
                                      </td>                    
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align:justify">'.
                                        $resume->technical_skills
                                      .'</div>
                                    </td>
                                  </tr>';
            endif;
            
            if($resume->hobbies !=""):    
                    $output.='<tr class="sub-heading">
                                      <td style="width: 100%;" colspan="2">
                                        <div style="border-bottom: 1px solid #000"><strong>HOBBIES</strong></div>
                                      </td>                    
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <div style="margin-top: 20px; text-align:justify">'.
                                        $resume->hobbies
                                      .'</div>
                                    </td>
                                  </tr>';
            endif;
                                  
            $output.= '</table> ';

            return $output;
         } else{

              redirect('adminlogin');
         }
      }
   
      

} //class
    
