 	<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			       <h3 class="page-title">Users !</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">							 
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#Id</th>
												<th>Name</th>
												<th>Cell Number</th>
												<th>Role</th>
												<th>Status</th>
												<th>Created Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($users as $user): ?>
											<tr>
												<td><?= $user->id ?></td>
												<td><?= $user->name ?></td>
												<td><?= $user->mobile ?></td>
												<td><?= $user->active==1?'Musician':'Organiser' ?></td>
												<td><?= $user->active==1?'<span class="label label-success">Active</span>':'<span class="label label-default">InActive</span>' ?></td>
												<td><?= date('d M Y', strtotime($user->created_at)) ?></td>
												<td><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-eye')).'', array('controller' => 'admin', 'action' => 'musicianProfile',$user->id ), array('escape' => false)) ?></td>
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
 