<?php
Class Resume_model extends CI_Model
{

  function get_student_name_from_resume(){

   $query = $this->db->get('resume');
   return $query->result_array();
  }

  function get_all_resume(){
    // $this->db->join('education','education.resume_id=resume.resume_id');
   $query = $this->db->get('resume');
   return $query->result_array();
  }


  function delete_resume_by_id($resume_id){
      $this->db->where('resume_id',$resume_id);
      $this->db->delete('resume');

      return ($this->db->affected_rows()>0)? true : false;
  }

  function delete_project_by_resume_id($resume_id){
      $this->db->where('resume_id',$resume_id);
      $this->db->delete('academic_proj');

      return true;
  }

  function delete_internship_by_resume_id($resume_id){
      $this->db->where('resume_id',$resume_id);
      $this->db->delete('internship');

      return true;
  }

  function delete_work_exp_by_resume_id($resume_id){
      $this->db->where('resume_id',$resume_id);
      $this->db->delete('experience');

      return true;
  }

  function delete_education_detail_by_resume_id($resume_id){
      $this->db->where('resume_id',$resume_id);
      $this->db->delete('education');

      return true;
  }

  function insert_personal_detail(){
    
      $arrayData = array('student_name' => $this->input->post('stud_name'),
                          'address_line1' => $this->input->post('address'),
                          'address_line2' => $this->input->post('address2'),
                          'city' => $this->input->post('city'),
                          'state' => $this->input->post('state'),
                          'zipcode' => $this->input->post('zipcode'),
                          'contact_no' => $this->input->post('mobile_no'),
                          'email_id' => $this->input->post('email')
                           );
      $query = $this->db->insert('resume',$arrayData);

      return ($this->db->affected_rows()>0)? $this->db->insert_id() : false;
  }

  function get_education_data_by_resume_id($resume_id){

    $this->db->order_by('education_id','asc');
    $this->db->where('resume_id',$resume_id);
    $query = $this->db->get('education');

    return ($query->num_rows()>0)? $query->result_array() : false;

  }

  function insert_education_detail($resume_id){
     $arrayData = array('resume_id' => $resume_id,
                        'college_board' => $this->input->post('colleg_board'),
                        'education_level' => $this->input->post('edu_level'),
                        'degree_name' => $this->input->post('degree_name'),
                        'major' => $this->input->post('major'),
                        'duration' => $this->input->post('duration'),
                        'cgpa' => $this->input->post('cgpa'),
                           );

     $query = $this->db->insert('education',$arrayData);

      return ($this->db->affected_rows()>0)? true : false;
  }

  function insert_experience($resume_id){
    $arrayData = array('resume_id' => $resume_id,
                        'company_name' => $this->input->post('company_name'),
                        'position' => $this->input->post('position'),
                        'description' => $this->input->post('description'),
                        'duration' => $this->input->post('duration')                        
                          );

     $query = $this->db->insert('experience',$arrayData);

      return ($this->db->affected_rows()>0)? true : false;
  }

  function insert_internship($resume_id){
    $arrayData = array('resume_id' => $resume_id,
                        'company_name' => $this->input->post('company_name'),
                        'description' => $this->input->post('description'),
                        'duration' => $this->input->post('duration')                        
                        );

     $query = $this->db->insert('internship',$arrayData);

      return ($this->db->affected_rows()>0)? true : false;
  }

  function get_work_exp_by_resume_id($resume_id){
       $this->db->where('resume_id',$resume_id);
        $query = $this->db->get('experience');

        return ($query->num_rows()>0)? $query->result_array() : false;
  }

  function get_internship_by_resume_id($resume_id){
    
     $this->db->where('resume_id',$resume_id);
    $query = $this->db->get('internship');

    return ($query->num_rows()>0)? $query->result_array() : false;
  }

  function get_project_by_resume_id($resume_id){
    
     $this->db->where('resume_id',$resume_id);
    $query = $this->db->get('academic_proj');

    return ($query->num_rows()>0)? $query->result_array() : false;
  }

  function insert_proj_details($resume_id){
      $arrayData = array('resume_id' => $resume_id,
                        'proj_title' => $this->input->post('proj_title'),
                        'proj_subtitle' => $this->input->post('proj_subtitle'),
                        'duration' => $this->input->post('duration'),
                        'description' => $this->input->post('description')                         
                        );

     $this->db->insert('academic_proj',$arrayData);

      return ($this->db->affected_rows()>0)? true : false;
  }

  function update_resume_to_add_activities($resume_id)
  {
      $arrayData = array('activities' => $this->input->post('activites'),
                        'achievement' => $this->input->post('achievement'),
                        'technical_skills' => $this->input->post('technical_skills'),
                        'hobbies' => $this->input->post('hobbies')                         
                        );

      $this->db->where('resume_id', $resume_id);
      $this->db->update('resume',$arrayData);

      return true;
  }


  function get_resume_by_id($resume_id){
      $this->db->where('resume_id',$resume_id);
      $query = $this->db->get('resume');

      return ($query->num_rows()>0)? $query->row() : false;

  }


  //updation queries

  function update_personal_detail(){
    $arrayData = array('student_name' => $this->input->post('stud_name'),
                          'address_line1' => $this->input->post('address'),
                          'address_line2' => $this->input->post('address2'),
                          'city' => $this->input->post('city'),
                          'state' => $this->input->post('state'),
                          'zipcode' => $this->input->post('zipcode'),
                          'contact_no' => $this->input->post('mobile_no'),
                          'email_id' => $this->input->post('email')
                           );

    $this->db->where('resume_id',$this->input->post('resume_id'));

    $query = $this->db->update('resume',$arrayData);

    if($query):
        return true;
    else:
        return false;
    endif;
    
  }

  function update_education_detail($education_id){
     $arrayData = array('resume_id' => $this->session->userdata('resume_id'),
                        'college_board' => $this->input->post('college_board'),
                        'education_level' => $this->input->post('edu_level'),
                        'degree_name' => $this->input->post('degree_name'),
                        'major' => $this->input->post('major'),
                        'duration' => $this->input->post('duration'),
                        'cgpa' => $this->input->post('cgpa')
                           );

     $this->db->where('education_id',$education_id);
     $query = $this->db->update('education',$arrayData);

     if($query):
        return true;
     else:
        return false;

     endif;
  }

  function update_work_exp($exp_id){
      $arrayData = array('company_name' => $this->input->post('company_name'),
                        'position' => $this->input->post('position'),
                        'description' => $this->input->post('description'),
                        'duration' => $this->input->post('duration')                        
                          );
      $this->db->where('exp_id',$exp_id);
     $query = $this->db->update('experience',$arrayData);

      if($query):

        return true;

      else:
        return false;

      endif;

  }

  function update_internship($intern_id){
      $arrayData = array('company_name' => $this->input->post('company_name'),
                          'duration' => $this->input->post('duration'),                          
                        'description' => $this->input->post('description')
                      );
      $this->db->where('internship_id',$intern_id);
      $query = $this->db->update('internship',$arrayData);

      if($query):

        return true;

      else:
        return false;

      endif;

  }

  function update_academic_proj($project_id){
      $arrayData = array('proj_title' => $this->input->post('proj_title'),
                        'proj_subtitle' => $this->input->post('proj_subtitle'),
                        'duration' => $this->input->post('duration'),
                        'description' => $this->input->post('description')                         
                        );
     
      $this->db->where('proj_id',$project_id);
      $query = $this->db->update('academic_proj',$arrayData);

      if($query):

        return true;

      else:
        return false;

      endif;

  }

//deleting queries

  function delete_education_detail($education_id){
      
      $this->db->where('education_id',$education_id);

      $this->db->delete('education');

      return ($this->db->affected_rows()>0)? true : false;

  }
 
  function delete_work_exp($exp_id){
    $this->db->where('exp_id',$exp_id);

      $this->db->delete('experience');

      return ($this->db->affected_rows()>0)? true : false;
  }

  function delete_internship($internship_id){
    $this->db->where('internship_id',$internship_id);

      $this->db->delete('internship');

      return ($this->db->affected_rows()>0)? true : false;
  }


  function delete_project($project_id){
      $this->db->where('proj_id',$project_id);

      $this->db->delete('academic_proj');

      return ($this->db->affected_rows()>0)? true : false;
  }

}
?>
