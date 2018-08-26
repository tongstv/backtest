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
class Fields extends BaseController
{
    /**
     * This is default constructor of the class
     */

    protected $title = " Fields";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->library('grocery_CRUD');
        $this->load->dbforge();
    }

    function copy()
    {
        
        
        $this->db->query("Truncate tbl_fields");
        $result = $this->db->query("desc tbl_candlesd")->result();
        
        foreach($result AS $row)
        {
            
            if($row->Field !== 'id')
            {
                
                
                $insert = array('field_name' => $row->Field,'alias' => $row->Field);
                $this->db->insert("tbl_fields",$insert);
            }
        }
        
    }
    public function up()
    {


        if ($this->role == ROLE_ADMIN):

            $this->dbforge->drop_table('tbl_' . strtolower(__class__), true);
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 20,
                    'unsigned' => true,
                    'auto_increment' => true),
                'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    ),


                'user_id' => array(
                    'type' => 'int',
                    'constraint' => 20,
                    ),


                ));

            $this->dbforge->add_key('id', true);
            $attributes = array('ENGINE' => 'InnoDB');
            $this->dbforge->create_table('tbl_' . strtolower(__class__), false, $attributes);

        endif;
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
        $this->global['pageTitle'] = $this->title . ': Page';


        $crud = $this->grocery_crud;


        $unset_col = array('user_id', );


        if ($this->role == ROLE_ADMIN) {

        }

        $display_as = array('name' => 'Tên', );

        $required = array('name');
        
        
        $logics = $this->db->get("tbl_logics")->result_array();
        
        foreach($logics AS $logic)
        {
            $low[]=$logic['Alias'];
        }
        
        
        
        $crud->field_type('operator','set',$low);





        $crud->set_table('tbl_' . strtolower(__class__))->set_subject($this->title)->
            display_as($display_as)->required_fields($required)->unset_columns($unset_col);


        // $crud->set_field_upload('image', 'assets/uploads/files');


        //   $crud->set_relation('user_id','users','{username} - {last_name} {first_name}');

        $output = $crud->render();
        $this->_example_output($output);
    }
}
