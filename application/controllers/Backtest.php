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
                'b_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    ),
                    
                    'b_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    ),


                ));

            $this->dbforge->add_key('id', true);
            $attributes = array('ENGINE' => 'InnoDB');
            $this->dbforge->create_table('tbl_' . strtolower(__class__), false, $attributes);

        endif;
    }


    public function index()
    {
        $data=[];
        
           $this->load->view('includes/header',$this->global);
       $this->load->view('backtest', $data);

$body="<script src='".base_url('assets/')."plugins/daterangepicker/daterangepicker.js'></script>

  <link rel=\"stylesheet\" href='".base_url('assets/')."plugins/daterangepicker/daterangepicker-bs3.css'><script>

$(document).ready(function(){
      $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
});


</script>
";
$data['body']=$body;


 $this->load->view('includes/footer', $data);
    }
}
