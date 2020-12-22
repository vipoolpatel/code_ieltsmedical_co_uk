<?php
$this->load->view('header/header');
?>


	<div class="container login-container">
            <div class="row">

                <div class="col-md-6 login-form-1">
<?php
$this->load->view('message');
?>
                    <h3>Login</h3>
                    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>login/login_validation">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />

                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" />

                         </div>
                       <button class="btnSubmit" name="insert" type="submit"> Login Now</button> <br><br>
                      <a class="btnSubmit" style="color: white;" href="<?php echo base_url();?>login/forgot_password"> Forgot Password</a>

                    </form>


                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Register</h3>


                    <form class="form-horizontal" method="POST" action="<?=base_url()?>login/login">
                        <div class="form-group">
                            <input type="text" class="form-control" required name="username" placeholder="Your Username *" value="<?=set_value('username')?>" />
                             <span class="text-danger"><?php echo form_error('username') ?></span>

                        </div>
                      <div class="form-group">
                            <input type="email" class="form-control" required name="email" placeholder="Your Email *" value="<?=set_value('email')?>" />
                             <span class="text-danger"><?php echo form_error('email') ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" required name="password" placeholder="Your Password *" value="" />
                             <span class="text-danger"><?php echo form_error('password') ?></span>

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" required name="confirm_password" placeholder="Your Confirm Password *" value="" />
                             <span class="text-danger"><?php echo form_error('confirm_password') ?></span>
                        </div>

                            <div class="form-group" style="color:#fff;" >
<?php
$firstNumber_acc = mt_rand(0, 9);
$SecondNumber_acc = mt_rand(0, 9);
echo $firstNumber_acc . '+' . $SecondNumber_acc;
?>
     <input type="hidden"  name="current_captcha"  value="<?=$firstNumber_acc + $SecondNumber_acc?>">
      <input type="text" name="captcha" required  class="form-control" value="" placeholder="Verification Code" >

                </div>

                        <div class="form-group" style="color:#fff;">
                            <input type="checkbox" required=""> By clicking register, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions" style="color:red;">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank" style="color:red;">Privacy Policy</a>
                            <br>
                        </div>

                         <button class="btnSubmit"  type="submit"> Register</button>
                        <div class="form-group">
                        </div>
                    </form>

                </div>
            </div>
        </div>


<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>