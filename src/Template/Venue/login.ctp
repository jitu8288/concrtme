<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center">
								<?= $this->Html->image('concrt_me_logo.svg', array('alt' => 'Concrtme')); ?>
								 </div>
								<p class="lead">Manager Login</p>
							</div>

							<?= $this->Flash->render() ?>
							<?= $this->Form->create() ?>
								<div class="form-group">									
									<?= $this->Form->control('username',['class' => 'form-control']) ?>
								</div>
								<div class="form-group">									
									<?= $this->Form->control('password',['class' => 'form-control']) ?> 
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<?= $this->Form->button(__('Login')); ?>
								<?= $this->Form->end() ?>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->