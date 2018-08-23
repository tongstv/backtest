
   <?php 
        if(isset($css_files)):
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; 
endif;
?>
<?php 
if(isset($js_files)):
foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach;

endif;
 ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
    
<div class="row">
    <div class="col-md-12">
        <div class="box">
           
            <div class="box-body">
               <?php

 echo $output;
 ?>
                                
            </div>
        </div>
    </div>
</div>

</section>
</div>