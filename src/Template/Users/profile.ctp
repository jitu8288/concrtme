<!-- //Slider Section// -->
<div class="container-fluid slide-section padtop-65 no-pad-slide">
  <div class="container profile_bg">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 profile_section">
          <div class="profile_title">
            <h1 class="col-sm-12 col-xs-12 col-md-12 col-lg-12 no-pad">Profile<span class="pull-right"><a href="#" class="btn btn-default btn-concrtme">Edit</a></span></h1>
          </div>
          <div class="profile-page">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 no-pad">
              <div class="profile-detail">
            
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad">
                    <span class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-pad">Name:</span>
                    <span class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-pad"><?= $user->name ?></span>
                  </div>
                  <!--  -->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad">
                    <span class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-pad">Genre:</span>
                    <span class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-pad"><?= $user->genre ?></span>
                  </div>
                  <!--  -->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad">
                    <span class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-pad">City:</span>
                    <span class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-pad"><?= $user_metas['user_city'] ?></span>
                  </div>
                  <!--  -->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad">
                    <span class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-pad">Band Members:</span>
                    <span class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-pad"><?= $user_metas['user_band_member'] ?></span>
                  </div>

                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad">
                    <span class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-pad">Recoded Music Link:</span>
                    <span class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-pad">
                     <a href="<?= $user_metas['user_music_link'] ?>" target="_blank"> <?= $user_metas['user_music_link'] ?></a> </span>
                  </div>
             
              </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no-pad">
              <div class="profile-sidebar">
                 <?= $this->Html->image('profile/'.$user_metas['user_profile_photo'], array('alt' => $user->name , 'class' => "img-circle img-responsive")) ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>


<!-- //Slider Section// -->
<div class="container-fluid slide-section no-pad-slide">
  <div class="container profile_bg">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 profile_section">
          <div class="profile_title">
            <h1 class="col-sm-12 col-xs-12 col-md-12 col-lg-12 no-pad">Video<span class="pull-right"></span></h1>
          </div>
          <div class="profile-page">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-pad">
             <iframe src="<?= $user_metas['user_music_link']  ?>" style="width: 100%;height: 100%" frameborder="0" allowfullscreen></iframe>
            </div>

           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-pad">
             <iframe src="<?= $user_metas['user_perfomance_link']  ?>" style="width: 100%;height: 100%"  frameborder="0" allowfullscreen></iframe>
            </div>

         </div>
        </div>
    </div>
  </div>
</div>

 