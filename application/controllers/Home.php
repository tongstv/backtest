<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home extends ci_Controller
{
    /**
     * This is default constructor of the class
     */

    protected $title = " DEMO";
    public function __construct()
    {
        parent::__construct();

        $this->load->library('grocery_CRUD');
        $this->load->dbforge();


    }


    /**
     * This function used to load the first screen of the user
     */

    function call($to)
    {
        
        $ro =preg_replace('/[^0-9]/','',$ro);
        
        if(preg_match('/^0(1|9)(\d){8,9}$/',$to) == TRUE):
        
        
        
  
        
        if(!isset($_SESSION['to']))
        {    
    
    
        
        $data_request = [
        'api_key'    => '0df9434e2df5252aaaf961f33e028c0d',
        'id_script' => 239,
        'time_run'   => date('Y-m-d H:i:s'),
        'customers'  => [
            '0' => [
                'phone'  => $to,
                'fields' => [
                    'field1' => '',
                    'field2' => ''
                ]
            ]
        ]

    ];
    $ch           = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://crm.pavietnam.vn/api/scheduleAutoCall.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data_request));

    $result = curl_exec($ch);

    $_SESSION['to'] =$to;
    }
    
    endif;
    }
    public function _example_output($output = null)
    {

        $data['output'] = (array )$output;
        $this->load->view('home/header', $this->global);

        $this->load->view('crud', (array )$output);
        $this->load->view('home/footer', $data);
    }

    public function index()
    {
        $this->global['pageTitle'] = $this->title . ': Page';
        $data = array();

        if ($this->input->post('subbmit')) {


            $post = $this->input->post();


            extract($post);

            $title = "Hỗ trợ " . $website . " " . $muc;


            $detail = "Khách hàng: " . $fullname . "<br>";

            $detail .= "Điện thoại: " . $phone . "<br>";

            $detail .= "Website: " . $website . "<br>";
            $detail .= "====================================<br>";

            $detail .= "Tên đăng nhập: " . $user . "<br>";

            $detail .= "Mật khẩu: " . $pass . "<br>";


            $detail .= "====================================<br>";


            $detail .= "Nội dung công việc: <br>";


            if (isset($noidung))
                $detail .= $noidung;


            $chonbophan = $this->db->where('id', $chonbophan)->get('tbl_bophan')->row(0);


            $chonbophan = $chonbophan->bthanhvien;


            if (!is_numeric($chonbophan)) {

                $chonbophan = explode(',', $chonbophan);

                $chonbophan = $chonbophan[round(rand(1, count($chonbophan)))];

            }
            $file = '';

            if (!empty($_FILES['file']['name'])) {

                $config['upload_path'] = './assets/uploads/files';
                $config['allowed_types'] = 'gif|jpg|png|doc|docs|xls|zip|rar|xlsx|pdf|docx';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload', $config);
                // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $file =$this->upload->data('file_name');
                }


            }
            
            
            
            if(!empty($phone)) $this->call($phone);


            $data2 = ['cname' => $title, 'status' => 4, 'user_id' => $chonbophan, 'date_c' =>
                date('Y-m-d H:i:s'), 'detail' => $detail, 'file' => $file];
            $this->db->insert('tbl_congviec', $data2);
            $data['msg'] = "Chúng tôi đã nhận được công việc bạn gửi <br> vui lòng kiên nhẫn đợi.";
        }


        $data['dangsuly'] = $this->db->from("tbl_congviec")->join('tbl_trangthai',
            'tbl_trangthai.id = tbl_congviec.status')->join('tbl_users',
            'tbl_congviec.user_id = tbl_users.userId')->get()->result();
        $noidung = $this->db->where('ma !=', '')->get('tbl_noidung')->result();
        foreach ($noidung as $page) {

            $data[$page->ma] = $page;
        }

        $this->load->view('home/header', $data);
        $this->load->view('home/home', $data);
        $this->load->view('home/footer', $data);
    }
}
