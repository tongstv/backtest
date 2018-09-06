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
    
    var $last_id =0;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();


    }

    public function repost($array)
    {
        
        if($this->last_id)$array['eid'] = $this->last_id;
        $this->db->insert("tbl_repost", $array);
        
        $this->last_id = $this->db->insert_id();

    }
    public function exitmaket($array)
    {

    }
    public function enter($event, $row, $pid)
    {
          $eid= $event->eid;

        $event = $this->event_check($row->id, $event->start, strtotime($row->date_end));
        if (is_object($event) and $event->start) {

            $event->eid=$eid;
            $data = ['lid' => $eid, 'maker' => $row->maker, 'time' => $event->start,
                'qty' => $row->Quantity, 'lever' => $row->lever, 'fee' => $row->fee, 'price' =>
                $event->vwp, 'pid' => $pid];
            $this->repost($data);


            $this->exitmarket($event, $row, $pid);

        }


    }

    public function exitmarket($event, $row, $pid)
    {
        $eid= $event->id;
        $event = $this->event_check($row->exitmarket, $event->start, strtotime($row->
            date_end));
        if (is_object($event) and $event->start) {


            $data = ['lid' => $row->exitmarket, 'maker' => ($row->maker =='Long' ? 'ExitLong' : 'ExitShort'), 'time' => $event->start,
                'qty' => $row->Quantity, 'lever' => $row->lever, 'fee' => $row->fee, 'price' =>
                $event->vwp, 'pid' => $pid, 'eid' => $eid];
            $this->repost($data);

            if ($event->start < $row->date_end) {
                if ($this->event_check($row->events, $event->start, strtotime($row->date_end))) {
                    $event = $this->event_check($row->events, $event->start, strtotime($row->
                        date_end));
                    $this->enter($event, $row, $pid);
                }
            }


        }

    }


    public function event_check($l_id, $date_start, $date_end)
    {


        $res = $this->db->from("tbl_listconfig")->where("id", $l_id)->limit(1)->get()->
            row(0);


        $and = " AND (start >=  " . $date_start . " AND start <= " . $date_end . ")";


        $sql = "select * from tbl_candlesd WHERE " . $res->sql_code . "" . $and .
            " order by start ASC limit 1";


        $res2 = $this->db->query($sql);

        if ($res2->num_rows()) {

            
           
            $result = $res2->result();
            
            $result[0]->eid  =$l_id;

            return $result[0];


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

    public function check_repost($pid)
    {

        return $this->db->where("pid", $pid)->get("tbl_repost")->num_rows();


    }

    public function viewdetail($id)
    {
      
      
      
      $result =$this->db->query("select a.*, b.maker AS bmaker, b.price AS bprice, b.time AS btime from tbl_repost a LEFT JOIN tbl_repost b ON a.id = b.eid AND a.pid = ".$id."  WHERE a.maker NOT LIKE 'Exit%' order by a.id DESC")->result();
      

        $sum =0;
        $i=0;
        foreach($result AS $row)
        {
            
            if(!isset($row->bprice))
            {
                continue;
            }
            $i++;
            
            
            $mg = ($row->qty * $row->lever);
            
            
           
            
            if($row->bprice == $row->price)
            {
                  $row->profit = - ($mg*(double) $row->fee)/10000;
                  
                  
            }
            else
            {
                 $row->profit = (($row->bprice - $row->price)/$row->price)*$row->lever*$row->qty - ($mg*$row->fee)/10000;
                 
                 
            }
            
          
          $sum += $row->profit;
          
          
            $data['data'][] =$row;
        }      

      
      $data['profit']=$sum;
      $data['trades'] = $i;
      
      $this->loadViews("viewdetai",$this->global,$data,$this->global);
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

            $pid = $row->id;

            $check_report = $this->check_repost($pid);


            if ($check_report > 0) {
                $row->count = $check_report;
                $data['data'][] = $row;

                continue;

            } else {
                $row->count = 0;

            }


            if ($row->events != ''):


                if (stristr($row->events, ',')) {

                    $eventlist = explode(',', $row->events);


                    $check = 0;

                    $i = 0;
                    foreach ($eventlist as $event) {

                        $i++;


                        $check[$i] = $this->event_check($event, strtotime($row->date_start), strtotime($row->
                            date_end));

                        if (is_object($check[$i])) {
                            $check[$i] = $this->event_check($event, strtotime($check[$i]->date_start),
                                strtotime($row->date_end));
                        }


                    }


                } else {


                    $event = $this->event_check($row->events, strtotime($row->date_start), strtotime
                        ($row->date_end));


                    if ($event->start) {
                        $this->enter($event, $row, $pid);
                    }


                }


                $data['data'][] = $row;


            endif;

        }


        $this->load->view('Backtestrepost', $data);


        $this->load->view('includes/footer', $data);
    }
}
