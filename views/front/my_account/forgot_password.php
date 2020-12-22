<?php
$this->load->view('header/header');
?>


	<div class="container login-container">
            <div class="row">

                <div class="col-md-12 login-form-1">
                <?php
                $this->load->view('message');
                ?>
                    <h3>Forgot Password</h3>
                    <form class="form-horizontal" method="POST" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email *" />

                        </div>
                        
                       <button class="btnSubmit" name="insert" type="submit"> Forgot Now</button> <br><br>
                      <a class="btnSubmit" style="color: white;" href="<?php echo base_url();?>my-account"> Login Page</a>

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