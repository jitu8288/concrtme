<!-- MAIN -->
<div class="main">
<?= $this->Flash->render() ?>
<!-- MAIN CONTENT -->
<div class="main-content">
	<div class="container-fluid">
       <h3 class="page-title">Settings !</h3>	
       	<div class="row">
			<div class="col-md-12">
			 	<!-- INPUT Twilio -->
			 	<?= $this->Form->create() ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Twilio</h3>
					</div>
					<div class="panel-body">
					     <?= $this->Form->control('sid',['class' => 'form-control']) ?>		 <br>
						  <?= $this->Form->control('token',['class' => 'form-control']) ?>
						 <br>							  					 
					</div>
					 <div class="panel-footer">
					 	<?= $this->Form->button(__('Save',['class' => 'btn btn-default'])); ?>					 	
					 </div>
				</div>
				<?= $this->Form->end() ?>
				<!-- END INPUT Twilio -->

				<!-- INPUT Stripe -->
				<?= $this->Form->create() ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Stripe</h3>
					</div>
				 	<div class="panel-body">
					   <?= $this->Form->control('secret_key',['class' => 'form-control']) ?><br>
					   <?= $this->Form->control('publishable_key',['class' => 'form-control']) ?>
					    <br>							  					 
					</div>
					<div class="panel-footer">
					<?= $this->Form->button(__('Save',['class' => 'btn btn-default'])); ?>
					</div>
				</div>
				<?= $this->Form->end() ?>
				<!-- END INPUT Stripe -->

				<!-- INPUT Traditional -->
				<?= $this->Form->create() ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Traditional Booking Price</h3>
					</div>
					<div class="panel-body">
					<?= $this->Form->control('traditional_amount',['class' => 'form-control']) ?>
						<br>					 							  				
					</div>
					 <div class="panel-footer">
					 <?= $this->Form->button(__('Save',['class' => 'btn btn-default'])); ?></div>
				</div>
				<?= $this->Form->end() ?>
				<!-- END INPUT Traditional -->

				<!-- INPUT Ticket -->
				<?= $this->Form->create() ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Ticket Booking Price</h3>
					</div>
					<div class="panel-body">
					<?= $this->Form->control('ticket_amount',['class' => 'form-control']) ?>	
						  <br>							  					 
					</div>
				 <div class="panel-footer">
				 <?= $this->Form->button(__('Save',['class' => 'btn btn-default'])); ?>
			     </div>
				</div>
				<?= $this->Form->end() ?>
				<!-- END INPUT Ticket -->

			</div>
		</div>				
	</div>
</div>
<!-- END MAIN CONTENT -->
</div>
