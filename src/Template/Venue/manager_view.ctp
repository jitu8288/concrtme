<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
	<?= $this->Flash->render() ?>
		<div class="container-fluid">
		    <div class="btn-block pull-right">
	       		  <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr  lnr-plus-circle')).' Add Manager', array('controller' => 'venue', 'action' => 'managerAdd' , $venue_id), array('escape' => false,'class' => "btn btn-primary pull-right")) ?>  
	        </div>
	       <h3 class="page-title">Managers !</h3>
			<div class="row">
				<div class="col-md-12">
					<!-- TABLE HOVER -->
					<div class="panel">							 
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Name</th>
										<th>Email</th>									
										<th>Cell Number</th>
										<th>Status</th>
										<th>Actions</th>
										
									</tr>
								</thead>
								<tbody>
							  	<?php foreach ($managers as $manager): ?>
									<tr>
										<td><?= $manager->id ?></td>	
										<td><?= $manager->name ?></td>
										<td><?= $manager->email ?></td>	
										<td><?= $manager->mobile ?></td>
										<td><?= $manager->active==1?'<span class="label label-success">Active</span>':'<span class="label label-default">InActive</span>' ?>
                                         </td>
									      <td><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-pencil')).'', array('action' => 'managerEdit' , $manager->id , $venue_id), array('escape' => false)) ?>&nbsp;&nbsp;
											
                                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'lnr lnr-trash')).'',['action' => 'managerDelete' , $manager->id],['confirm' => 'Are you sure?','escape' => false])
										?></td>

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

	.switch {
  position: relative;
  display: inline-block;
  width: 35px;
  height: 15px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 12px;
  width: 12px;
  left: -3px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>