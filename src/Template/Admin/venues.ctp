<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
	<?= $this->Flash->render() ?>
		<div class="container-fluid">
		    <div class="btn-block pull-right">
	       		  <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr  lnr-plus-circle')). ' Add Vanues', array('controller' => 'admin', 'action' => 'venueAdd'), array('escape' => false,'class' => "btn btn-primary pull-right")) ?>  
	        </div>
	       <h3 class="page-title">Venues !</h3>
			<div class="row">
				<div class="col-md-12">
					<!-- TABLE HOVER -->
					<div class="panel">							 
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Logo</th>
										<th>Name</th>
										<th>Sub domain</th>
										<th>Manager</th>									
										<th>Actions</th>
										
									</tr>
								</thead>
								<tbody>
							  	<?php foreach ($venues as $venue): ?>
									<tr>
										<td><?= $venue->id ?></td>
										<td><?= $this->Html->image('venue/'.$venue->logo, array('alt' => $venue->name , 'class' => "venue_img")) ?></td>
										<td><?= $venue->name ?></td>
										<td><?= $venue->subdomain ?></td>
										<td>
									    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-eye')).'', array('controller' => 'venue', 'action' => 'managerView', $venue->id), array('escape' => false, 'title'=> 'View Manager')) ?>
									  </td>
                                      <td><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-pencil')).'', array('controller' => 'admin', 'action' => 'venueEdit',  $venue->id   ), array('escape' => false)) ?>&nbsp;&nbsp;
                                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'lnr lnr-trash')).'',['action' => 'venueDelete', $venue->id],['confirm' => 'Are you sure?','escape' => false])
										?> 
										</td>
										
									</tr>
									<?php endforeach; ?>					
									</tbody>
							</table>
						</div>
					</div>
					<!-- END TABLE HOVER -->
				</div>
			</div>					
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<style type="text/css">
	.venue_img{
		height: 40px;
	}
</style>