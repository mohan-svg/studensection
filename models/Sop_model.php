<?php
Class Sop_model extends CI_Model
{

    function getques()
  {

      $query=$this->db->get('sop_ques');

      return $query->result_array();

  }

  

function insert_application($u_id,$stud_id)
{

  $arraydata= array('stud_id' =>$stud_id,
    'university_id' =>$u_id,
    'university_name' =>$this->input->post('uname'),
    'course_1' =>$this->input->post('course1'),
    'specialization_1' =>$this->input->post('specialization1'),
    'course_2' =>$this->input->post('course2'),
    'specialization_2' =>$this->input->post('specialization2'),
    'term' =>$this->input->post('term')

   );

  // $insert = $this->db->insert('submitted_applications',$arraydata);

  if($this->db->insert('submitted_applications',$arraydata)){

    return true;
  }

  else{

    return "application not submitted";
  }

} 


function insert_answer(){

  $stud_name = strtolower($this->input->post('stud_name'));
  $course=$this->input->post('course');
  $term=$this->input->post('term');

  $arrydata = array('stud_id'=>rand(1,999999999),
                    'student_name'=>$stud_name,
                    'course'=>$course,
                    'term'=>$term);
    
    $query = $this->db->insert('stud_sop_info',$arrydata);

    // if(($query->affected_rows>0){

      // $this->db->where('student_name',$stud_name);
      // $get = $this->db->get('student','stud_id');
      // $student_id = $get->row_array();

      $stud_id = $this->db->query("SELECT stud_id FROM stud_sop_info WHERE student_name LIKE '$stud_name' AND course LIKE '$course' AND term LIKE '$term'");
      
      $id = $stud_id->row()->stud_id;

      $stud_id = $stud_id->row_array();

  $questions = $this->getques();

  $flag=0;

  foreach ($questions as $key => $val) {
    $arraydata = array('stud_id'=>$stud_id['stud_id'],
                        'ques_id'=>$val['q_id'], 
                        'answer'=>$this->input->post($val['q_id']));

    $sop_ans=$this->db->insert('answer',$arraydata);
    $flag = $flag+1;
  }

  if($flag >= 12){
      
      $this->session->set_userdata('stop',$stud_name);
      return array('status'=>'true','id'=>$id);

  } else{
    
      return array('status'=>'false');

  }

}

public function save_answer($stud_id,$stud_name){
    
  $questions = $this->getques();

  $flag=0;

  foreach ($questions as $key => $val) {

    $data = array('stud_id'=>$stud_id,
                  'ques_id'=>$val['q_id'] );

    $adata = array('answer'=>$this->input->post($val['q_id']));
    $this->db->where($data);                    
    $sop_ans=$this->db->update('answer',$adata);
    $flag = $flag+1;
  }

  if($flag >= 12){
      $this->session->set_userdata('stop',$stud_name);
      return 'true';

  }
  else{
    return 'false';
  }

 }


public function insert_stud_info($stud_name,$course,$term){
   
    $arrydata = array('stud_id'=>rand(1,999999999),
                    'student_name'=>$stud_name,
                    'course'=>$course,
                    'term'=>$term);
    
    $query = $this->db->insert('stud_sop_info',$arrydata);

    if($this->db->affected_rows() > 0){
      return 'true';
    } else{
      return 'false';
    }

}

public function get_stud_id($stud_name,$course,$term){

  // $stud_id = $this->db->query("SELECT stud_id FROM stud_sop_info WHERE student_name LIKE '$stud_name' AND course LIKE '$course' AND term LIKE '$term'");

  $arrydata = array('student_name'=>$stud_name,
                    'course'=>$course,
                    'term'=>$term);

  $this->db->where($arrydata);

  $stud_id = $this->db->get('stud_sop_info');

  if($stud_id->num_rows()>0){

    return $stud_id->row()->stud_id;

  } else{

    return 'false';
  }

  

}

public function get_flag($stud_id){

    $this->db->where('stud_id',$stud_id);
    $this->db->limit(1);
    $flag =$this->db->get('answer');

    if($flag->num_rows()>0){

      return $flag->row()->flag;

    } else{

        return 'false';
    }
    
}

public function getSopdata($stud_id){

    $this->db->where('stud_id',$stud_id);

    $query = $this->db->get('answer');  
    
    if($query){

      return $query->result_array();

    } else{
      
      return 'false';

    }
}


public function getstudinfo($stud_id){

    $this->db->where('stud_id',$stud_id);

    $query = $this->db->get('stud_sop_info');

    if($query){
        
        return $query->row();

    } else{

        return 'false';
    }

}

public function signin($uname,$password){

  $arraydata = array('admin_uname'=>$uname, 'password'=>$password);

  $this->db->where($arraydata);
  $query = $this->db->get('admin');

  
  if($query->num_rows()==1){
        
        $admin=$query->row_array();

        $this->session->set_userdata('admin_name',$admin['admin_name']);

        $this->session->set_userdata('admin_id',$admin['id']);

        $this->session->set_userdata('logs_in','true');

        return array('status' => 'true', 'admin'=>$admin);

    }

    else{

        return array('status'=>'false','message'=>'Invalid Login Credentials');
    
    } 


}

public function get_student(){

  $query = $this->db->get('stud_sop_info');

  return $query->result_array();

}

public function get_student_word(){

  $query = $this->db->get('stud_sop_info');

  return $query->row();

}

public function view_student(){

  $query = $this->db->get('student');

  return $query->result_array();

}


public function get_sop($stud_id){

    $this->db->join('stud_sop_info','answer.stud_id=stud_sop_info.stud_id');
    $this->db->join('sop_ques','answer.ques_id=sop_ques.q_id');
    $this->db->where('answer.stud_id',$stud_id);
    $query = $this->db->get('answer');

    return $query->result_array();
}


public function get_sop_word($stud_id){

    $this->db->join('stud_sop_info','answer.stud_id=stud_sop_info.stud_id');
    $this->db->join('sop_ques','answer.ques_id=sop_ques.q_id');
    $this->db->where('answer.stud_id',$stud_id);
    $query = $this->db->get('answer');

    return $query->row();
}

public function get_docs($stud_id){

    $this->db->join('student','student.stud_id=uploaded_docs.stud_id');
    $this->db->where('uploaded_docs.stud_id',$stud_id);
    $query = $this->db->get('uploaded_docs');

    return $query->result_array();
}

public function get_chats($stud_id){

    $this->db->join('student','student.stud_id=chats.user_id');
    $this->db->where('chats.user_id',$stud_id);
    $query = $this->db->get('chats');

    return $query->result_array();
}



public function get_stud_byId($stud_id){

    
    $this->db->where('stud_id',$stud_id);

    $query = $this->db-get('stud_sop_info');

    return $query->result_array();
}

public function get_ques(){

  $query = $this->db->get('sop_ques');

  return $query->result_array();
}

public function update_ques($id,$question){

  $data = array(
      'question' =>$question
  );
  $this->db->where('q_id',$id);
  $query = $this->db->update('sop_ques',$data);

  return 'true';
}

  public function get_chat($id){

      $this->db->where('user_id',$id);
      $this->db->get('chats');

  }
 
}
?>
