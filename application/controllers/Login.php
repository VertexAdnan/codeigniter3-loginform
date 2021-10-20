<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $customerid = $this->session->userdata('customerid');
    $this->load->helper('user_helper'); // load our helper.
    $this->load->view('login/_head');
    /*if (!isset($customerid)) { ///
      redirect(base_url('login'));
    }*/
  }

  public function index() // Index page controller
  {
    $this->login();
  }

  public function login()
  {
    $this->load->view('login/login');

    if (isset($_POST['login'])) {
      $this->loginprocess();
    }
  }

  public function loginprocess() /* We want to use different controller for now */
  {
    $username = $this->input->post('username'); // in codeigniter we're using input->post
    $password = $this->input->post('password');

    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->limit('1');
    $result = $this->db->get(); // taking result from db
    $result->result();
    $check = $result->num_rows();

    if ($check >= 1) {
      $data = array(
        'customerid' => getuser($username)->customerid,
        'username' => $username,
        'password' => $password
      );
      $this->db->set('lastlogin', date("Y-m-d"));
      $this->db->where('username', $username);
      $this->db->update('users');

      $this->session->set_userdata($data); // Inserting data to session
      $this->session->set_flashdata('message', 'Customerid:' . getuser($username)->customerid . 'Username:' . $username);
      redirect(base_url('login')); // Success page
    } else {
      $this->session->set_flashdata('message', 'Wrong username or password');
      redirect(base_url('login'));
    }
  }

  public function logout()
  {
    $session = $this->session->userdata('customerid');
    if (!isset($session)) {
      $this->session->set_flashdata('message', 'You have to sign in!');
      redirect(base_url('login'));
    }
    $data = array(
      'customerid',
      'username',
      'password'
    );
    $this->session->unset_userdata($data);
    $this->session->set_flashdata('message', 'Session destroyed');
    redirect(base_url('login'));
  }
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */