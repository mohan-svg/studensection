<?php
Class Student_model extends CI_Model
{

      public function insertstud($firstname,$lastname,$username,$password,$qualification,$passing_year, $mobile,$email,$status,$gre_coaching,$consultancy){
                        $data=array(
                                    'firstname'=>$firstname,
                                    'lastname'=>$lastname,
                                    'username'=>$username,
                                    'password'=>$password,
                                    'qualification'=>$qualification,
                                    'passing_year'=>$passing_year,
                                    'email_id'=>$email,
                                    'mobile'=>$mobile,
                                    'gre_coaching_status'=>$gre_coaching,
                                    'consultancy'=>$consultancy,
                                    'status'=>$status,
    
                                );
    
        $sql_query=$this->db->insert('student',$data);
    
        if($sql_query)
        {
             return 'true';
        }
        else{
                return 'false';
            }
    
    
    }
    
     function get_student_id($username){
        $this->db->where('username',$username);
        $query = $this->db->get('student');

        return $query->row()->stud_id;
    }    

    function insert_myblog_user($firstname,$lastname,$username,$email,$password){

        $db4 = $this->load->database('myblog',TRUE);
        $data=array('user_login'=>$username,
                    'user_pass'=>md5($password),
                    'user_nicename'=>$firstname,
                    'user_email'=>$email,
                    'user_registered'=>date("yy-m-d h:i:s"),
                    'user_activation_key'=>" ",
                    'user_status'=>0,
                    'display_name'=>$username,
                 );

        $sql_query=$db4->insert('wp6m_users',$data);

        $db4->close();

        return true;
    }

public function insertstud_gre($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$u_id){

    $db2 = $this->load->database('database2',TRUE);
    $gid =5;
    if($subscription==''){
        $data=array(
                    'password'=>md5($password),
                    'email'=>$email,
                    'first_name'=>$firstname,
                    'last_name'=>$lastname,
                    'contact_no'=>$mobile,
                    'gid'=>$gid,
                    'unique_id'=>$u_id,

                 );

    } else{

       $data=array(
                    'password'=>md5($password),
                    'email'=>$email,
                    'first_name'=>$firstname,
                    'last_name'=>$lastname,
                    'contact_no'=>$mobile,
                    'gid'=>$gid,
                    'subscription_expired'=>strtotime($subscription),
                    'unique_id'=>$u_id,

                 );
    }

    $sql_query=$db2->insert('savsoft_users',$data);

    $db2->close();

   if($sql_query)
    {
         return 'true';
    }
    else{
            return 'false';
        }
}


public function insertstud_gre_topic($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$u_id){

    $db3 = $this->load->database('database3',TRUE);
    $gid =5;

    if($subscription==''){
        $data=array(
                    'password'=>md5($password),
                    'email'=>$email,
                    'first_name'=>$firstname,
                    'last_name'=>$lastname,
                    'contact_no'=>$mobile,
                    'gid'=>$gid,
                    'unique_id'=>$u_id,

                 );

    } else{

       $data=array(
                    'password'=>md5($password),
                    'email'=>$email,
                    'first_name'=>$firstname,
                    'last_name'=>$lastname,
                    'contact_no'=>$mobile,
                    'gid'=>$gid,
                    'subscription_expired'=>strtotime($subscription),
                    'unique_id'=>$u_id,

                 );
    }



    $sql_query=$db3->insert('savsoft_users',$data);

    $db3->close();

    if($sql_query)
    {
         return 'true';
    }
    else{
            return 'false';
        }
}


public function updatestud($firstname,$lastname,$username,$password,$qualification,$passing_year,$mobile,$email,$id,$status,$consultancy,$gre_coaching){

    $data=array(
                                'firstname'=>$firstname,
                                'lastname'=>$lastname,
                                'username'=>$username,
                                'password'=>$password,
                                'qualification'=>$qualification,
                                'passing_year'=>$passing_year,
                                'email_id'=>$email,
                                'mobile'=>$mobile,
                                'gre_coaching_status'=>$gre_coaching,
                                'consultancy'=>$consultancy,
                                'status'=>$status,
                                // 'profile_photo'=>$filename,

                            );
    print_r($data);

            $sql_query= $this->db->where('stud_id', $id);
            $sql_query= $this->db->update('student',$data);

            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows >=0)
            {
              return 'true';

            }
            else{
                return 'false';

            }
}


public function get_gre($sid){

    $db2 = $this->load->database('database2',TRUE);
    $db2->where('unique_id',$sid);
    $query = $db2->get('savsoft_users');
    $num_row = $query->num_rows();
    $db2->close();
    return $num_row;

}

public function get_gre_topic($sid){

    $db3 = $this->load->database('database3',TRUE);
    $db3->where('unique_id',$sid);
    $query = $db3->get('savsoft_users');
    $num_row = $query->num_rows();
    $db3->close();
    return $num_row;

}

public function update_gre_status($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid){

    $db2 = $this->load->database('database2', TRUE);

    if($subscription==''){

        $data = array('password'=> md5($password),
                   'email'=> $email,
                   'first_name'=> $firstname,
                   'last_name'=> $lastname,
                   'contact_no'=> $mobile,
                   'user_status'=> 'Active'
                );
    } else{

        $data = array('password'=> md5($password),
                   'email'=> $email,
                   'first_name'=> $firstname,
                   'last_name'=> $lastname,
                   'contact_no'=> $mobile,
                   'subscription_expired'=> $subscription,
                   'user_status'=> 'Active'
                );
    }


    $db2->where('unique_id',$sid);
    $query = $db2->update('savsoft_users',$data);

    if($db2->affected_rows() >=0){

        $db2->close();
        return 'true';

    }  else{
        $db2->close();
        return 'false';
    }

}

public function update_gre_topic($firstname,$lastname,$email,$password,$mobile,$gre_coaching,$subscription,$sid){

    $db3 = $this->load->database('database3', TRUE);

    if($subscription==''){

        $data = array('password'=> md5($password),
                   'email'=> $email,
                   'first_name'=> $firstname,
                   'last_name'=> $lastname,
                   'contact_no'=> $mobile,
                   'user_status'=> 'Active'
                );
    } else{

        $data = array('password'=> md5($password),
                   'email'=> $email,
                   'first_name'=> $firstname,
                   'last_name'=> $lastname,
                   'contact_no'=> $mobile,
                   'subscription_expired'=> $subscription,
                   'user_status'=> 'Active'
                );
    }


    $db3->where('unique_id',$sid);
    $query = $db3->update('savsoft_users',$data);

    if($db3->affected_rows() >=0){

        $db3->close();
        return 'true';

    }  else{

        $db3->close();
        return 'false';
    }

}


public function inactivate_gre_status($sid){

    $db2 = $this->load->database('database2', TRUE);

    $data = array('user_status'=>'Inactive');
    $db2->where('unique_id',$sid);
    $query = $db2->update('savsoft_users',$data);

    if($db2->affected_rows() >=0){

       return 'true';

    } else{

        return 'false';
    }

}

public function inactivate_gre_topic_status($sid){

    $db3 = $this->load->database('database3', TRUE);

    $data = array('user_status'=>'Inactive');
    $db3->where('unique_id',$sid);
    $query = $db3->update('savsoft_users',$data);

    if($db3->affected_rows() >=0){

       return 'true';

    } else{

        return 'false';
    }

}

public function updateuniname($uniname, $id){

    $data=array(
                  'u_name'=>$uniname,


                 );

            $sql_query= $this->db->where('id', $id);
            $sql_query= $this->db->update('university_name',$data);

            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows >=0)
            {
              $this->session->set_flashdata('success', 'University Name updated successfully');
               redirect('uniname');

            }
            else{
              $error = $this->db->error();
            $this->session->set_flashdata('error', 'You are entering the same value!!');
            redirect('uniname');


            }
}


public function get_student_data(){

                $this->db->order_by('stud_id','DESC');
                $sql_query = $this->db->get('student');
                if ( ! $sql_query)
                {
                $error = $this->db->error();
                }
                else{
                    return $sql_query->result_array();
                }

     }




public function insertuni($studname,$university_name,$course_name,$lor1_name,$lor1_emailid,$lor1_status,$lor2_name,$lor2_emailid, $lor2_status,$lor3_name,$lor3_emailid, $lor3_status,$etuniversity_code,$et_name,$et_ostatus, $et_unostatus,$epuniversity_code,$ep_name,$ep_ostatus,$ep_unostatus,$tofficial_status, $tunofficial_status,$r_status,$sop_status,$passport_status,$pdegree_status, $certificate_status,$fees_status, $paidby,$amount,$decision,$bstatement,$pre_status,$i20_status,$studid,$filename,$logoname,$mobile){

    $mobile=$mobile;
    $university_name=$university_name;

    $data=array(
                'student_name'=>$studname,
                'university_name'=>$university_name,
                'course_name'=>$course_name,
                'lor1_name'=>$lor1_name,
                'lor1_emailid'=>$lor1_emailid,
                'lor1_status'=>$lor1_status,
                'lor2_name'=>$lor2_name,
                'lor2_emailid'=>$lor2_emailid,
                'lor2_status'=>$lor2_status,
                'lor3_name'=>$lor3_name,
                'lor3_emailid'=>$lor3_emailid,
                'lor3_status'=>$lor3_status,
                'etuniversity_code'=>$etuniversity_code,
                'et_name'=>$et_name,
                'et_ostatus'=>$et_ostatus,
                'et_unostatus'=>$et_unostatus,
                'epuniversity_code'=>$epuniversity_code,
                'ep_name'=>$ep_name,
                'ep_ostatus'=>$ep_ostatus,
                'ep_unostatus'=>$ep_unostatus,
                'tofficial_status'=>$tofficial_status,
                'tunofficial_status'=>$tunofficial_status,
                'r_status'=>$r_status,
                'sop_status'=>$sop_status,
                'passport_status'=>$passport_status,
                'pdegree_status'=>$pdegree_status,
                'certificate_status'=>$certificate_status,
                'fees_status'=>$fees_status,
                'paidby'=>$paidby,
                'amount'=>$amount,
                'decision'=>$decision,
                'bstatement'=>$bstatement,
                'pre_status'=>$pre_status,
                'i20_status'=>$i20_status,
                'stud_id'=>$studid,
                'Filename'=>$filename,
                'logo_name'=>$logoname,


            );

$sql_query=$this->db->insert('university',$data);

if($sql_query)
{
$this->session->set_flashdata('success', 'University Added successfully');
 $res=$this->StatusSubmitFunction($mobile,$university_name,$decision);
 // print_r($res);
redirect('auni');
}
else{
$error = $this->db->error();
$this->session->set_flashdata('error', 'Somthing went worng. Database Error!!' .$error);
redirect('auni');
}
}


public function insertuniname($uniname){
    $data=array(
                'u_name'=>$uniname,

            );

$sql_query=$this->db->insert('university_name',$data);

if($sql_query)
{
$this->session->set_flashdata('success', 'University Added successfully');
redirect('uniname');
}
else{
$error = $this->db->error();
$this->session->set_flashdata('error', 'Somthing went worng. Database Error!!' .$error);
redirect('uniname');
}
}





public function updateuni($university_id,$course_name,$lor1_name,$lor1_emailid,$lor1_status,$lor2_name,$lor2_emailid, $lor2_status,$lor3_name,$lor3_emailid, $lor3_status,$etuniversity_code,$et_name,$et_ostatus, $et_unostatus,$epuniversity_code,$ep_name,$ep_ostatus,$ep_unostatus,$tofficial_status, $tunofficial_status,$r_status,$sop_status,$passport_status,$pdegree_status, $certificate_status,$fees_status, $paidby,$amount,$decision,$bstatement,$pre_status,$i20_status,$mobile,$university_name,$filename,$admit_letter){

    $mobile=$mobile;
    $decision=$decision;
    $uniname=$university_name;


    $lor1_prev = $this->input->post('lor1_prev');
    $lor2_prev = $this->input->post('lor2_prev');
    $lor3_prev = $this->input->post('lor3_prev');
    $gre_prev_off = $this->input->post('gre_prev_off');
    $toefl_prev_off = $this->input->post('toefl_prev_off');
    $trans_prev_off = $this->input->post('trans_prev_off');
    $prev_fees_status = $this->input->post('prev_fees_status');
    $prev_decision = $this->input->post('prev_decision');
    $prev_i20 = $this->input->post('prev_i20');


    $data=array(

                'course_name'=>$course_name,
                'lor1_name'=>$lor1_name,
                'lor1_emailid'=>$lor1_emailid,
                'lor1_status'=>$lor1_status,
                'lor2_name'=>$lor2_name,
                'lor2_emailid'=>$lor2_emailid,
                'lor2_status'=>$lor2_status,
                'lor3_name'=>$lor3_name,
                'lor3_emailid'=>$lor3_emailid,
                'lor3_status'=>$lor3_status,
                'etuniversity_code'=>$etuniversity_code,
                'et_name'=>$et_name,
                'et_ostatus'=>$et_ostatus,
                'et_unostatus'=>$et_unostatus,
                'epuniversity_code'=>$epuniversity_code,
                'ep_name'=>$ep_name,
                'ep_ostatus'=>$ep_ostatus,
                'ep_unostatus'=>$ep_unostatus,
                'tofficial_status'=>$tofficial_status,
                'tunofficial_status'=>$tunofficial_status,
                'r_status'=>$r_status,
                'sop_status'=>$sop_status,
                'passport_status'=>$passport_status,
                'pdegree_status'=>$pdegree_status,
                'certificate_status'=>$certificate_status,
                'fees_status'=>$fees_status,
                'paidby'=>$paidby,
                'amount'=>$amount,
                'decision'=>$decision,
                'bstatement'=>$bstatement,
                'pre_status'=>$pre_status,
                'Filename'=>$filename,
                'i20_status'=>$i20_status,
                'admit_reject_letter'=>$admit_letter,

            );

            $sql_query= $this->db->where('university_id', $university_id);
            $sql_query= $this->db->update('university',$data);

            $afftectedRows = $this->db->affected_rows();

            if ($afftectedRows >=0)
            {
              $this->session->set_flashdata('success', 'University Status updated successfully');

              // $res=$this->StatusUpdateFunction($mobile,$decision,$university_name);

              $lor = 0; $gre = 0; //$toefl = 0; $trans = 0; $i20=0; $dec = 0; $fees = 0;

              if((($lor1_prev != $lor1_status) || ($lor2_prev != $lor2_status) || ($lor3_prev != $lor3_status))){

                  $res=  $this->RecUpdateFunction($mobile,$uniname);
                                
              } 

              if($gre_prev_off != $et_ostatus){
                    
                    $res= $this->GreUpdate($mobile,$uniname,$et_name,$et_ostatus);
                  }

          
             if($toefl_prev_off != $ep_ostatus){
                
                 $res= $this->EngProfUpdate($mobile,$uniname,$ep_name,$ep_ostatus);

             } 

             if($trans_prev_off != $tofficial_status){
                
                $res= $this->TransUpdate($mobile,$uniname,$tofficial_status);
                
              } 

              if($prev_fees_status != $fees_status){
               
               $res= $this->FeesUpdate($mobile,$uniname,$fees_status);

              } 

              if($prev_decision != $decision){
               
               $res= $this->DecisionUpdate($mobile,$uniname,$decision);
              
              } 

              if($prev_i20 != $i20_status){
                
                
               $res= $this->I20Update($mobile,$uniname,$i20_status);
               
              } 


               redirect('edit/'.$university_id);
            } else{

              $error = $this->db->error();
              $this->session->set_flashdata('error', 'You are entering the same value!!');
             redirect('edit/'.$university_id);

            }
}


public function universitylist($stud_id){

                $this->db->where('stud_id',$stud_id);
                $sql_query = $this->db->get('university');
                if ( ! $sql_query)
                {
                $error = $this->db->error();
                }
                else{
                    return $sql_query->result_array();
                }

     }


public function listuniversity(){

    $this->db->order_by('stud_id', 'DESC');
    $sql_query = $this->db->get('university');
    if ( ! $sql_query)
    {
    $error = $this->db->error();
    }
    else{
        return $sql_query->result_array();
    }

}

public function student($stud_id){

                $this->db->where('stud_id',$stud_id);
                $sql_query = $this->db->get('student');

                if ( ! $sql_query)
                {
                    $error = $this->db->error();
                }
                else{
                    return $sql_query->result_array();
                }

    }



   public function deluni($did){
    $sql_query=$this->db->where('university_id', $did);
    $sql_query=$this->db->delete('university');

    $afftectedRows = $this->db->affected_rows();
    echo "Affected Rows " .$afftectedRows;
    if ($afftectedRows>0)
    {
        $this->session->set_flashdata('success', 'Alloted University remove successfully');
        redirect('listuni');
    }
    else{
        $error = $this->db->error();
                return $error;
            $this->session->set_flashdata('error', 'Somthing went worng. Error!!');
            redirect('listuni');

    }

}

  public function delstd($sid){
    $sql_query=$this->db->where('stud_id', $sid);
    $sql_query=$this->db->delete('student');

    $afftectedRows = $this->db->affected_rows();
    echo "Affected Rows " .$afftectedRows;
    if ($afftectedRows>0)
    {
        $this->session->set_flashdata('success', 'Student remove successfully');
        redirect('sreg');
    }
    else{
        $error = $this->db->error();
                return $error;
            $this->session->set_flashdata('error', 'Somthing went worng. Error!!');
            redirect('sreg');

    }

}


 public function deluname($did){
    $sql_query=$this->db->where('id', $did);
    $sql_query=$this->db->delete('university_name');

    $afftectedRows = $this->db->affected_rows();
    echo "Affected Rows " .$afftectedRows;
    if ($afftectedRows>0)
    {
        $this->session->set_flashdata('success', 'University Name removed successfully');
        redirect('uniname');
    }
    else{
        $error = $this->db->error();
                return $error;
            $this->session->set_flashdata('error', 'Somthing went worng. Error!!');
            redirect('uniname');

    }

}



    public function universe($uid){

        $this->db->where('university_id',$uid);
        $sql_query = $this->db->get('university');
        if ( ! $sql_query)
        {
        $error = $this->db->error();
        }
        else{
            return $sql_query->result_array();
        }

            }

    public function universityname(){

       $this->db->order_by('u_name','ASC');
        $sql_query = $this->db->get('university_name');
        if ( ! $sql_query)
        {
        $error = $this->db->error();
        }
        else{
            return $sql_query->result_array();
        }

    }

    public function studentname(){

        $this->db->order_by('firstname','ASC');
        $sql_query = $this->db->get('student');
        if ( ! $sql_query)
        {
        $error = $this->db->error();
        }
        else{
            return $sql_query->result_array();
        }

    }


        public function loginadmin($adminname,$adminpswd){

                $data=array(
                    'uname'=>$adminname,
                    'pass'=>$adminpswd,
                );

                $sql_query= $this->db->where($data);
                $sql_query = $this->db->get('admin');

                if (!$sql_query->num_rows() > 0)
                {

                $error = $this->db->error();
                $this->session->set_flashdata('error', 'Please Check Your Username and Password !!');
                    redirect('adminlogin' );
                }
                else{

                   $row = $sql_query->row();
                    $session_data = array(
                        'username'     => $adminname,
                        'id' =>  $row->id,
                        'admin_name' => $row->admin_name,
                        'admin_login' =>'true'
                   );
                   $this->session->set_userdata($session_data);
                    redirect('sreg' );
                }

                    }

             public function loginstudent($adminname,$adminpswd){
                        $this->load->model('Upload_model');
                        $data=array(
                            'username'=>$adminname,
                            'password'=>$adminpswd
                        );

                        $sql_query= $this->db->where($data);
                        $sql_query = $this->db->get('student');
                        $row = $sql_query->row();
                        if($row->status == 'inactive'){

                                $error = $this->db->error();
                            $this->session->set_flashdata('error', 'Your account has been deactivated');
                                redirect('Student' );

                        } else{
                                if (!$sql_query->num_rows() > 0)
                                    {

                                        $error = $this->db->error();
                                        $this->session->set_flashdata('error', 'Please Check Your Username and Password !!');
                                            redirect('Student' );
                                    }
                                    else{

                                        // $row = $sql_query->row();
                                        $studid=$row->stud_id;
                                        $sname = $row->firstname." ".$row->lastname;
                                        $session_data = array(
                                            'username' => $adminname,
                                            'id'=> $studid,
                                            'sname' => $sname,
                                            'stud_login' =>'true'
                                       );

                                       $this->session->set_userdata($session_data);
                                        $upd_data=array('stud_login' =>'true');
                                        $this->db->where('stud_id',$studid);
                                       $this->db->update('student',$upd_data);

                                       $uploaded_status = $this->Upload_model->get_uploaded($studid);

                                       if($uploaded_status!='false'){
                                            $this->session->set_userdata('upd_status','true');
                                       }

                                       redirect('dashboard');

                                        // redirect('sview/'.$studid);
                                  }//if (!$sql_query->num_rows() > 0)

                        }//if($row->status == 'inactive')


         }


        public function get_stud_status($id){

            $this->db->where('stud_id',$id);
            $query = $this->db->get();
        }


        public function gre_test($id,$firstname,$lastname,$email){

            // Load database
            $db2 = $this->load->database('database2', TRUE);

            $arraydata = array('login_status' => 'true',
                      'user_status' => 'Active'
                    );

            $data = array('email' => $email,
                          'first_name' => $firstname,
                          'last_name' => $lastname);

            $db2->where($data);

            $query = $db2->update('savsoft_users',$arraydata);

            $afftectedRows = $db2->affected_rows();
                echo "Affected Rows " .$afftectedRows;

            if ($query)
            {
                $db2->close();
                return 'true';

            }  else{
                $error = $db2->error();
                        return $error;
                    $this->session->set_flashdata('error', 'Something went worng. Error!!');
                    redirect('sreg');

            }

        }

        public function gre_topics($id,$firstname,$lastname,$email){

            // Load database
            $db3 = $this->load->database('database3', TRUE);

            //print_r($db3);

            $arraydata = array('login_status' => 'true',
                      'user_status' => 'Active'
                    );

            $data = array('email' => $email,
                          'first_name' => $firstname,
                          'last_name' => $lastname);

            $db3->where($data);

            $query = $db3->update('savsoft_users',$arraydata);

            $afftectedRows = $db3->affected_rows();

                echo"Query :"; print_r($query);
                echo "Affected Rows " .$afftectedRows;


            if ($query)
            {

                return 'true';

            }  else{
                $error = $db3->error();
                        return $error;
                    $this->session->set_flashdata('error', 'Something went wrong. Error!!');
                    redirect('sreg');

            }

        }




            public function StatusSubmitFunction($mobile,$uniname,$decision){

                //9657849086
                 $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";

                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                $numbers = $mob; // A single number or a comma-seperated list of numbers

                $message="Dear Student,%n %nYour Application for $uniname : $decision .%n %n- Shah Overseas";
                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                return $result;
                curl_close($ch);
                //return true;


             }


             public function StatusUpdateFunction($mobile,$status,$uniname){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                $Applicationstatus=$status;
                $mob=$mobile;
                $uniname=$uniname;



                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
                $message = "Dear Student,%n %nYour Application Status has been changed for $uniname.%n %nApplication Status: $Applicationstatus.";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }


             public function RecUpdateFunction($mobile,$uniname){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
            
                $message="Dear Student,%n %nLOR status updated for $uniname .%n %n- Shah Overseas";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }

             public function GreUpdate($mobile,$uniname,$et_name,$et_ostatus){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
                $message="Dear Student,%n %nOfficial $et_name status for $uniname : $et_ostatus .%n %n- Shah Overseas";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }


             public function EngProfUpdate($mobile,$uniname,$ep_name,$ep_ostatus){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                // A single number or a comma-seperated list of numbers
                $message="Dear Student,%n %nOfficial $ep_name status for $uniname : $ep_ostatus .%n %n- Shah Overseas";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }

             public function TransUpdate($mobile,$uniname,$tofficial_status){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
               
                $message="Dear Student,%n %nOfficial Transcript status for $uniname : $tofficial_status .%n %n- Shah Overseas";


                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }

              public function FeesUpdate($mobile,$uniname,$fees_status){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
                
                $message="Dear Student,%n %nApplication fees status for $uniname : $fees_status .%n %n- Shah Overseas";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }

             public function DecisionUpdate($mobile,$uniname,$decision){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
               
                $message="Dear Student,%n %nYour Application Status for $uniname : $decision .%n %n- Shah Overseas";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             } 

             public function I20Update($mobile,$uniname,$i20_status){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
                $message="Dear Student,%n %nYour I20 status for $uniname : $i20_status .%n %n- Shah Overseas";


                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;

             }

             public function LorGreToeflMessage($mobile,$uniname,$lor1_name,$lor1_status,$lor2_name,$lor2_status,$lor3_name,$lor3_status,$et_name,$et_ostatus,$ep_name,$ep_ostatus){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
                $message ="Dear Student,%n %nFollowing fields updated for $uniname %n %nLOR Status, official $et_name, official $ep_name .%n %n- Shah Overseas";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }

             public function GreToeflMessage($mobile,$uniname,$et_name,$et_ostatus,$ep_name,$ep_ostatus){

                //9657849086
                $username = "tech.shahoverseas@gmail.com";
                $hash = "7f5beb060a43996d320083d51b19154169ee5a8531ccbee9d5145908fcff0512";
                
                $mob=$mobile;
                $uniname=$uniname;

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                $sender = "SHAHOV"; // This is who the message appears to be from.
                //$numbers = $mob;
                $numbers = $mob;

                 // A single number or a comma-seperated list of numbers
                $message ="Dear Student,%n %nStatus Updated: $uniname %n %nofficial $et_name : $et_ostatu, official $ep_name : $ep_ostatus%n %nPlease login on portal for more info.";

                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = rawurlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo $result;
                return $result;
                curl_close($ch);
                //return true;


             }


             public function unset_login($id){

              $data=array(
                  'stud_login' => 'false'
              );

              $this->db->where('stud_id',$id);

              $query = $this->db->update('student',$data);

              $afftectedRows = $this->db->affected_rows();

                if ($afftectedRows >=0)
                {
                           return 'true';
                }
                else{
                           echo "not logout, id=".$id;

                }

             }
 
}
?>
