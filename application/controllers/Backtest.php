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
class Backtest extends BaseController
{
    /**
     * This is default constructor of the class
     */

    protected $title = " Backtest";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->library('grocery_CRUD');
        $this->load->dbforge();
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
                    
                    
                     'date_start' => array(
                    'type' => 'date',
                 
                    ),
                    
                       'date_end' => array(
                    'type' => 'date',
                 
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

        $display_as = array('code' => 'Strategies', );

        $required = array('name');




        $crud->set_table('tbl_' . strtolower(__class__))->set_subject($this->title)->
            display_as($display_as)->required_fields($required)->unset_columns($unset_col);


        // $crud->set_field_upload('image', 'assets/uploads/files');


         $crud->set_relation('code','tbl_listconfig','{l_name}');

        $output = $crud->render();
        $this->_example_output($output);
    }
}
