<div class="panel panel-success">
  <div class="panel-heading">
    <h2 class="panel-title">Báo giá các dịch vụ ngoài hợp đồng</h2>
  </div>
  <div class="panel-body" style="margin: 0; padding: 0;">
 
 


 <table class="table table-bordered">
     <thead>
     <th class="active">Thứ tự</th>
     
          <th class="active">Tên</th>
          
                   <th class="active">Bộ phận</th>
                   
                       <th class="active">Chi phí</th>
     
     </thead>
      <tbody>
   <?php
$i = 0;


foreach ($data as $row):

   
    
    $i++;
?>
   

   

   
   

<tr data-name="<?php echo $row->bname ?>" data-price="<?php echo $row->gia?>">
 <td class="text-center"><?php echo $i ?></td>
 
 <td><?php echo $row->muc ?></td>
 <td><?php echo $row->bname ?></td>
  <td>
  
  
  
  <?php 
  
  if($row->gia)
  {
    echo number_format($row->gia);
  }
  else
  {
    echo "Miễn phí";
  }
  
  ?>
  </td>

   
   
   
   

   </tr>
   
   <?php 
   

   endforeach; ?>
   
    </tbody>
      </table>
      
  </div>
</div>