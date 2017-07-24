 <div class="container-fluid padtop-65 no-pad">
  <div class="intro">
  <div class="intro-body">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 text-center">
                <div class="login-logo">
                  <h2>Welcome to ConcrtMe</h2>
                  <h4>The fastest way for musicians to book shows.</h4>
                </div>
              <div class="app-cam">
              <?= $this->Flash->render() ?>
			  <?= $this->Form->create(false ,array('class' => 'form-inline' )) ?>
              
                  <div class="form-group">
                    <?= $this->Form->control('username' , array('class' => "form-control", 'placeholder' => 'Email', 'label' => false)) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->control('password' , array('class' => "form-control", 'placeholder' => 'Password', 'label' => false)) ?>
                  </div>
                  <?= $this->Form->button(__('Login'), array('class' => 'btn btn-default btn-concrtme')); ?>
				  <?= $this->Form->end() ?>
               
                </form>
              </div>
               <div class="copy_layout login">
                  
               </div> 
              </div>
          </div>
      </div>
  </div>
</div>
</div>