<div class="container">
  <h1 class="page-header">Profile</h1>
  <div class="row">
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-warning alert-dismissible">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
         Please complete you Personal info .
      </div>
      <h3>Personal info</h3>
      <?= $this->Form->create($user ,array('enctype' => 'multipart/form-data' , 'class' => 'form-horizontal')) ?>
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('name',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('email',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>
       <div class="form-group">
          <label class="col-lg-3 control-label">Genre:</label>
          <div class="col-lg-8">
            <?= $this->Form->select('genre',MUSICIAN_GENRE ,['default' => 0,'class' => 'form-control']) ?>
          </div>
        </div>

       
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
           <?= $this->Form->button(__('Continue'), ['class' => 'btn btn-primary']); ?> 
         </div>
        </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
<style type="text/css">
  .img-thumbnail{
    width: 150px;
    height: 150px;
  }
</style>