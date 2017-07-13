<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('mobile') ?>
        <?= $this->Form->control('password') ?>
   </fieldset>
   <fieldset>
      <?= $this->Html->link('Login','/users/login'); ?>
    </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>