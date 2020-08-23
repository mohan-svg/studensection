<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sreg'] = "Admin/studentregister";
$route['auni'] = "Admin/adduniversity";
$route['listuni'] = "Admin/listuniversity";
$route['insertstud'] = "Admin/insertstudent";
$route['insertuni'] = "Admin/insertuniveristy";
$route['view/:num'] = "Admin/viewuniversity";
$route['edit/:num'] = "Admin/edituniversity";
$route['edits/:num'] = "Admin/editstudent";
$route['updateuni'] = "Admin/updateuniversity";
$route['updatestud'] = "Admin/updatestudent";
$route['del/:num'] = "Admin/deleteuniversity";
$route['alcheck'] = "Admin/adminlogincheck";
$route['stcheck'] = "Student/studentlogincheck";
$route['adduniname'] = "Admin/adduniversityname";
$route['uniname'] = "Admin/universityname";
$route['logout'] = "Admin/logout";
$route['slogout'] = "Student/slogout";
$route['deluname/:num'] = "Admin/deluname";
$route['edituname/:num'] = "Admin/edituname";
$route['delsname/:num'] = "Admin/delstudent";
$route['querry'] = "Student/sendmessage";
$route['upload'] = "Upload/index";
$route['upload_documents'] = "Upload/stud_docs_upload";
$route['view_doc'] = "Upload/view_documents";
$route['updatefile'] = "Upload/update_documents";

$route['dashboard'] = "Upload/student_dashboard";
$route['dashboard1'] = "Upload/student_dashboard";
$route['sview'] = "Student/studentdashboard";
$route['stud_view'] = "Upload/stview";
$route['stlogout/:num'] = "Student/logouted";

$route['adminlogin'] = "Admin/index";

//Sop questionaire

$route['sop']='Sop/index';
$route['sopQues']='Sop/sop_ques';
$route['thnkyou']='Sop/thank_u';
$route['error']='Sop/errored';
// $route['admin']='Sop/login';

// $route['admin_sign_in']='Sop/signin';
// $route['dashboard']='Sop/admin_dashboard';
// $route['logout']='Sop/log_out';
$route['sopss']='Sop/sop_search';
$route['sop_edit']='Sop/edit_question';
$route['sop_update']='Sop/update_question';

$route['sop']='Sop/index';
$route['sopQues']='Sop/sop_ques';

$route['save_link/:num']='Sop/view_save_link';
$route['thnkyou']='Sop/thank_u';
$route['error']='Sop/errored';	

//View Documents

$route['docss']='Sop/doc_search';
$route['adminupdatefile'] = "Upload/admin_update_documents";

//Veronica 

$route['ver_ques'] = "Upload/veronica_ques";
$route['ver_chats'] = "Upload/veronica_chat_history";
$route['ver_edit_ques'] = "Upload/veronica_edit_ques";
$route['ver_insert_ques'] = "Upload/veronica_insert_ques";
$route['view_chats'] = "Upload/view_chat_history";

//GRE Test

$route['gre_test'] = "Student/gre_login";

$route['gre_topic'] = "Student/gre_topic";
$route['resumes/:num'] = "Sop/resumeSop";
// $route['resume'] = "Sop/resume_sop";
// $route['resume_id'] = "Sop/resume_id";
$route['imaget'] = "Student/image";

//Expense Management
$route['credit_amount'] = "Expense/insert_credited_amount";
$route['edit_credit_account'] = "Expense/update_credited_amount";
$route['delete_income_account'] = "Expense/delete_credited_amount";
$route['expenses_s'] = "Expense/expenses";
$route['expense_insert'] = "Expense/insert_expenses";
$route['expense_update'] = "Expense/update_expenses_amount";
$route['total_income'] = "Expense/view_total_income";
$route['delete_expenses'] = "Expense/delete_expense_account";
$route['transaction'] ="Expense/view_transaction"; 
$route['trans_search'] ="Expense/transaction_list"; 
$route['transactions'] ="Expense/view_all_transactions"; 
$route['evaluate_accounts'] = "Expense/search_all_transactions";
$route['account_summary'] = "Expense/accounts_summary";

//ICAD Student
$route['icad_status'] = "Icad/index";
$route['insert_icad_data'] = "Icad/insert_icad_student";
$route['update_icad_data'] = "Icad/update_icad_student";
$route['delete_icad_data'] = "Icad/delete_icad_status";
$route['icad_users'] = "Icad/add_icad_users";
$route['insert_icad_user'] = "Icad/insert_icad_users";
$route['update_ic_user'] = "Icad/update_icad_user";
$route['delete_ic_user'] = "Icad/delete_icad_user";

$route['icad'] = "Icad/login";
$route['check_login'] = "Icad/login_check";
$route['icad_data'] = "Icad/icad_student_data";

$route['logout_user'] = "Icad/icad_logout";

$route['search_by_student'] = "Student/search_by_name";

//Resume
$route['before_create_resume'] = "Resume/destroy_redirect";
$route['create_resume'] = "Resume/create_resumes";

$route['view_stud_resume'] = "Resume/view_student_resume";
$route['view_all_resume'] = "Resume/view_all_resume";

$route['education'] = "Resume/education_details";
$route['work_exp'] = "Resume/work_exp_details";
$route['academic_proj'] = "Resume/academic_project";
$route['technical_skills'] = "Resume/technical_skills";
$route['view_resume'] = "Resume/view_created_resume";


$route['add_personal'] = "Resume/add_personal_details";
$route['add_education'] = "Resume/add_education_details";
$route['add_work_exp'] = "Resume/add_work_exp_details";
$route['add_academic_proj'] = "Resume/add_academic_project";
$route['add_other_details'] = "Resume/add_other_details";

$route['create_resume_pdf'] = "Resume/index";


//editing Resume

$route['update_personal'] = "Resume/update_personal_details";
$route['update_education'] = "Resume/update_education_details";
$route['update_work_exp'] = "Resume/update_work_exp_details";
$route['update_internship'] = "Resume/update_internship_details";
$route['update_academic_proj'] = "Resume/update_project_details";
$route['update_technical_skills'] = "Resume/update_technical_skills";

//deleting Resume data
$route['delete_education'] = "Resume/delete_education_details";
$route['delete_work_exp'] = "Resume/delete_work_exp_details";
$route['delete_internship'] = "Resume/delete_internship_details";
$route['delete_academic_proj'] = "Resume/delete_project_details";
$route['delete_resume'] = "Resume/delete_resume_data";


$route['to_word'] = "Resume/convert_to_word";

//view single resume

$route['view_single_resume/:num'] = "Resume/view_single_resume";
$route['edit_single_resume/:num'] = "Resume/edit_single_resume";
