<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
		    <div class="btn-block pull-right">
	       		  <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr   lnr-chevron-left')).' Back', array('controller' => 'venue', 'action' => 'managerView' , $venue_id), array('escape' => false,'class' => "btn btn-default pull-right")) ?>  
	        </div>

			<h3 class="page-title">Add Manager</h3>
			<?= $this->Form->create('Venue') ?>
			<div class="row">
				<div class="col-md-12">
	 				<!-- INPUTS -->
					<div class="panel">						
						<div class="panel-body">
						<?= $this->Form->control('name',['class' => 'form-control']) ?>
						<br>
						<?= $this->Form->control('email',['class' => 'form-control']) ?>
						<br>
						<?= $this->Form->control('password',['class' => 'form-control']) ?>
						<br>
						<?= $this->Form->control('mobile',['class' => 'form-control']) ?>
						<br>
					    <?= $this->Form->control('venue_id' , ['default' => $venue_id ,'type' => 'hidden']) ?>						
					  </div>
					</div>
					<!-- END INPUTS -->
				</div>
			</div>
			<?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary pull-left']); ?>
			<?= $this->Form->end() ?>
		</div>
 	</div>
    <!-- END MAIN CONTENT -->
</div>		