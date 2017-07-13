 	<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			       <h3 class="page-title">Musicians!</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">							 
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Cell Number</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Steve</td>
												<td>985899885</td>
												<td>Active</td>
												<td><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-eye')).'', array('controller' => 'admin', 'action' => 'musicianProfile'), array('escape' => false)) ?></td>
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
 