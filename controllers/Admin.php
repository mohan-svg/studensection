<?php
ini_set('max_execution_time', 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('adminlogin');
	}


	public function adminlogincheck()
	{

        $this->form_validation->set_rules('username','Username ','required');
        $this->form_validation->set_rules('password','Password ','required');
       
            if($this->form_validation->run()){

                $adminname=$this->input->post('username');
                $adminpswd=$this->input->post('password');
               
                //loading model
                $this->load->model('Student_model');
                $this->Student_model->loginadmin($adminname,$adminpswd);

            } else {

                    $this->session->set_flashdata('error', 'Please check your Input value!!');
                 	
                    $this->load->view('adminlogin');
                
            }
		
    }

    //Admin

public function studentregister()
{
    if($this->session->userdata('admin_login')=='true'){

        $this->load->model('Student_model');

        $data['student']=$this->Student_model->get_student_data();

        $this->load->view('header');
        $this->load->view('studentregister',$data);
        $this->load->view('footer');

    }
    else{

        redirect('adminlogin');
    }
    

}

public function universityname()
{
    $this->load->model('Student_model');
    $data['university_name']=$this->Student_model->universityname();
    $this->load->view('header');
    $this->load->view('universityname',$data);
    $this->load->view('footer');
}

public function adduniversity()
{
    if($this->session->userdata('admin_login')=='true'){

    $this->load->model('Student_model');
    $data['uni']=$this->Student_model->universityname();
    $data['stud']=$this->Student_model->studentname();
    $this->load->view('header');
    $this->load->view('adduniversity',$data);
    $this->load->view('footer');

     }
    else{

        redirect('adminlogin');
    }
}

public function listuniversity()
{

    if($this->session->userdata('admin_login')=='true'){
        $this->load->model('Student_model');
        $data['university']=$this->Student_model->listuniversity();
        $this->load->view('header');
        $this->load->view('studentlist',$data);
        $this->load->view('footer');

    } else{

        redirect('adminlogin');
    }
}

public function viewuniversity()
{
  if($this->session->userdata('admin_login')=='true'){ 

        $id=$this->uri->segment(2);
        $this->load->model('Student_model');
        $data['universe']=$this->Student_model->universe($id);
        $this->load->view('header');
        $this->load->view('view',$data);
        $this->load->view('footer');

    } else{

        redirect('adminlogin');
    }    

}

public function edituniversity()
{
    if($this->session->userdata('admin_login')=='true'){ 

        $id=$this->uri->segment(2);
        $this->load->model('Student_model');
        $data['universe']=$this->Student_model->universe($id);
        $this->load->view('header');
        $this->load->view('edit',$data);
        $this->load->view('footer');

     } else{

        redirect('adminlogin');
    }    
}

public function editstudent()
{
    if($this->session->userdata('admin_login')=='true'){ 

        $id=$this->uri->segment(2);
        $this->load->model('Student_model');
        $data['student']=$this->Student_model->student($id);
        $this->load->view('header');
        $this->load->view('editstud',$data);
        $this->load->view('footer');

    } else{

        redirect('adminlogin');
    }
 }


public function insertstudent()
{

   
    //Setting validation rules
    if($this->session->userdata('admin_login')=='true'){ 

		$this->form_validation->set_rules('firstname','FirstName  ','required');
		$this->form_validation->set_rules('lastname','LastName ','required');
		$this->form_validation->set_rules('username','Username ','required');
		$this->form_validation->set_rules('password','Password ','required');
		$this->form_validation->set_rules('qualification','Qualification ','required');
        $this->form_validation->set_rules('passing_year','Passing Year ','required');
        $this->form_validation->set_rules('email','Email Id ','required');
        $this->form_validation->set_rules('mobile','Mobile Number ','required');
        // $this->form_validation->set_rules('status','Student Account Status','required');
        // $this->form_validation->set_rules('gre_coaching','GRE Coaching','required');
        // $this->form_validation->set_rules('consultancy','Consultancy','required');
        

		if($this->form_validation->run())
		{
				$firstname=$this->input->post('firstname');
				$lastname=$this->input->post('lastname');
				$username=$this->input->post('username');
				$password=$this->input->post('password');
				$qualification=$this->input->post('qualification');
                $passing_year=$this->input->post('passing_year');
                $mobile=$this->input->post('mobile');
                $email=$this->input->post('email');
                $subscription=$this->input->post('subscription');
                $status=$this->input->post('status');
                $gre_coaching=$this->input->post('gre_coaching');
                $consultancy=$this->input->post('consultancy');
				//loading model

                switch($gre_coaching){
                    case "on":
                        $gre_coaching = "active";
                        break;
                    default:
                        $gre_coaching = "inactive";
                        break;
                }

                switch($consultancy){
                    case "on":
                        $consultancy = "active";
                        break;
                    default:
                        $consultancy = "inactive";
                        break;
                }

                switch($status){
                    case "on":
                        $status = "active";
                        break;
                    default:
                        $status = "inactive";
                        break;
                }


				$this->load->model('Student_model');
				$univ_status = $this->Student_model->insertstud($firstname,$lastname,$username,$password,$qualification,$passing_year,$mobile,$email,$status,$gre_coaching,$consultancy);

                
                if($univ_status=='true'){

                     $this->Student_model->insert_myblog_user($firstname,$lastname,$username,$email,$password);

                    $u_id = $this->Student_model->get_student_id($username);

                        if($gre_coaching=="active"){

                            $gre = $this->Student_model->insertstud_gre($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$u_id);

                            $gre_topic = $this->Student_model->insertstud_gre_topic($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$u_id);


                            if($gre=='true' && $gre_topic=='true')
                            {
                                 $this->session->set_flashdata('success', 'Student Added successfully');
                                 redirect('sreg');  
                            } else{
                                    $error = $this->db->error();  
                                    $this->session->set_flashdata('error', 'Something went wrong. Database Error!!' .$error);   
                                    redirect('sreg');       
                                }


                            }//if($gre_coaching=="active") / No else()

                   
                         $this->session->set_flashdata('success', 'Student Added successfully');
                         redirect('sreg');  

                    }  else{  //if($univ_status=='true')

                            $error = $this->db->error();  
                            $this->session->set_flashdata('error', 'Something went wrong. Database Error!!' .$error);   
                            redirect('sreg');       
                        }
 
               

		} else{ //if($this->form_validation->run()

                $this->session->set_flashdata('error', 'Please check your Input value!!');
                	
                redirect('sreg','refresh');
        }


      } else{ //if($this->session->userdata('admin_login')=='true')

        redirect('adminlogin');
    }
   
}

public function updatestudent()
{
  if($this->session->userdata('admin_login')=='true'){ 
    
    $id=$this->uri->segment(2);

    //Setting validation rules
        $this->form_validation->set_rules('firstname','FirstName  ','required');
        $this->form_validation->set_rules('lastname','LastName ','required');
        $this->form_validation->set_rules('username','Username ','required');
        $this->form_validation->set_rules('password','Password ','required');
        $this->form_validation->set_rules('qualification','Qualification ','required');
        $this->form_validation->set_rules('passing_year','Passing Year ','required');
        $this->form_validation->set_rules('email','Email Id','required');
        $this->form_validation->set_rules('mobile','Mobile Number ','required');
        

        if($this->form_validation->run())
        {
                 $sid=$this->input->post('stud_id');
                $firstname=$this->input->post('firstname');
                $lastname=$this->input->post('lastname');
                $username=$this->input->post('username');
                $password=$this->input->post('password');
                $qualification=$this->input->post('qualification');
                $passing_year=$this->input->post('passing_year');
                $mobile=$this->input->post('mobile');
                $email=$this->input->post('email');

                $subscription=$this->input->post('subscription');
                $status=$this->input->post('status');
                $gre_coaching=$this->input->post('gre_coaching');
                $consultancy=$this->input->post('consultancy');

                //hidden fields

                $fsubscription=$this->input->post('stud_subscription');
                $fstatus=$this->input->post('stud_status');
                $fgre_coaching=$this->input->post('stud_gre_coaching');
                $fconsultancy=$this->input->post('stud_consultancy');

                // $filename=$this->input->post('profile_photo');
                //  $fname =$this->profuploadnew($filename);

               //  if(is_array($fname)){
               //  print_r($fname);
               //  $this->session->set_flashdata('error', $fname['error']);
               //  redirect('edits/'.$id);    
               // }

                $status=$this->input->post('status');
                $gre_coaching=$this->input->post('gre_coaching');
                $consultancy=$this->input->post('consultancy');
                //loading model

                switch($gre_coaching){
                    case "on":
                        $gre_coaching = "active";
                        break;
                    default:
                        $gre_coaching = "inactive";
                        break;
                }

                switch($consultancy){
                    case "on":
                        $consultancy = "active";
                        break;
                    default:
                        $consultancy = "inactive";
                        break;
                }

                switch($status){
                    case "on":
                        $status = "active";
                        break;
                    default:
                        $status = "inactive";
                        break;
                }


                //loading model
                $this->load->model('Student_model');
                $this->Student_model->updatestud($firstname,$lastname,$username,$password,$qualification,$passing_year,$mobile,$email,$sid, $status,$consultancy,$gre_coaching);

                if($fgre_coaching=='inactive' && $gre_coaching=='active'){

                    $count_gre = $this->Student_model->get_gre($sid);
                    $count_gre_topic = $this->Student_model->get_gre_topic($sid);

                    if($count_gre==0){

                        $gre_stat = $this->Student_model->insertstud_gre($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid);
                    } else{

                        $gre_stat = $this->Student_model->update_gre_status($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid);
                    }

                    if($count_gre_topic==0){

                        $gre_topic_stat = $this->Student_model->insertstud_gre_topic($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid);
                    } else{

                        $gre_topic_stat = $this->Student_model->update_gre_topic($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid);
                    }

            //$fgre_coaching=='inactive'&& $gre_coaching=='active'

                } else if($fgre_coaching=='active' && $gre_coaching=='inactive'){

                    $gre_stat = $this->Student_model->inactivate_gre_status($sid);
                    $gre_topic_stat = $this->Student_model->inactivate_gre_topic_status($sid);

                } else if($fgre_coaching=='active' && $gre_coaching=='active'){

                    $gre_stat = $this->Student_model->update_gre_status($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid);
                    $gre_topic_stat = $this->Student_model->update_gre_topic($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid);
                }


            if($gre_stat=='true' && $gre_topic_stat=='true')
            {
              $this->session->set_flashdata('success', 'Student updated successfully');
               redirect('edits/'.$sid);
              
            } else{
             
              $error = $this->db->error(); 
            $this->session->set_flashdata('error', 'Error with Updation!!');
             redirect('edits/'.$sid);  
           
             
            }


               //if($fgre_coaching=='inactive'&& $gre_coaching=='active')

        } else { //if($this->form_validation->run())

                $this->session->set_flashdata('error', 'Please check your Input value!!');
                
                 $this->load->model('Student_model');
                $data['student']=$this->Student_model->student($id);
                $this->load->view('header');
                $this->load->view('editstud',$data);
                $this->load->view('footer');
        }
    
    } else{ //if($this->session->userdata('admin_login')=='true')

        redirect('adminlogin');
    }
   
}


public function adduniversityname()
{

    if($this->session->userdata('admin_login')=='true'){ 

       $this->form_validation->set_rules('uniname','FirstName  ','required');
       if($this->form_validation->run())
		{
		   $uniname=$this->input->post('uniname');
		
				//loading model
	              $this->load->model('Student_model');
			$this->Student_model->insertuniname($uniname);
		} else {
                $this->session->set_flashdata('error', 'Please check your Input value!!');
                	
                $this->load->view('header');
                $this->load->view('universityname');
                $this->load->view('footer');
        }

    } else{

        redirect('adminlogin');
    }
}

public function edituname()
{
     if($this->session->userdata('admin_login')=='true'){ 

        $id=$this->uri->segment(2);
       $this->form_validation->set_rules('uniname','University Name  ','required');
       if($this->form_validation->run())
        {
           $uniname=$this->input->post('uniname');
        
                //loading model
                  $this->load->model('Student_model');
            $this->Student_model->updateuniname($uniname, $id);
        } else {
                $this->session->set_flashdata('error', 'Please check your Input value!!');
                    
                $this->load->view('header');
                $this->load->view('universityname');
                $this->load->view('footer');
        }

    } else{

        redirect('adminlogin');
    }
}



public function insertuniveristy()
{
  if($this->session->userdata('admin_login')=='true'){   

    $filename =$this->recieptupload();
    if($filename=='false'){
        $filename='';
    }

    if(is_array($filename)){
        print_r($filename);
        $this->session->set_flashdata('error', $filename['error']);
        redirect('auni');    
      }

      else{ 
    //Setting validation rules
		$this->form_validation->set_rules('course_name','Course','required');
		$this->form_validation->set_rules('lor1_name','LOR 1 Name ','required');
		$this->form_validation->set_rules('lor1_emailid','LOR 1 email id ','required');
		$this->form_validation->set_rules('lor1_status','LOR 1 status','required');
		$this->form_validation->set_rules('lor2_name','LOR 2 Name','required');
        $this->form_validation->set_rules('lor2_emailid','LOR 2 email id','required');
        $this->form_validation->set_rules('lor2_status','LOR 2 status','required');
        // $this->form_validation->set_rules('lor3_name','LOR 3 Name','required');
        // $this->form_validation->set_rules('lor3_emailid','LOR 3 email id','required');
        // $this->form_validation->set_rules('lor3_status','LOR 3 status','required');
        // $this->form_validation->set_rules('etuniversity_code','Entrace Test University Code','required');
        $this->form_validation->set_rules('et_name','Entrance Test Name','required');
        $this->form_validation->set_rules('et_ostatus','Official Score Status','required');
        $this->form_validation->set_rules('et_unostatus','Unofficial Score Status','required');
        // $this->form_validation->set_rules('epuniversity_code','English Proficiency University Code','required');
        
        $this->form_validation->set_rules('ep_name','English Proficiency Test Name','required');
        $this->form_validation->set_rules('ep_ostatus','Official Score','required');
        $this->form_validation->set_rules('tunofficial_status','Unofficial Transcript','required');
        $this->form_validation->set_rules('r_status','Resume Status','required');
        $this->form_validation->set_rules('sop_status','SOP Status','required'); 

		if($this->form_validation->run())
		{       
                $stud_id=$this->input->post('stud_id');
                $this->load->model('Student_model');
                $stud=$this->Student_model->student($stud_id);
                
                $studname=$stud[0]['firstname']. "  ".$stud[0]['lastname'];
                $mobile=$stud[0]['mobile'];
              
                $university_name=$this->input->post('university_name');
				$course_name=$this->input->post('course_name');
				$lor1_name=$this->input->post('lor1_name');
				$lor1_emailid=$this->input->post('lor1_emailid');
				$lor1_status=$this->input->post('lor1_status');
				$lor2_name=$this->input->post('lor2_name');
                $lor2_emailid=$this->input->post('lor2_emailid');
                $lor2_status=$this->input->post('lor2_status');
                $lor3_name=$this->input->post('lor3_name');
                $lor3_emailid=$this->input->post('lor3_emailid');
                $lor3_status=$this->input->post('lor3_status');
                $etuniversity_code=$this->input->post('etuniversity_code');
                $et_name=$this->input->post('et_name');
                $et_ostatus=$this->input->post('et_ostatus');
                $et_unostatus=$this->input->post('et_unostatus');
                $epuniversity_code=$this->input->post('epuniversity_code');
                $ep_name=$this->input->post('ep_name');
                $ep_ostatus=$this->input->post('ep_ostatus');
                $ep_unostatus=$this->input->post('ep_unostatus');
                $tofficial_status=$this->input->post('tofficial_status');
                $tunofficial_status=$this->input->post('tunofficial_status');
                $r_status=$this->input->post('r_status');
                $sop_status=$this->input->post('sop_status');
                $passport_status=$this->input->post('passport_status');
                $pdegree_status=$this->input->post('pdegree_status');
                $certificate_status=$this->input->post('certificate_status');
                $fees_status=$this->input->post('fees_status');
                $paidby=$this->input->post('paidby');
                $amount=$this->input->post('amount');
                $decision=$this->input->post('decision');
                $bstatement=$this->input->post('bstatement');
                $pre_status=$this->input->post('pre_status');
                $i20_status=$this->input->post('i20_status');
                $logoname=$this->UniversityLogo($university_name);
                
				//loading model
				$this->load->model('Student_model');
				$this->Student_model->insertuni($studname,$university_name,$course_name,$lor1_name,$lor1_emailid,$lor1_status,$lor2_name,$lor2_emailid, $lor2_status,$lor3_name,$lor3_emailid, $lor3_status,$etuniversity_code,$et_name,$et_ostatus, $et_unostatus,$epuniversity_code,$ep_name,$ep_ostatus,$ep_unostatus,$tofficial_status, $tunofficial_status,$r_status,$sop_status,$passport_status,$pdegree_status, $certificate_status,$fees_status, $paidby,$amount,$decision,$bstatement,$pre_status,$i20_status,$stud_id,$filename,$logoname, $mobile);
		} else {
                $this->session->set_flashdata('error', validation_error());
                	
                    redirect('auni');
                // $this->load->view('header');
                // $this->load->view('adduniversity');
                // $this->load->view('footer');
        }
    }

    
  } else{

        redirect('adminlogin');
    } 
   
}

public function updateuniversity()
{

if($this->session->userdata('admin_login')=='true'){   

    //Setting validation rules
		$this->form_validation->set_rules('course_name','Course Name  ','required');
		$this->form_validation->set_rules('lor1_name','LOR 1 Name ','required');
		$this->form_validation->set_rules('lor1_emailid','LOR 1 Email Id ','required');
		$this->form_validation->set_rules('lor1_status','LOR 1 Status ','required');
		$this->form_validation->set_rules('lor2_name','LOR 2 Name ','required');
        $this->form_validation->set_rules('lor2_emailid','LOR 2 Email ','required');
        $this->form_validation->set_rules('lor2_status','LOR 2 Status ','required');
        // $this->form_validation->set_rules('lor3_name','Qualification ','required');
        // $this->form_validation->set_rules('lor3_emailid','Passing Year ','required');
        // $this->form_validation->set_rules('lor3_status','Mobile Number ','required');
        // $this->form_validation->set_rules('etuniversity_code','Qualification ','required');
        $this->form_validation->set_rules('et_name','Passing Year ','required');
        $this->form_validation->set_rules('et_ostatus','Mobile Number ','required');
        $this->form_validation->set_rules('et_unostatus','Mobile Number ','required');
        // $this->form_validation->set_rules('epuniversity_code','Mobile Number ','required');
        $this->form_validation->set_rules('et_ostatus','Mobile Number ','required');
        $this->form_validation->set_rules('ep_name','Mobile Number ','required');
        $this->form_validation->set_rules('ep_ostatus','Mobile Number ','required');
        $this->form_validation->set_rules('tunofficial_status','Mobile Number ','required');
        $this->form_validation->set_rules('r_status','Mobile Number ','required');
        $this->form_validation->set_rules('ep_ostatus','Mobile Number ','required'); 

		if($this->form_validation->run())
		{       
                $stud_id=$this->input->post('stud_id');
                $this->load->model('Student_model');
                $stud=$this->Student_model->student($stud_id);
            
                $studname=$stud[0]['firstname']. "  ".$stud[0]['lastname'];
                $mobile=$stud[0]['mobile'];
                $email_id=$stud[0]['email_id'];
                $university_name=$this->input->post('university_name');
                $university_id=$this->input->post('university_id');
				$course_name=$this->input->post('course_name');
				$lor1_name=$this->input->post('lor1_name');
				$lor1_emailid=$this->input->post('lor1_emailid');
				$lor1_status=$this->input->post('lor1_status');
				$lor2_name=$this->input->post('lor2_name');
                $lor2_emailid=$this->input->post('lor2_emailid');
                $lor2_status=$this->input->post('lor2_status');
                $lor3_name=$this->input->post('lor3_name');
                $lor3_emailid=$this->input->post('lor3_emailid');
                $lor3_status=$this->input->post('lor3_status');
                $etuniversity_code=$this->input->post('etuniversity_code');
                $et_name=$this->input->post('et_name');
                $et_ostatus=$this->input->post('et_ostatus');
                $et_unostatus=$this->input->post('et_unostatus');
                $epuniversity_code=$this->input->post('epuniversity_code');
                $ep_name=$this->input->post('ep_name');
                $ep_ostatus=$this->input->post('ep_ostatus');
                $ep_unostatus=$this->input->post('ep_unostatus');
                $tofficial_status=$this->input->post('tofficial_status');
                $tunofficial_status=$this->input->post('tunofficial_status');
                $r_status=$this->input->post('r_status');
                $sop_status=$this->input->post('sop_status');
                $passport_status=$this->input->post('passport_status');
                $pdegree_status=$this->input->post('pdegree_status');
                $certificate_status=$this->input->post('certificate_status');
                $fees_status=$this->input->post('fees_status');
                $paidby=$this->input->post('paidby');
                $amount=$this->input->post('amount');
                $decision=$this->input->post('decision');
                $bstatement=$this->input->post('bstatement');
                $pre_status=$this->input->post('pre_status');
                $i20_status=$this->input->post('i20_status'); 


                $filename=$_FILES['reciept_pic']['name'];
                $admit_reject=$_FILES['admit_reject']['name'];

                // if($filename ==''){

                if(empty($filename)){

                    echo "File is empty"." ". $filename;
                    
                    $fname = $this->input->post('fileget');

                    if($fname =='false'){
                        $fname = '';
                    }

                } else{

                    echo "File is not empty"." ". $filename;

                    // Set preference
                                $config['upload_path'] = 'reciept/'; 
                                $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                                $config['max_size'] = '50000'; // max_size in kb
                                // $config['overwrite'] = TRUE;
                                $name = $filename;
                                $config['file_name'] = $name;
                       
                                //Load upload library
                                $this->load->library('upload',$config); 
                       
                                // File upload
                                if($this->upload->do_upload('reciept_pic')){
                                  // Get data about the file
                                  $uploadData = $this->upload->data();
                                  $fname = $uploadData['file_name'];

                                } else{
                                 
                                    $fname ='';
                                
                                }

                } 

echo $decision;

                if($decision=="Admit" || $decision=="Rejected"){

                		if(empty($admit_reject)){

		                    echo "Admit_Reject Letter is empty"." ". $admit_reject;
		                    
		                    $admit_letter = $this->input->post('admit_letter');
		                  
		                } else{

		                    echo "Admit_Reject is not empty"." ". $admit_reject;

		                    // Set preference
		                                $config['upload_path'] = 'admit_reject_letter/'; 
		                                $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		                                $config['max_size'] = '20000'; // max_size in kb
		                                // $config['overwrite'] = TRUE;
		                                $name = $studname."_".$university_name;
		                                $config['file_name'] = $name;
		                       
		                                //Load upload library
		                                $this->load->library('upload',$config); 
		                       
		                                // File upload
		                                if($this->upload->do_upload('admit_reject')){
		                                  // Get data about the file
		                                  $admitData = $this->upload->data();
		                                  $admit_letter = $admitData['file_name'];
		                                  // echo $admitData['fullpath'];

		                                } else{
		                                 
		                                    $admit_letter ='null';
		                                
		                                }

		                } 
              
                
                if(is_array($fname)){
                    print_r($fname);
                    $this->session->set_flashdata('error', $fname['error']);
                    redirect('edit/'.$university_id);    
                  }

                  // $this->sendAdmitEmail($stud[0]['firstname'],$admit_letter,$email_id,$university_name,$decision);


        $this->load->library('email');

		// if($this->config->item('protocol'=='smtp')){

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

				 $subject = $university_name." Decision: ".$decision;

				 if($decision == 'Admit'){
				 	
				 	$message = 'Dear '.$stud[0]['firstname'].', <br/><br/> Congratulations!!<br/><br/>  You have received admit from '.$university_name.'. <br/><br/>Your admit letter is attached in the attachment. <br/ ><br/> Please check your application portal for more details - <a href="https://www.shahgre.com/studentsection/Student">https://www.shahgre.com/studentsection/Student </a><br/><br/> Regards,<br/>Application Team<br/> Shah Overseas Education<br/>[This is a automated email, please do not reply]';

				} elseif ($decision == 'Rejected') {
					
					$message = 'Dear '.$stud[0]['firstname'].', <br/><br/>  You have received rejection from '.$university_name.'. <br/><br/>Your decision letter is attached in the attachment. <br/><br/> Please check your application portal for more details- <a href="https://www.shahgre.com/studentsection/Student">https://www.shahgre.com/studentsection/Student </a><br/><br/> Regards,<br/>Application Team<br/> Shah Overseas Education<br/>[This is a automated email, please do not reply]';
				 	
				}

				$fromemail= "students@shahgre.com";
                $fromname="Shah Overseas (do not reply)";
                $email_stud = $stud[0]['email_id'];

                $this->email->from($fromemail, $fromname);
                $this->email->to($email_stud);
				
				$this->email->subject($subject);
                $this->email->message($message);

                // echo $admitData['fullpath'];

			 $this->email->attach(base_url('admit_reject_letter/'.$admit_letter));
			  if($this->email->send()){

                      echo "email sent";
                     

                      } else {

                      	echo "email not sent";
               
                        print_r($this->email->print_debugger());
                     
                       }
		}  
		           
				//loading model
				 $this->load->model('Student_model');
				 $this->Student_model->updateuni($university_id,$course_name,$lor1_name,$lor1_emailid,$lor1_status,$lor2_name,$lor2_emailid,$lor2_status,$lor3_name,$lor3_emailid,$lor3_status,$etuniversity_code,$et_name,$et_ostatus,$et_unostatus,$epuniversity_code,$ep_name,$ep_ostatus,$ep_unostatus,$tofficial_status, $tunofficial_status,$r_status,$sop_status,$passport_status,$pdegree_status,$certificate_status,$fees_status,$paidby,$amount,$decision,$bstatement,$pre_status,$i20_status,$mobile,$university_name,$fname,$admit_letter);
		} else {
                $this->session->set_flashdata('error', validation_error());
                $id=$this->uri->segment(2);
                $this->load->model('Student_model');
                $data['universe']=$this->Student_model->universe($id);
                $this->load->view('header');
                $this->load->view('edit',$data);
                $this->load->view('footer');
        }

    } else{

            redirect('adminlogin');
      } 
   
}

public function sendAdmitEmail($firstname,$admit_letter,$email_id,$university_name,$decision){

		

}


public function deleteuniversity()
{
   if($this->session->userdata('admin_login')=='true'){  
    
    $id=$this->uri->segment(2);
    $this->load->model('Student_model');
    $this->Student_model->deluni($id);

   } else{

            redirect('adminlogin');
      } 
  
}

public function delstudent()
{
   if($this->session->userdata('admin_login')=='true'){ 

        $id=$this->uri->segment(2);
        $this->load->model('Student_model');
        $this->Student_model->delstd($id);

    } else{

            redirect('adminlogin');
      } 
  
}

public function logout()  
{  
    if($this->session->userdata('admin_login')=='true'){ 
     
     $this->session->unset_userdata('username');  
     $this->session->unset_userdata('resume_id');
     $this->session->unset_userdata('student_name');  
     $this->session->sess_destroy();
     redirect('adminlogin');  

    } else{

            redirect('adminlogin');
      } 
     
}  


public function deluname()
{
    if($this->session->userdata('admin_login')=='true'){ 

    $id=$this->uri->segment(2);
    $this->load->model('Student_model');
    $this->Student_model->deluname($id);

    } else{

            redirect('adminlogin');
      } 
  
}


public function profupload(){
    //for checking the existence of directory
    if(!is_dir('profilepic'))
    {
            mkdir('./profilepic',0777,TRUE);
    }
    
    
    $config['upload_path']          = './profilepic/';
    $config['allowed_types']        = 'jpg|jpeg|png|gif';
    $config['max_size']             = 0;
    $config['overwrite']            = TRUE;
    $config['remove_space']         = TRUE;
    
    //$this->upload->initialize($config);
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('profile_photo')){
    
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        return $error;
    
    }
    else
    {
    $data = $this->upload->data();
    $file_name= $data['file_name'];
    return $file_name;
    
    }
    
    
      }


      public function profuploadnew($filename){
    //for checking the existence of directory
    if(!is_dir('profilepic'))
    {
            mkdir('./profilepic',0777,TRUE);
    }
    
    
    $config['upload_path']          = './profilepic/';
    $config['allowed_types']        = 'jpg|jpeg|png|gif';
    $config['max_size']             = 0;
    $config['overwrite']            = TRUE;
    $config['remove_space']         = TRUE;
    $config['file_name']=$filename;
    
    //$this->upload->initialize($config);
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('profile_photo')){
    
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        return $error;
    
    }
    else
    {
    $data = $this->upload->data();
    $file_name= $data['file_name'];
    return $file_name;
    
    }
    
    
      }

      public function recieptupload(){
        //for checking the existence of directory
        if(!is_dir('reciept'))
        {
                mkdir('./reciept',0777,TRUE);
        }
        
        
        $config['upload_path']          = './reciept/';
        $config['allowed_types']        = 'jpg|jpeg|png|gif|pdf|doc|docx';
        // $config['max_size']             = 0;
        $config['overwrite']            = TRUE;
        $config['remove_space']         = FALSE;
        
        //$this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('reciept_pic')){
        
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            return 'false';
        
        }
        else
        {
        $data = $this->upload->data();
        $file_name= $data['file_name'];
        return $file_name;
        
        }
        
        
    }

  public function  recieptuploadnew($filename){
              $fname=$filename;
              //for checking the existence of directory
              if(!is_dir('reciept'))
              {
                      mkdir('./reciept',0777,TRUE);
              }
              
              
              $config['upload_path']          = 'reciept/';
              $config['allowed_types']        = 'jpg|jpeg|png|gif|pdf|doc|docx';
              // $config['max_size']             = 0;
              $config['overwrite']            = TRUE;
              $config['remove_space']         = FALSE;
              $config['file_name']=$fname;
              //$this->upload->initialize($config);
              $this->load->library('upload', $config);
              
              if ( ! $this->upload->do_upload('reciept_pic')){
              
                  $error = array('error' => $this->upload->display_errors());
                  print_r($error);
                  return 'false';
              
              }
              else
              {
              $data = $this->upload->data();
              $file_name= $data['file_name'];
              return $file_name;
              
              }
              
              
     }   

}
