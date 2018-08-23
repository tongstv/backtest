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
class Congviec extends BaseController
{
    /**
     * This is default constructor of the class
     */
     
    protected $title="Backtest";
    
    var $ajax=0;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->library('grocery_CRUD');
          $this->load->dbforge();
    }

 function unique_field_name($field_name) {
	    return 's'.substr(md5($field_name),0,8); //This s is because is better for a string to begin with a letter and not with a number
    }
   

    /**
     * This function used to load the first screen of the user
     */

    function ajax()
    {
        $this->ajax=1;
        $this->index();
    }
    public function _example_output($output = null)
    {

        $data['output'] = (array )$output;
                if($this->ajax==0)
        $this->load->view('includes/header', $this->global);

        $this->load->view('crud', (array )$output);
        if($this->ajax==0)
        $this->load->view('includes/footer', $data);
    }

    public function index()
    {
        $this->global['pageTitle'] = $this->title. ': Page';


        $crud = $this->grocery_crud;


    $unset_col =
    
    array(
    'user_id',
    
    
    
    
    );
    
    
    
    $crud->unset_bootstrap();
    
    
    




        
        $display_as = array(
        
        
        
            'cname' => 'Tên công việc',
            'status' => 'Trạng thái',
            'date_c' =>'Ngày tạo',
            'date_s' =>'Ngày thực hiện',
            'date_e' =>'Ngày hoàn thành',
            'detail' => 'Chi tiết công việc',
            'user_id' =>'Nhân viên thực hiện'

            
            
            
            );

        $required = array(
        
        
        
        
            'name',
            'detail',
           
            'status'
    
            
            
            );
            
 
    
        $crud->set_table('backtest')->set_subject($this->title)->display_as($display_as)->order_by('id','desc')->
            required_fields($required)->unset_columns($unset_col);

    
        
        
        

    

        
       // $crud->set_field_upload('image', 'assets/uploads/files');

   $crud->set_field_upload('file','assets/uploads/files');
   
   
   
        $output = $crud->render();
        $this->_example_output($output);
    }
}
