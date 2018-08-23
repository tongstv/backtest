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
class Congviecadmin extends BaseController
{
    /**
     * This is default constructor of the class
     */
     
    protected $title="công việc của admin";
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

    public function _example_output($output = null)
    {

        $data['output'] = (array )$output;
        $this->load->view('includes/header', $this->global);

        $this->load->view('crud', (array )$output);
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
    
    
    

    
    


    $crud->set_relation('user_id','tbl_users','{name}');
 #$crud->field_type('user_id', 'hidden', $this->vendorId);
 
      $unset_col[] = 'user_id';

        
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
            '',
            's',
            '',
            'status'
    
            
            
            );
            
        
                
                $crud->where('user_id',$this->vendorId);
          

        $crud->set_table('tbl_congviec' )->set_subject($this->title)->display_as($display_as)->
            required_fields($required)->unset_columns($unset_col);





    
    
    
   
        
  
        $crud->callback_column($this->unique_field_name('status'),function($value,$row){
            
            
        
        $status = $value;
        
        
        $rs = $this->db->from("tbl_trangthai")->where('id',$row->status)->get()->row(0);
        
        
        
        
        if($rs->tname =='Mới')
        {
            
            if($row->date_s  AND time() > strtotime('+2 day',strtotime($row->date_s)))
            {
                  return  "<b style='color:red'>".$rs->tname."<b>";
            }
            
            
        }
        
        
         
        if($rs->tname =='Đang thực hiện')
        {
              if($row->date_e !=''  AND strtotime('-1 day',strtotime($row->date_e)) < time())
            {
                  return  "<b style='color:red'>".$rs->tname."<b>";
            }
            
            if($row->date_e !=''  AND strtotime('-2 day',strtotime($row->date_e)) < time())
            {
                  return  "<b style='color:#DEA508'>".$rs->tname."<b>";
            }
            
            
          
            
            
        }
        
        
        return  "<b style='color:".$rs->color."'>".$rs->tname."<b>";
        
        
        
        
    
     
        });
        
        
        
        
        $crud->callback_column('cname',function($value,$row){
           
           
           return "<a href ='".base_url('congviecadmin')."/index/read/".$row->id."'>".$value."</a>"; 
        });
        
       // $crud->set_field_upload('image', 'assets/uploads/files');
       
       $crud->set_field_upload('file','assets/uploads/files');

     $crud->set_relation('status','tbl_trangthai','tname');
        $output = $crud->render();
        $this->_example_output($output);
    }
}
