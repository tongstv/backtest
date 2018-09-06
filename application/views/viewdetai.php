<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
    
    <div>Total: <?php echo number_format($profit);?></div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
           
            <div class="box-body">
                

        
        <table class="table table-bordered">
        
        
            <thead>
            
            <tr>
            <td>Trade</td>
            <td>Type</td>
            <td>Signal</td>
                  <td>Date/time</td>
                        <td>Price</td>
                          <td>Contacts</td>
                          <td>lever</td>
                                <td>Profit</td>
            </tr>
            </thead>
        
                  <tbody>
                  
                  <?php
                  $i=0;
                   foreach($data AS $row):
                  $i++;
                  ?>
                    
                  <tr>
                 <td rowspan="2" class="text-center"><?php echo $i;?></td>
                       <td><?php echo $row->maker?></td>
                     
                        <td><?php echo $row->maker?></td>
                        
                             <td><?php echo date('d/m/Y H:i:s',$row->time);?></td>
                             
                             
                              <td><?php echo $row->price?></td>
                              
                                      <td rowspan="2" class="text-center"><?php echo $row->qty?></td>
                                         <td rowspan="2" class="text-center"><?php echo $row->lever?></td>
                                      
                                        <td rowspan="2"><?php echo $row->profit;?></td>
                        
                        
                  </tr>
                  
                  
                      
                  <tr>
              
                       <td><?php echo $row->bmaker?></td>
                     
                        <td><?php echo $row->bmaker?></td>
                        
                          <td><?php echo date('d/m/Y H:i:s',$row->btime);?></td>
                             
                             
                              <td><?php echo $row->bprice?></td>
                              
                                      
                        
                        
                  </tr>
                  
                  
                  <?php endforeach;?>
       
                </tbody></table>
                
                
                
        </div>
    </div>
</div>

</section>
</div>


