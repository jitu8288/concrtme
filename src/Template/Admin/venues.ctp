 	<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			       <h3 class="page-title">Venues !</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">							 
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Logo</th>
												<th>Name</th>
												<th>Subdomain</th>
												<th>Parent</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td><?= $this->Html->image('concrt_me_logo.svg', array('alt' => 'Name' , 'class' => "venue_img")) ?></td>
												<td>C21</td>
												<td>c21</td>
												<td>0</td>
												<td>Enable/Disable</td>
												<td><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-pencil')).'', array('controller' => 'admin', 'action' => 'venueEdit',1 ), array('escape' => false)) ?>&nbsp;&nbsp;
												<?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-trash')).'', array('controller' => 'admin', 'action' => 'deleteVenue',1 ), array('escape' => false)) ?>					  </td>
											</tr>											
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
 