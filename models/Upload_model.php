<?php
Class Upload_model extends CI_Model
{

  public function insert($id,$data){

                    $arraydata =array(
                                'stud_id'=>$id,
                                'passport'=>$data['filenames'][0],
                                'ielts_toefl'=>$data['filenames'][1],
                                'lor'=>$data['filenames'][2],
                                'resume'=>$data['filenames'][3],
                                'ug_transcript'=>$data['filenames'][4],
                                'ug_marksheet'=>$data['filenames'][5],
                                'ug_degree'=>$data['filenames'][6],
                                'gre_scorecard'=>$data['filenames'][7],
                                'grad_transcript'=>$data['filenames'][8],
                                'grad_marksheet'=>$data['filenames'][9],
                                'grad_degree'=>$data['filenames'][10],
                                'diploma_transcript'=>$data['filenames'][11],
                                'diploma_marksheet'=>$data['filenames'][12],
                                'diploma_certificate'=>$data['filenames'][13],
                                'sop'=>$data['filenames'][14],
                                'miscellaneous'=>$data['filenames'][15],
                                'uploaded'=>1
                            );

    $sql_query=$this->db->insert('uploaded_docs',$arraydata);
    
    if($sql_query)
    {
         $this->session->set_flashdata('success', 'Your Document Submitted successfully');

         $this->session->set_userdata('upd_status','true');
         redirect('view_doc');	
    }
    else{
            $error = $this->db->error();  
            $this->session->set_flashdata('error', 'Somthing went wrong. Try Again!!' .$error);   
            redirect('upload');		
        }
}

public function get_uploaded($id){
  $this->db->where('stud_id',$id);
  $query = $this->db->get('uploaded_docs');
  $count = $query->num_rows();
  if($count > 0){
    return $query->row()->uploaded;
  } else{
    return 'false';
  }
  
}


public function getstudent_docs($id){

    $this->db->where('stud_id',$id);
    $query = $this->db->get('uploaded_docs');

    if($query->num_rows()==1 ){
        return $query->result_array();        
    }
    else{
        return 'no_data';
    }

    

}


public function  update( $studid,$updfield,$filename){

        $data=array(
                         $updfield => $filename,
                   
                );
                  $sql_query= $this->db->where('stud_id', $studid);
                  $sql_query= $this->db->update('uploaded_docs',$data);
                  $afftectedRows =$this->db->affected_rows();
                    var_dump($afftectedRows);
                  if ($afftectedRows>=0)
                  {

                    $this->session->set_flashdata('success', 'Document Updated successfully');
                    redirect('view_doc');
                  }
                  else{
                    $error = $this->db->error(); 
                     return $error;
                        $this->session->set_flashdata('error', 'Something went wrong. Error!!');
                       redirect('view_doc');
                   
                  }
    

    } 

    public function  admin_update( $studid,$updfield,$filename){

        $data=array(
                         $updfield => $filename,
                   
                );
                  $sql_query= $this->db->where('stud_id', $studid);
                  $sql_query= $this->db->update('uploaded_docs',$data);
                  $afftectedRows =$this->db->affected_rows();
                    var_dump($afftectedRows);
                  if ($afftectedRows>=0)
                  {

                    $this->session->set_flashdata('success', 'Document Updated successfully');
                    return 'true';
                  }
                  else{
                    
                        $this->session->set_flashdata('error', 'Something went wrong. Error!!');
                     return 'false';
                  }
    

    }

public function get_veronica_ques(){
      $query = $this->db->get('question');

      return $query->result_array();

    } 

public function insert_ver_ques($ques,$answer,$action,$filename){
  $data = array('question' => $ques,
                'answer' => $answer,
                'action' => $action,
                'file' => $filename );

  $this->db->insert('question',$data);

  $afftectedRows =$this->db->affected_rows();
                    var_dump($afftectedRows);
                  if ($afftectedRows>=0)
                  {

                    $this->session->set_flashdata('success', 'Question Inserted successfully');
                    return 'true';
                  }
                  else{
                    
                        $this->session->set_flashdata('error', 'Something went wrong. Error!!');
                     return 'false';
                  }
}


public function insert_veronica_ques($ques,$answer,$action){
    $data = array('question' => $ques,
                'answer' => $answer,
                'action' => $action,
                 );

    $this->db->insert('question',$data);

  $afftectedRows =$this->db->affected_rows();
                    var_dump($afftectedRows);
                  if ($afftectedRows>=0)
                  {

                    $this->session->set_flashdata('success', 'Question Inserted successfully');
                    return 'true';
                  }
                  else{
                    
                        $this->session->set_flashdata('error', 'Something went wrong. Error!!');
                     return 'false';
                  }
}


public function update_ver_ques($id,$ques,$answer,$action,$filename){
  $data = array('question' => $ques,
                'answer' => $answer,
                'action' => $action,
                'file' => $filename );

  $this->db->where('id',$id);
  $this->db->update('question',$data);

  $afftectedRows =$this->db->affected_rows();
                    var_dump($afftectedRows);
                  if ($afftectedRows>=0)
                  {

                    $this->session->set_flashdata('success', 'Question Updated successfully');
                    return 'true';
                  }
                  else{
                    
                        $this->session->set_flashdata('error', 'Something went wrong. Error!!');
                     return 'false';
                  }
}


public function update_veronica_ques($id,$ques,$answer,$action){
    $data = array('question' => $ques,
                'answer' => $answer,
                'action' => $action,
                 );

    $this->db->where('id',$id);
    $this->db->update('question',$data);  

  $afftectedRows =$this->db->affected_rows();
                    var_dump($afftectedRows);
                  if ($afftectedRows>=0)
                  {

                    $this->session->set_flashdata('success', 'Question Updated successfully');
                    return 'true';
                  }
                  else{
                    
                        $this->session->set_flashdata('error', 'Something went wrong. Error!!');
                     return 'false';
                  }
}
 
}
?>
