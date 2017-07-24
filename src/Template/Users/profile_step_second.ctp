<div class="container">
  <h1 class="page-header">Profile</h1>
  <div class="row">
    <!-- left column -->
<!--     <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a photo...</h6>
     
      </div>
    </div> -->
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-warning alert-dismissible">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
         Please complete you Basic info .
      </div>
      <h3>Basic info</h3>
      <?= $this->Form->create(false,array('enctype' => 'multipart/form-data' , 'class' => 'form-horizontal')) ?>
        <div class="form-group">
          <label class="col-lg-3 control-label">City:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('user_city',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Band Members:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('user_band_member',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Perfomance Link:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('user_perfomance_link',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Recoded Music Link:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('user_music_link',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Facebook link:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('user_facebook_link',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Twitter Link:</label>
          <div class="col-lg-8">
            <?= $this->Form->control('user_twitter_link',['class' => 'form-control' , 'label' => false]) ?>
          </div>
        </div>

      <div class="form-group">
        <label class="col-lg-3 control-label">Photo:</label>
        <div class="col-lg-8">
          <?= $this->Form->input('user_profile_photo', ['label' => false ,'type' => 'file']); ?> 
        </div>
      </div>           
       
      <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
           <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']); ?> 
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