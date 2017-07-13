<div class="users form">
<?= $this->Flash->render() ?>
<div class="users index large-12 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Role</th>
                    
        </tr>
    </thead>
    <tbody>
	<?php foreach ($users as $user): ?>
		 <tr>
	            <td><?= $user->id ?></td>
	            <td><?= $user->name ?></td>
	            <td><?= $user->mobile ?></td>
	            <td><?= $user->role ?></td>	         
	        </tr>
	<?php endforeach; ?>
    </tbody>
    </table>
</div>
</div>