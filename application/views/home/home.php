
<div class="row">



<div class="col-md-7">


<div class="panel panel-success">
  <div class="panel-heading sell">
    <h2 class="panel-title"><i class="glyphicon glyphicon-send"></i> Gửi yêu cầu hỗ trợ cho STV</h2>
  </div>
  <div class="panel-body">
  
  <?php echo form_open_multipart('/', ['class' => 'form-horizontal', 'id' => 'hotro']) ?>



    <div class="form-group ">
    
    <label class="control-label col-md-4">Chọn bộ phận: (*)</label>
    <div class="col-md-7">
    
    
    <?php if(isset($msg)):?>
    
    
    <span style="font-size: 15px; color: green;">
    <?php echo $msg;?></span>
    
    <?php endif;?>
   
   <?php

$bophan = $this->db->select("bname, id")->from('tbl_bophan')->get()->result();


$option[''] = 'Chọn bộ phận hỗ trợ';
foreach ($bophan as $row) {
    $option[$row->id] = $row->bname;
}

echo form_dropdown(['class' => 'form-control', 'id' => 'chonbophan', 'name' =>
    'chonbophan'], $option, 'bophan');
?>
    
    

        </div>
    </div>


<input type="hidden" name="muc" id="muc" />

  <div class="form-group">
  
  <label class="control-label col-md-4">Họ và tên: (*)</label>
  <div class="col-md-7">
  
  <input class="form-control" name="fullname"  />
  </div>
  </div>
  
  
  
  <div class="form-group">
  
  <label class="control-label col-md-4">Mobile: (*)</label>
  <div class="col-md-7">
  
  <input class="form-control" name="phone"  />
  </div>
  </div>
  
  
  
  <div class="form-group">
  
  <label class="control-label col-md-4">Trang web: (*)</label>
  <div class="col-md-7">
  
  <input class="form-control" name="website"  />
  </div>
  </div>
  
  
  <div class="form-group">
  
  <label class="control-label col-md-4">Tên đăng nhập web</label>
  <div class="col-md-7">
  
  <input class="form-control" name="user"  />
  </div>
  </div>
  
   <div class="form-group">
  
  <label class="control-label col-md-4">Mật khẩu</label>
  <div class="col-md-7">
  
  <input class="form-control" type="password" name="pass"  />
  </div>
  </div>

<div class="form-group">
    
    <label class="control-label col-md-4">Nội dung </label>
    <div class="col-md-7">
    
    <textarea class="form-control" rows="10" name="noidung"></textarea>
        </div>
    </div>
    
      <div class="form-group">
      
      <label class="control-label col-md-4">File gửi kèm</label>
      <div class="col-md-7">
      
      <input class="form-control" name="file" type="file"  />
      </div>
      </div>
      <div class="form-group">
      
     
     <?php echo form_submit('subbmit', 'Gửi yêu cầu hỗ trợ', ['class' =>
'btn btn-lg btn-success center-block']) ?>
     
      </div>
<?php echo form_close() ?>
  
  <div><?php echo @$huongdan->detail?></div>
  
  </div>
</div>




<div class="panel panel-success">
  <div class="panel-heading">
    <h2 class="panel-title"><?php echo @$uutien->title?><i class="glyphicon glyphicon-bookmark pull-right"></i></h2>
  </div>
  <div class="panel-body">
  <?php echo @$uutien->detail?>
   
  </div>
</div>


<div class="panel panel-success">
  <div class="panel-heading">
    <h2 class="panel-title">Khách hàng được ưu tiên <div class="pull-right"><span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span></div></h2> 
  </div>
  <div class="panel-body" style="height: 350px; overflow: auto;">
  <table class="table">
  <tbody>
   <?php


$this->db->order_by('pos', 'asc');
$uutien = $this->db->get('tbl_khachhanguutien')->result();


$s=0;

foreach($uutien AS $row):
$s++;
?>


<tr>

<td class="text-center"><?php echo $s?></td>

<td><?php echo $row->fullname?></td>
<td class="text-center"><?php echo $row->website?></td>
<td class="text-center"><?php echo $row->dv?></td>
<td class="text-right">

<?php for($i=1;$i<= $row->star; $i++):?>

<span class="glyphicon glyphicon-star"></span>
<?php
endfor;
?>

</td>
</tr>
<?php

endforeach;
?>

</tbody>

</table>
   
  </div>
  
</div>
</div>
<div class="col-md-5">

<div class="panel panel-success">
  <div class="panel-heading panel-dangsuly">
    <h2 class="panel-title">Đang được sử lý & mới <span class="pull-right"><i class="glyphicon glyphicon-pencil"></i><i class="glyphicon glyphicon-pencil"></i><i class="glyphicon glyphicon-pencil"></i><i class="glyphicon glyphicon-pencil"></i><i class="glyphicon glyphicon-pencil"></i></span></h2>
  </div>
  <div class="panel-body" style="max-height: 630px; overflow: auto; padding: 0;" >

    <div class="marquee ver" data-direction=up data-duration=8000>
     <table class="table" >
     <thead>
     <th class="active">STT</th>
     
          <th class="active">Tên công việc</th>
          
                   <th class="active">Bộ phận</th>
                   
                       <th class="active">Tiếp nhận</th>
     
     </thead> <tbody>

   <?php
$i = 0;


foreach ($dangsuly as $row):

    if ($row->tname != 'Đã hoàn thiện'):

        $i++;
?>
   

   

   <tr>
   

 <td class="text-center"><?php echo $i ?></td>
 
 <td><?php echo $row->cname ?></td>
  <td><?php echo $row->name ?></td>
  <td><?php if($row->date_c): echo date( 'd/m/Y',strtotime($row->date_c));endif ?></td>


   </tr>
   
   
   

   
   
   <?php

    endif;
endforeach; ?>

    </tbody>
      </table>

  </div>
  <div><strong>Chúng tôi còn tổng số<strong style="color: red;"> <?php echo $i?> </strong>công việc đang làm!</strong></div>
</div>



<div class="panel panel-success" style="border: 0;">
  <div class="panel-heading panel-dahoanthien">
    <h2 class="panel-title"><i class="glyphicon glyphicon-ok"></i> Đã hoàn thành <span  class="pull-right"><i class="glyphicon glyphicon-ok"></i> <i class="glyphicon glyphicon-ok"></i> <i class="glyphicon glyphicon-ok"></i> <i class="glyphicon glyphicon-ok"></i> <i class="glyphicon glyphicon-ok"></i> </span></h2>
  </div>
  <div class="panel-body" style="max-height: 700px; overflow: auto; padding: 0;">
  
     <table class="table">
     <thead>
     <th class="active">STT</th>
     
          <th class="active">Tên</th>
          
                   <th class="active">Bộ phận</th>
                   
                       <th class="active">Hoàn thành</th>
     
     </thead>
      <tbody>
   <?php
$i = 0;


foreach ($dangsuly as $row):

    if ($row->tname == 'Đã hoàn thiện'):

        $i++;
?>
   

   

   
   <tr>

 
 <td class="text-center"><?php echo $i ?></td>
 
 <td><?php echo $row->cname ?></td>
  <td><?php echo $row->name ?></td>
  <td><?php if($row->date_c): echo date( 'd/m/Y',strtotime($row->date_c));endif ?></td>

</tr>
   
   
   
   

   
   
   <?php

    endif;
endforeach; ?>
    </tbody>
      </table>
 
  </div>
  
    </div>
         <div>Gần đây chúng tôi đã sử lý xong <?php echo $i?> công việc!</div>
</div>
</div>
</div>
<style>
input.error,select.error
{
    border: 1px solid red;
  
}
.error
{
    font-size: 11px;

    color: red;
}

input, select
{
    border-radius: 0 !important;
}
</style>
<script>
window.addEventListener('DOMContentLoaded', function() {
    
    
    
    var url ='<?php echo base_url() ?>assets/plugins/jquery.validate.min.js';
    
    $.getScript( url, function() {



    $("#hotro").validate({
            rules: {
                fullname: "required",
                website: "required",
                 phone: "required",
               
                   chonbophan:{
                      required: true,
                   
                    
                   },
                diachi: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                fullname: "Vui lòng nhập họ tên",
                website: "Vui lòng nhập trang web",
                phone: 'Vui lòng nhập số điện thoại của bạn',
                chonbophan: 'Vui lòng chọn bộ phận hỗ trợ',
                muc: 'Bạn chưa chọn mục cần hỗ trợ!',
                diachi: {
                    required: "Vui lòng nhập địa chỉ",
                    minlength: "Địa chỉ ngắn vậy, chém gió ah?"
                }
            }
        });
        


});


        
    
   $("#chonbophan").change(function(){
        
        id =$(this).find('option:selected').val();
        
    
    $("#rs").remove();
    
    if(id > 0)
    {
           $.get('<?php echo base_url() ?>baogiadichvu/index/'+id).done(function(data){
        
        
    var html ='<div id="rs"> <span class="text-danger">Nếu hỗ trợ của quý khách thuộc danh mục trả phí vui lòng chọn, hoặc bỏ qua nếu là miễn phí hoặc cần báo giá.</span>';
    
    html += data;
    html += '</div>';
         $("#chonbophan").after(html);
    });
        
    }

   
    
    $(document).on('click','tr',function(){
        
       
       $(this).toggleClass('active'); 
       
       
          var muc='';
          var price='';
    $("tr.active").each(function(){
        
       
    
    muc += $(this).data('name') + ': ' + $(this).data('price') + "<br>";

      
        
    });       
    
    
        $("#muc").val(muc);
    });
    
 
    
    });
 
 
 
});



</script>
