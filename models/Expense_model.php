<?php
Class Expense_model extends CI_Model
{

      public function get_income_data(){
        $this->db->join('student','student.stud_id=amount_income.stud_id');
        $this->db->join('expent_card','expent_card.card_id=amount_income.account_id');
        $this->db->join('transactions','transactions.credit_id=amount_income.income_id');
        $query = $this->db->get('amount_income');
        return $query->result_array();

      }

       public function get_student(){
        $query = $this->db->get('student');
        return $query->result_array();
       }

       public function get_account_info(){
        $query = $this->db->get('expent_card');
        return $query->result_array();
       }

       public function get_stud_name_by_id($stud_id){

        $this->db->where('stud_id',$stud_id);
        $query = $this->db->get('student');

        $firstname = $query->row()->firstname;
        $lastname = $query->row()->lastname;

        return $firstname."_".$lastname;
       }

       // public function insert_income_amount($stud_id,$amount, $date,$account_id,$purpose){

       //    $data = array('stud-id' => $stud_id,
       //    'account_id' => $account_id,
       //    'amount' => $amount,
       //    'purpose' => $purpose,
       //    'date_receive' => $date,
       //    ' balance_remaining' => $amount);
       //    $this->db->insert('amount_income',$data);

       // }

       public function update_credits($id,$purpose,$date,$usd,$filename){

          $data = array(
                  'amt_in_dollars'=>$usd,
                  'purpose' => $purpose,
                'date_receive' => $date,
                'income_receipt' => $filename
                );

              $this->db->where('income_id',$id);
          $query = $this->db->update('amount_income',$data);

          if($query){
            return 'true';

          } else{

            return 'false';
          }
       }

       public function delete_account_income($id){
          $this->db->where('income_id', $id);
          $query = $this->db->delete('amount_income');

          if($query){
            return 'true';
          } else{
            return 'false';
          }
       }

    public function get_expense_data(){
      $this->db->join('student','student.stud_id=expense_record.stud_id');
      $this->db->join('expent_card','expent_card.card_id=expense_record.expent_card_id');
      $this->db->join('transactions','transactions.debit_id=expense_record.expense_id');
      $query = $this->db->get('expense_record');

      return $query->result_array();
    }

    public function update_expenses($id,$purpose,$date,$filename){

      $data =  array('expent_purpose' =>$purpose,
                    'expent_date' =>$date,
                    'expent_receipt'=>$filename );

      $this->db->where('expense_id',$id);
      $query = $this->db->update('expense_record',$data);

      if($query){

        return 'true';

      } else{

        return 'false';

      }
    }


    public function get_income_amount($stud_id,$account_id){

      $this->db->where('stud_id',$stud_id);
      $this->db->where('account_id',$account_id);
      $this->db->order_by('income_id','desc');
      $this->db->limit(1);
      $query = $this->db->get('amount_income');

      if($query->num_rows()>0){
        return $query->row()->balance_remaining;
      } else{
        return 0;
      }

    }

    public function delete_expense_account($id){

          $this->db->where('expense_id', $id);
          $query = $this->db->delete('expense_record');

          if($query){
            return 'true';
          } else{
            return 'false';
          }
       }

    public function update_balance($stud_id,$account_id,$amount){

        $data = array('balance_remaining' => $amount );

        $this->db->where('stud_id',$stud_id);
        $this->db->where('account_id',$account_id);
        $this->db->order_by('income_id','desc');
        $this->db->limit(1);
        $query = $this->db->update('amount_income',$data);

        return 'true';
    }

    public function update_balance_expense($stud_id,$account_id,$amount){

        $data = array('account_balance' => $amount );

        $this->db->where('stud_id',$stud_id);
        $this->db->where('expent_card_id',$account_id);
        $this->db->order_by('expense_id','desc');
        $this->db->limit(1);
        $query = $this->db->update('expense_record',$data);

        return 'true';
    }

    public function insert_transactions($stud_id,$type,$account,$amount,$usd,$purpose,$date,$bal_amount,$credit_id,$debit_id,$filename,$admin_name){


      $data = array('stud_id'=>$stud_id,
            'trans_type'=>$type,
            'account_id'=>$account,
            'credit_id'=>$credit_id,
            'debit_id'=>$debit_id,
            'amount'=>$amount,
            'trans_amt_dollars'=>$usd,
            'purpose'=>$purpose,
            'date'=>$date,
            'account_balance'=>$bal_amount,
            'trans_receipt'=>$filename,
            'updated_by' =>$admin_name
            );

      $this->db->insert('transactions',$data);
    }

      public function get_transaction($id){


          $this->db->join('student','student.stud_id=transactions.stud_id');
          $this->db->join('expent_card','expent_card.card_id=transactions.account_id');
          $this->db->where('transactions.stud_id',$id);
          $this->db->order_by('transactions.trans_id','asc');
          $query = $this->db->get('transactions');

          if($query){
            return $query->result_array();
          } else{
            return 'false';
          }
      }

      public function get_student_by_id($st_id){
        $this->db->where('stud_id',$st_id);
        $query = $this->db->get('student');

        return $query->row();

      }

      public function get_total_credits_pa($id){
        $this->db->where('stud_id',$id);
        $this->db->where('account_id',1);
        $this->db->where('trans_type','credit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
        return $query->row()->amount;
      } else{
        return 0;
      }
      }

      public function get_total_debits_pa($id){
        $this->db->where('stud_id',$id);
        $this->db->where('account_id',1);
        $this->db->where('trans_type','debit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
          return $query->row()->amount;
        } else{
          return 0;
        }
      }


       public function get_total_credits_so($id){
        $this->db->where('stud_id',$id);
        $this->db->where('account_id',2);
        $this->db->where('trans_type','credit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
          return $query->row()->amount;
        } else{
          return 0;
        }
      }

      public function get_total_debits_so($id){
        $this->db->where('stud_id',$id);
        $this->db->where('account_id',2);
        $this->db->where('trans_type','debit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
          return $query->row()->amount;
        } else{
          return 0;
        }
      }

       public function get_total_credits_se($id){
        $this->db->where('stud_id',$id);
        $this->db->where('account_id',3);
        $this->db->where('trans_type','credit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
          return $query->row()->amount;
        } else{
          return 0;
        }
      }

      public function get_total_debits_se($id){
        $this->db->where('stud_id',$id);
        $this->db->where('account_id',3);
        $this->db->where('trans_type','debit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
          return $query->row()->amount;
        } else{
          return 0;
        }
      }

     public function get_trans_balance_per_accounts($account_id){
        $this->db->where('account_id',$account_id);
        $this->db->order_by('trans_id','desc');
        $this->db->limit(1);
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
          return $query->row()->account_balance;
        } else{
          return 0;
        }
     }

     public function update_credit_in_transaction($id,$purpose,$date,$usd,$filename){

        $data = array('trans_amt_dollars'=>$usd,
                      'purpose' => $purpose,
                      'date'=>$date,
                      'trans_receipt'=>$filename
                       );
        $this->db->where('credit_id',$id);
        $this->db->where('trans_type','credit');
        $query = $this->db->update('transactions',$data);

        if($query){
          return 'true';
        } else{
          return 'false';
        }
     }


     public function update_debit_in_transaction($id,$purpose,$date,$filename){

        $data = array('purpose' => $purpose,
                      'date'=>$date,
                      'trans_receipt'=>$filename
                       );
        $this->db->where('debit_id',$id);
        $this->db->where('trans_type','debit');
        $query = $this->db->update('transactions',$data);

        if($query){
          return 'true';
        } else{
          return 'false';
        }
     }

     public function get_transaction_by_account($account_id){
      $this->db->join('expent_card','expent_card.card_id=transactions.account_id');
      $this->db->join('student','student.stud_id = transactions.stud_id');
      $this->db->where('transactions.account_id',$account_id);
      $query = $this->db->get('transactions');

      if($query->num_rows() > 0){
        return $query->result_array();
      } else{
        return 'false';
      }
     }


    public function get_total_credits_by_account($account_id){
        $this->db->where('account_id',$account_id);
        $this->db->where('trans_type','credit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
        return $query->row()->amount;
        } else{
          return 0;
        }
    }

    public function get_total_debits_by_account($account_id){
        $this->db->where('account_id',$account_id);
        $this->db->where('trans_type','debit');
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');

        if($query->num_rows() > 0){
        return $query->row()->amount;
      } else{
        return 0;
      }
    }

    public function get_account_by_id($account_id){

        $this->db->where('card_id',$account_id);
        $query = $this->db->get('expent_card')->row();

        return $query;

    }
 
}
?>
