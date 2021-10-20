<?php
defined('BASEPATH') or exit('No direct script access allowed');
// ------------------------------------------------------------------------

if (!function_exists('getuser')) {
  function getuser($username)
  {
    $ci = &get_instance();

    $ci->db->select('*');
    $ci->db->from('users');
    $ci->db->where('username', $username);
    $res = $ci->db->get();
    $result = $res->row();

    return $result;
  }
}

// ------------------------------------------------------------------------

/* End of file User_helper.php */
/* Location: ./application/helpers/User_helper.php */