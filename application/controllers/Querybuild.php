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
class Querybuild extends BaseController
{
    /**
     * This is default constructor of the class
     */

    protected $title = " Querybuild";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->library('grocery_CRUD');
        $this->load->dbforge();
        $this->load->helper('url');
    }
    
    function css()
    {
        
        header("Content-type: text/css");
        ob_start();
        
        ?>
        
            
        
        <?php
        ob_get_flush();
        
        
    }
    
    function script()
    {
        header( 'application/javascript' );
       
        
        ?>
        $(document).ready(function(){
    
   
   $("#crudForm").change(function(){
    

var formdata=$(this).serialize();
  $.post('<?php echo base_url() ?>querybuild/ajax',formdata).done(function(data){
    
    
    $("#viewdemo").html(data);
  });
  

    
   });
   
   
   
    
});
        
        <?php
      
        
    }

    function build($array)
    {
          $where="";
        
        extract($array);
        
    if(isset($query_join) AND $query_join == 1)
      {
        $where .= " OR ";
      }
      else if(isset($query_join) AND $query_join ==0)
      {
        $where .= " AND ";
      }
      
      
      
      if(isset($query_field) AND $query_field)
      {
        $result = $this->db->where('id',$query_field)->get("tbl_fields")->row(0);
        
        $where .= " ".$result->field_name. " ";
      }
      
      
      
      if(isset($query_logic) AND $query_logic)
      {
        
          $result = $this->db->where('id',$query_logic)->get('tbl_logics')->row(0);
        
        $where .=" ".$result->logic." ";
      }
      
      if(isset($query_value) AND $query_value)
      {
        if(is_numeric($query_value))
        {
              $where .= $query_value;
        }
        else
        {
              $where .= "'".$query_value."'";
        }
      
      }
      return $where;
        
    }
    function ajax()
    {
        
        
    
      extract($this->input->post());
      
      $where="";
      
      

      $result = $this->db->where('query_gid',$query_gid)->order_by('id','ASC')->get('tbl_querybuild')->result_array();

      
      if(count($result) > 0)
      {
        
        $where .=" (";
        
        unset($result[0]['query_join']);
          foreach($result AS $row)
      {
      
     
        
        $where .= $this->build($row);  
      }
      $where .=") ";
      }
      
      
      
      if(isset($query_join_gid))
      {
          $where .= $this->build($this->input->post());
        
         $result = $this->db->where('query_gid',$query_join_gid)->get('tbl_querybuild')->result_array();

       unset($result[0]['query_join']);
      if(count($result) > 0)
      {
        
        $where .=" (";
          foreach($result AS $row)
      {
      
     
        
        $where .= $this->build($row);  
      }
      $where .=") ";
      }
      }
      else
      {
          $where .= $this->build($this->input->post());
      }
      
     
  
      

    
      
    
      
      echo $where;
      
      
      
        
        
        
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
                    
                    'query_gid' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    ),
                    'query_join' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    ),
                    
                    'query_join_gid' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    ),
                    
                           'query_field' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
                    ),
                    
                     'query_logic' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    ),
                
                
                

         
                    
                     'query_value' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
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

    public function index($id=null)
    {
        $this->global['pageTitle'] = $this->title . ': Page';
        
        
        
            if($this->input->post('submit'))
            {
                
                
                
                
                if($this->input->post('l_name'))
                {
                    
                    
                    
                    $postval = array('l_name' => $this->input->post('l_name'),
                    
                    'l_code' =>  $this->input->post('l_code')
                    );
                    
                    $this->db->insert("tbl_listconfig",$postval);
                    
                    
                    $data['msg'] ="Add querybuild success";
                    
                
                    
                }
                
                
                
                
                
                
            }
        
        
            $data=[];
          $this->load->view('includes/header',$this->global);


       
        
        
        
        $fields = $this->db->get("tbl_fields")->result();
        
        foreach($fields AS $row)
        {
            
            
            $operator = "'".implode("', '",explode(",",$row->operator))."'";
            
            
            $str ="{
    id: '".$row->field_name."',
    label: '".$row->label."',
    type: '".$row->file_type."',";
    
    
    if($row->operator)
    {
        $str .="operators:[ ".$operator."],";
    }
    if($row->placeholder)
    {
        $str .="placeholder: '".$row->placeholder."',";
    }
    
    if($row->validation)
    {
        $str .=" validation: {
         format: /^".$row->validation."$/
    }";
    }
    $str .="}";
    
    $str = str_replace(',}','}',$str);
            
            $filter[] =$str;
            
        }
        
        
        $filters = join(",",$filter);
        
        $burl=base_url('querybuilder/');
        $body =<<<EOT
<link href="{$burl}jQuery-QueryBuilder/dist/css/query-builder.default.min.css" rel="stylesheet">

<script src="{$burl}moment/min/moment.min.js"></script>
<script src="{$burl}jQuery-QueryBuilder/dist/js/query-builder.standalone.min.js"></script>


<script src="{$burl}sql-parser.min.js"></script>
<script src="{$burl}interact.min.js"></script>

<script type="text/javascript">
	
$(document).ready(function(){


     var rules_basic = {
  condition: 'AND',
  rules: [{
    id: 'open',
    operator: 'less',
    value: 10.25
  }]
  
};

$('#builder-basic').queryBuilder({
  plugins: ['bt-tooltip-errors'],
  
  filters: [{$filters}],

  rules: rules_basic
});



$("input[name='submit']").click(function(){
     var result = $('#builder-basic').queryBuilder('getSQL', false);
   
       if (result.sql.length) {
      $("#sqlcode").val(result.sql);
      }
      
});
$("#querybuild").on('submit',function(){
    
      var result = $('#builder-basic').queryBuilder('getRules');
      

    $("#l_code").val(JSON.stringify(result, null, 2));
    
    
     var result2 = $('#builder-basic').queryBuilder('getSQL', false);
   
       if (result2.sql.length) {
      $("#sqlcode").val(result2.sql);
      }
      
      
       var result3 = $('#builder-basic').queryBuilder('getMongo');

  if (!$.isEmptyObject(result)) {
    $("#mongocode").val(result3);
    alert(JSON.stringify(result3, null, 2));
  }
    
     
    
});




$('#btn-get-sql').on('click', function() {
  var result = $('#builder-basic').queryBuilder('getSQL', false);

  if (result.sql.length) {
    alert(result.sql);
  }
});





});






</script>
EOT;



if($id !=null)
{
    $rs = $this->db->where("id",$id)->get('tbl_listconfig')->row(0);
    
    $code =$rs->l_code;
    
    
    $data['l_name'] = $rs->l_name;
    
    
    $body .=<<<EOT
    
    <script>
    $(document).ready(function(){
  
     $('#builder-basic').queryBuilder('setRules', {$code});
     });
    </script>
EOT;
    
    
    
    
}

if($id != null)
{
    $data['id']=$id;
}
else
$data['id']=0;

$data['body']=$body;

        $this->load->view('querybuild', $data);
 $this->load->view('includes/footer', $data);
    /*

        $crud = $this->grocery_crud;


        $unset_col = array('user_id', );


        if ($this->role == ROLE_ADMIN) {

        }

        $display_as = array('query_join' => 'AND/OR', );

        $required = array('query_value');



        $crud->unset_add_fields();
        


        $crud->set_table('tbl_' . strtolower(__class__))->set_subject($this->title)->
            display_as($display_as)->required_fields($required)->unset_columns($unset_col);



        // $crud->set_field_upload('image', 'assets/uploads/files');


        $crud->set_relation('query_field','tbl_fields','alias');
         $crud->set_relation('query_logic','tbl_logics','alias');
         
          $crud->set_relation('query_join_gid','tbl_querygroup','gname');
         
         $crud->field_type('query_join','true_false',[0 => 'AND',1 =>'OR']);
         
        $crud->field_type('query_gid','hidden',$this->uri->segment(4, 0));

        $output = $crud->render();
        
        array_push($output->js_files, base_url("querybuild/script")); 
             array_push($output->css_files, base_url("querybuild/css")); 

        $this->_example_output($output);
        
        */
    }
}
