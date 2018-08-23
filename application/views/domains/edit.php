
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    
    <section class="content">
    
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Domains Edit</h3>
            </div>
			<?php echo form_open('domains/edit/'.$domains['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="domain" class="control-label"><span class="text-danger">*</span>Domain</label>
						<div class="form-group">
							<input type="text" name="domain" value="<?php echo ($this->input->post('domain') ? $this->input->post('domain') : $domains['domain']); ?>" class="form-control" id="domain" />
							<span class="text-danger"><?php echo form_error('domain');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="master_ip" class="control-label"><span class="text-danger">*</span>Master Ip</label>
						<div class="form-group">
							<input type="text" name="master_ip" value="<?php echo ($this->input->post('master_ip') ? $this->input->post('master_ip') : $domains['master_ip']); ?>" class="form-control" id="master_ip" />
							<span class="text-danger"><?php echo form_error('master_ip');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="slave_ip" class="control-label"><span class="text-danger">*</span>Slave Ip</label>
						<div class="form-group">
							<input type="text" name="slave_ip" value="<?php echo ($this->input->post('slave_ip') ? $this->input->post('slave_ip') : $domains['slave_ip']); ?>" class="form-control" id="slave_ip" />
							<span class="text-danger"><?php echo form_error('slave_ip');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="content" class="control-label"><span class="text-danger">*</span>Content</label>
						<div class="form-group">
							<input type="text" name="content" value="<?php echo ($this->input->post('content') ? $this->input->post('content') : $domains['content']); ?>" class="form-control" id="content" />
							<span class="text-danger"><?php echo form_error('content');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="url_check" class="control-label"><span class="text-danger">*</span>Url Check</label>
						<div class="form-group">
							<textarea name="url_check" class="form-control" id="url_check"><?php echo ($this->input->post('url_check') ? $this->input->post('url_check') : $domains['url_check']); ?></textarea>
							<span class="text-danger"><?php echo form_error('url_check');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>

</section>
</div>