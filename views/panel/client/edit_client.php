 <?php
$this->load->view('panel/header/header');
?>
    <body>
        <div class="page-container">
            <?php
$this->load->view('panel/header/sidebar');
?>
            <div class="page-content">
                <?php
$this->load->view('panel/header/top_header');
?>
                <ul class="breadcrumb">
                    <li><a>Client</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Client</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Client</h3>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">User Name <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="id" type="hidden" value="<?=$tutor->id?>" />
                                                    <input name="username" required  type="text" placeholder="User Name" class="form-control" value="<?=set_value('username', $tutor->username);?>" />
                                                    <div class="error"><?php echo form_error('username'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Last Name </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                    <input name="lastname" type="text" placeholder="Last Name" class="form-control" value="<?=set_value('lastname', $tutor->lastname);?>" />
                                                    <div class="error"><?php echo form_error('lastname'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Email <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="email" required  type="email" readonly="" placeholder="Email" class="form-control" value="<?=set_value('email', $tutor->email);?>" />
                                                    <div class="error"><?php echo form_error('email'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Address </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                <textarea name="address"  type="text" placeholder="Address" class="form-control" ><?=set_value('address', $tutor->address);?></textarea>
                                                    <div class="error"><?php echo form_error('username'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                      <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Tag Status</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="tags_status" type="text" placeholder="Tag Status" class="form-control" value="<?=set_value('tags_status', $tutor->tags_status);?>" />
                                                    <div class="error"><?php echo form_error('tags_status'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Phone</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="phone" type="text" placeholder="Phone" class="form-control" value="<?=set_value('phone', $tutor->phone);?>" />
                                                    <div class="error"><?php echo form_error('phone'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Note </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                <textarea name="note"  type="text" placeholder="Note" class="form-control" ><?=set_value('note', $tutor->note);?></textarea>
                                                    <div class="error"><?php echo form_error('note'); ?></div>
                                                </div>
                                            </div>
                                        </div>


            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Profession </label>
                <div class="col-md-6 col-xs-12">
                  <select class="form-control" name="profession">
                      <option value="">Select Profession</option>
                      <option <?=($tutor->profession == 'Doctor') ? 'selected' : ''?> value="Doctor">Doctor</option>
                      <option  <?=($tutor->profession == 'Nurse') ? 'selected' : ''?> value="Nurse">Nurse</option>
                      <option  <?=($tutor->profession == 'Allied Health Professional') ? 'selected' : ''?> value="Allied Health Professional">Allied Health Professional</option>

                  </select>
                </div>
            </div>




                                        <hr />
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Password </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="password"   type="password" placeholder="Password" class="form-control"  />

                                                    <p style="margin-top: 5px;">(Leave blank if you are not changing the password) </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php
$this->load->view('panel/header/footer');
?>

    </body>
</html>






