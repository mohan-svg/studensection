<?php
Class Icad_model extends CI_Model
{

    public function icad_student_data(){
    $this->db->join('student','student.stud_id=icad_student_status.icad_stud_id');

    $query  = $this->db->get('icad_student_status');
    return $query->result_array();
  }

   public function get_university_name(){
    $query = $this->db->get('university_name');
    return $query->result_array();
   }

   public function insert_stud_data($stud_id,$university_name,$course,$term,$status){
    $data = array( 'icad_stud_id' => $stud_id,
      'university_name' => $university_name,
      'student_course' => $course,
      'student_term' => $term,
      'student_status' => $status,
      );
    $query = $this->db->insert('icad_student_status',$data);

    if($this->db->insert_id() != 0){
      return 'true';
    } else{
      return 'false';
    }

   }

    public function update_icad_student($icad_id,$university_name,$course,$term,$status){
    $data = array('university_name' => $university_name,
      'student_course' => $course,
      'student_term' => $term,
      'student_status' => $status,
      );
    $this->db->where('icad_ss_id',$icad_id);
    $query = $this->db->update('icad_student_status',$data);

    if($this->db->affected_rows() != 0){
      return 'true';
    } else{
      return 'false';
    }

   }

   public function delete_icad_stud_status($icad_id){
    $this->db->where('icad_ss_id',$icad_id);
    $query = $this->db->delete('icad_student_status');

    if($query){

      return 'true';
    } else{

      return 'false';
    }
   }

    public function get_icad_users(){
    $query = $this->db->get('icad_user');
    return $query->result_array();
   }

   public function insert_icad_user($username,$password,$status){
      $data = array('icad_username' => $username,
      'icad_pass' => $password,
      'user_status' => $status);
      $query = $this->db->insert('icad_user',$data);

        if($this->db->insert_id() != 0){
          return 'true';
        } else{
          return 'false';
        }
   }

   public function update_icad_user($ss_id,$username,$password,$status){
      $data = array('icad_username' => $username,
      'icad_pass' => $password,
      'user_status' => $status);
      $this->db->where('icad_user_id',$ss_id);
      $query = $this->db->update('icad_user',$data);
        if($this->db->affected_rows() != 0){
          return 'true';
        } else{
          return 'false';
        }
   }

   public function delete_icad_user($id){
      $this->db->where('icad_user_id',$id);
      $query = $this->db->delete('icad_user');

      if($query){
        return 'true';
      } else{
        return 'false';
      }
   }

   public function loginuser($adminname,$adminpswd){
      $this->db->where('icad_username',$adminname);
      $this->db->where('icad_pass',$adminpswd);
      $this->db->where('user_status','active');
      $query = $this->db->get('icad_user');

      if($query->num_rows()>0){

        $data = array('usname'=>$adminname,
                'icad_login' =>'true');
        $this->session->set_userdata($data);

        return 'true';
      } else{
        return 'false';
      }

   }

   public function get_icad_students(){
      $this->db->group_by('icad_stud_id');
      $this->db->order_by('student.firstname');
      $this->db->join('student','icad_student_status.icad_stud_id=student.stud_id');
      $query=$this->db->get('icad_student_status');

      return $query->result_array();

   }

   public function get_all_students(){
      $this->db->group_by('icad_stud_id');
      $this->db->order_by('icad_ss_id','desc');
      $this->db->join('student','icad_student_status.icad_stud_id=student.stud_id');
      $query=$this->db->get('icad_student_status');

      return $query->result_array();

   }

   public function get_student_by_id($id){
      $this->db->where('icad_stud_id',$id);
      $this->db->group_by('icad_stud_id');
      $this->db->join('student','icad_student_status.icad_stud_id=student.stud_id');
      $query=$this->db->get('icad_student_status');

      return $query->result_array();

   }
 
}
?>
