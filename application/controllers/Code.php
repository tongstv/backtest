<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Code extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->library('grocery_CRUD');
    }

    /**
     * This function used to load the first screen of the user
     */

    public function _example_output($output = null)
    {

        $data['output'] = (array )$output;
        $this->load->view('includes/header', $this->global);

        $this->load->view('crud', (array )$output);
        $this->load->view('includes/footer', $data);
    }

    public function index()
    {
        $this->global['pageTitle'] = 'Demo: Page';


        $crud = $this->grocery_crud;
        
        
        $display_as = array(
        'name' => 'Tên',
        'des' => 'Mô Tả',
        'code' => 'Mã code',
        'gr' =>'Phân nhóm'
        
        );
        
        $required = array(
        'fullname',
        'phone',
        'address'
        );
        
        $crud->set_table('tbl_code')->set_subject("Code")->display_as($display_as)->required_fields($required);
        
        $crud->set_relation("gr","tbl_group","name");
        
        $crud->set_field_upload('image', 'assets/uploads/files');




        $output = $crud->render();
        $this->_example_output($output);


      //  $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
}
