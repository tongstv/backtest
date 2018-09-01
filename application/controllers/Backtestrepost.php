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
class Backtestrepost extends BaseController
{
    /**
     * This is default constructor of the class
     */

    protected $title = " Backtestrepost";
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


    public function event_check($l_id, $date_start, $date_end)
    {


        $res = $this->db->from("tbl_listconfig")->where("id", $l_id)->limit(1)->get()->row(0);
       


        $and = " AND (start >=  " . $date_start . " AND start <= " . $date_end .
            ")";


        $sql = "select * from tbl_candlesd WHERE " . $res->sql_code . "" . $and .
            " order by start ASC limit 1";


        $res = $this->db->query($sql);

        if ($res->num_rows()) {


            $result = $res->result();

        print_r($result);
            return $result;


        }


    }
    public function get_sql_where($sql, $array)
    {

        $r = [];

        $sql = "select * from tbl_candlesd " . $sql;


        $res = $this->db->query($sql);

        $row['count'] = $res->num_rows();


        $r['count'] = $res->num_rows();


        return $r;


    }
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

        $this->load->view('includes/header', $this->global);


        $data = [];


        $this->db->from("tbl_backtest")->join('tbl_listconfig',
            'tbl_backtest.code = tbl_listconfig.id', 'left');

        $result = $this->db->get()->result();


        $and = '';
        foreach ($result as $row) {
          

            if ($row->events != ''):


                if (stristr($row->events, ',')) {

                    $eventlist = explode(',', $row->events);


                    $total_score = 0;


                    foreach ($eventlist as $event) {


                        $sres = $this->event_check($event, strtotime($row->date_start), strtotime($row->
                            date_end));


                    }

                } else {
                    
                    
                    
                     $sres = $this->event_check($row->events, strtotime($row->date_start), strtotime($row->
                            date_end));


                }


            else:


                if ($row->date_start != '0000-00-00' and $row->date_end != '0000-00-00') {
                    $and = " AND (start >=  " . strtotime($row->date_start) . " AND start <= " .
                        strtotime($row->date_end) . ")";
                }


                $check = $this->get_sql_where("WHERE " . $row->sql_code . "" . $and, []);

                $row->count = $check['count'];
                $data['data'][] = $row;


            endif;

            }


            $this->load->view('Backtestrepost', $data);


            $this->load->view('includes/footer', $data);
        }
    }
