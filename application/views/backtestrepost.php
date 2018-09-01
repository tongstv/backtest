<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
    
<div class="row">
    <div class="col-md-12">
        <div class="box">
           
            <div class="box-body">
                

        
        <table class="table table-bordered">
        
        
            <thead>
            
            <tr>
            <td>#</td>
            <td>Strategies</td>
            <td>date Start</td>
                  <td>date end</td>
                        <td>Score</td>
            </tr>
            </thead>
        
                  <tbody>
                  
                  <?php foreach($data AS $row):
                  
                  ?>
                    
                  <tr>
                    <th style="width: 10px">#</th>
                    <th><?php echo $row->l_name?></th>
                     <th>
                     <?php echo ($row->date_start !='0000-00-00') ? $row->date_start : ""?>
                     </td>
                  
                     <th>
                     <?php echo ($row->date_end !='0000-00-00') ? $row->date_end : ""?>
                     </td>
                    
                    <th><?php echo $row->count?></th>
                    <th style="width: 40px">Label</th>
                  </tr>
                  
                  <?php endforeach;?>
       
                </tbody></table>
                
                
                
        </div>
    </div>
</div>

</section>
</div>


