<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Add Venue</h3>
			<?= $this->Form->create('Venue',array('enctype' => 'multipart/form-data')) ?>
			<div class="row">
				<div class="col-md-12">
	 				<!-- INPUTS -->
					<div class="panel">						
						<div class="panel-body">
						<?= $this->Form->control('name',['class' => 'form-control']) ?>
						<br>
						<?= $this->Form->control('subdomain',['class' => 'form-control']) ?>
						<br>
						<?= $this->Form->control('age_restricted',['label' => 'Age Restricted(In Year, if not set default 0)', 'default' => 0, 'class' => 'form-control']) ?>
						<br>
						<label>Open Time</label>
						<?= $this->Form->select('open_time', $open_times ,['default' => 0,'class' => 'form-control']) ?>
						<br>
						<label>Close Time</label>
						<?= $this->Form->select('close_time', $open_times ,['default' => 23,'class' => 'form-control']) ?>
						<br>
						<label>Slot Interval(In hours)</label>
						<?= $this->Form->select('slot_interval', [1,2,3,4,6] ,['default' => 0,'class' => 'form-control']) ?>
						<br>
						<label>Break Time(In minute)</label>
						<?= $this->Form->select('break_time', [0,5,10,15,20,25,30,35,40,45,50,55,60] ,['default' => 0 ,'class' => 'form-control']) ?>	
						<br>					
						<?= $this->Form->input('logo', ['label' => 'Logo','type' => 'file']); ?>
					  </div>
					</div>
					<!-- END INPUTS -->
				</div>
			</div>
			<?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary pull-right']); ?>
			<?= $this->Form->end() ?>
		</div>
 	</div>
    <!-- END MAIN CONTENT -->
</div>		