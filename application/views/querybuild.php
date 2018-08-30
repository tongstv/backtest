<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
    
<div class="row">
    <div class="col-md-12">
        <div class="box">
           
            <div class="box-body">
                <div id="builder-basic"></div>

                                
                                
                                <?php echo form_open('',['id' => 'querybuild'])?>


<input type="hidden" name="mongo_code" id="mongocode" />
<input type="hidden" name="sql_code" id="sqlcode" />
<input type="hidden"  name="l_code" id="l_code" />
  <div class="form-group">
  
  <label class="control-label col-md-4">Name</label>
  <div class="col-md-7">
  
  <input class="form-control" name="l_name" value="<?php echo isset($l_name) ? $l_name : ""; ?>" placeholder="Name" />
  </div>
  </div>
  
    <div class="form-group">
    
    <?php if(isset($l_name)):
    ?>
    <input type="hidden" name="id" value="<?php echo $id?>" />
       <input type="submit" name="update" value="Cập nhập" class="btn btn-info" />
    
    <?php else:?>
    
       <input type="submit" name="submit" class="btn btn-success" />
    <?php endif;?>
    
    
   

    </div>


<?php echo form_close()?>
  

<a id="btn-get-sql" href="#"> get mysql</a>                                
            </div>
        </div>
    </div>
</div>
</section>
</div>





