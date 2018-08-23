
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
    
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Domains Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('domains/add'); ?>" class="btn btn-success btn-sm">Thêm mới</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Domain</th>
						<th>Master Ip</th>
						<th>Slave Ip</th>
						<th>Content</th>
						<th>Url Check</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($domains as $t){ ?>
                    <tr>
						<td><?php echo $t['id']; ?></td>
						<td><?php echo $t['domain']; ?></td>
						<td><?php echo $t['master_ip']; ?></td>
						<td><?php echo $t['slave_ip']; ?></td>
						<td><?php echo $t['content']; ?></td>
						<td><?php echo $t['url_check']; ?></td>
						<td>
                            <a href="<?php echo site_url('domains/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('domains/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>

</section>
</div>