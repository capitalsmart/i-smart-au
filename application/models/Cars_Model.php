<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Cars_Model extends CI_Model  {

    protected $_table_name = 'user';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_rules = array();
    protected $_timestamps = FALSE;

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
    }

    public $rules = array(

        'first_name' => array(
            'field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'trim|xss_clean',
//            "errors" => array('name_check' => 'The %s field may only contain alphabetical characters.')
        ),
        'surname' => array(
            'field' => 'surname',
            'label' => 'surname',
            'rules' => 'trim|xss_clean',
//            "errors" => array('name_check' => 'The %s field may only contain alphabetical characters.')
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'trim|required|valid_email|xss_clean',
        ),
        'phone' => array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'trim|xss_clean',
            "errors" => array('phone_check' => 'Please enter valid phone number like (+1234567890 or 1234567890).')
        ),
        'order_number' => array(
            'field' => 'order_number',
            'label' => 'Order Number',
            'rules' => 'trim|required|xss_clean',
        ),
        'csra_site' => array(
            'field' => 'csra_site',
            'label' => 'Site',
            'rules' => 'trim|required|xss_clean',
        ),
        'car_make' => array(
            'field' => 'car_make',
            'label' => 'Car make',
            'rules' => 'trim|required|xss_clean',
        ),
        'car_model' => array(
            'field' => 'car_model',
            'label' => 'Car model',
            'rules' => 'trim|required|xss_clean',
          //  "errors" => array('name_check' => 'The %s field may only contain alphabetical characters.')
        ),
        'vehicle_registration' => array(
            'field' => 'vehicle_registration',
            'label' => 'Registration  ',
            'rules' => 'trim|required|xss_clean',
       //     "errors" => array('name_check' => 'The %s field may only contain alphabetical characters.')
        ),
        'car_year' => array(
            'field' => 'car_year',
            'label' => 'Car year',
            'rules' => 'trim|xss_clean',
        ),
        'car_type' => array(
            'field' => 'car_type',
            'label' => 'Car year',
            'rules' => 'trim|xss_clean',
        ),
        'vin_number' => array(
            'field' => 'vin_number',
            'label' => 'VIN Number',
            'rules' => 'trim|xss_clean',
        ),
        'car_color' => array(
            'field' => 'car_color',
            'label' => 'Car Color',
            'rules' => 'trim|xss_clean',
        ),
        'comments' => array(
            'field' => 'comments',
            'label' => 'Comments',
            'rules' => 'trim|xss_clean'
        ),
    );
    function get_cars_list($key) {

            $this->db->like('name', $key,'after');
            $query = $this->db->get('car_make');
            return $query->result();

    }

    function get_car($key) {

              $query = $this->db->get_where('car_make', array('id' => $key));
        return $query->result();

    }

}
