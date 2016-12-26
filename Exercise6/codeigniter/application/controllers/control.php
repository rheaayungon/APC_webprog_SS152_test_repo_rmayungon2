<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class control extends CI_Controller {
function __construct()
{
parent::__construct();
#$this->load->helper('url');
$this->load->model('mymodel');
}
public function index(){
	$this->load->view('main');
}
public function about(){
	$this->load->view('about');
}
public function hobbies(){
	$this->load->view('hobbies');
}
public function trivia(){
	$this->load->view('trivia');
}
public function form(){
	$data['user_list'] = $this->mymodel->get_all_users();
	$this->load->view('form', $data);
}
public function add_form()
{
$this->load->view('insert');
}
public function insert_users_db()
{
$udata['first_name'] = $this->input->post('first_name');
$udata['last_name'] = $this->input->post('last_name');
$udata['nickname'] = $this->input->post('nickname');
$udata['email'] = $this->input->post('email');
$udata['user_city'] = $this->input->post('user_city');
$udata['gender'] = $this->input->post('gender');
$udata['mobile'] = $this->input->post('mobile');
$udata['comment'] = $this->input->post('comment');
$res = $this->mymodel->insert_users_to_db($udata);
if($res){
header('location:'.base_url()."index.php/control/form");
}
}
public function edit(){
$user_id = $this->uri->segment(3);
 $data['users'] = $this->mymodel->getById($user_id);
$this->load->view('edit', $data);
}
public function update()
{
$mdata['first_name']=$_POST['first_name'];
$mdata['last_name']=$_POST['last_name'];
$mdata['nickname']=$_POST['nickname'];
$mdata['email']=$_POST['email'];
$mdata['user_city']=$_POST['user_city'];
$mdata['gender']=$_POST['gender'];
$mdata['mobile']=$_POST['mobile'];
$mdata['comment']=$_POST['comment'];
$res=$this->mymodel->update_info($mdata, $_POST['user_id']);
if($res){
header('location:'.base_url()."index.php/control/form");
}
}
public function delete($user_id)
{
$this->mymodel->delete_a_user($user_id);
$this->form();
}
}