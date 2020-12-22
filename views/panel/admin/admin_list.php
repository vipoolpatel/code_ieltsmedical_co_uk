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
                    <li><a>Admin</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Admin List</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ($this->session->flashdata('SUCCESS')) {?>
                                <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                    <?=$this->session->flashdata('SUCCESS')?>
                                </div>
                            <?php }?>
                             <a href="<?=base_url()?>panel/admin/add_admin" class="btn btn-primary" title="Add New Admin"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Admin</span></a>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Admin Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">
                               <div class="col-md-2">
                                <label>Admin  ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="Admin ID" name="id"/>
                                </div>
                                <div class="col-md-2">
                                <label>Admin Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('name')) ? $this->input->get('name') : ''?>" placeholder="Admin Name" name="name"/>
                                </div>
                                 <div class="col-md-2">
                                <label>Admin Email</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('email')) ? $this->input->get('email') : ''?>" placeholder="Admin Email" name="email"/>
                                </div>
                                <div class="col-md-2">
                                <label>Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                <div class="col-md-2">
                                <label>End Date</label>
                                <input type="text" class="form-control datepicker_new"  value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div>
                                <div class="col-md-2">
                                <label>Status</label>
                                <?php
$selected = '';
if (!empty($this->input->get('user_status'))) {
	$selected = $this->input->get('user_status');
}
?>
                                <select name="user_status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option <?=($selected == 1) ? 'selected' : ''?> value="1">Active</option>
                                    <option <?=($selected == 2) ? 'selected' : ''?> value="2">Inactive</option>

                                </select>
                                </div>
                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/admin/admin_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Admin List</h3>
                                </div>
                                <div class="panel-body">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Admin ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Role</th>
  <th>Type</th>

                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getTutor)) {
	foreach ($getTutor as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->user_id?></td>
                                                        <td><?=$value->account_name?></td>
                                                        <td><?=$value->email?></td>
                                                        <td><?=!empty($value->user_status) ? 'Active' : 'Inactive'?></td>
                                                        <td><?=!empty($value->role) ? 'Admin' : 'Sub Admin'?></td>
                                                          <td><?=$value->type?></td>

                                                        <td><?=date('d-m-Y h:i A', strtotime($value->registered));?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?=base_url()?>panel/admin/edit_admin/<?=$value->user_id?>" ><span class="fa fa-pencil"></span></a>
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/admin/delete_admin/<?=$value->user_id?>"  ><span class="fa fa-trash-o"></span></a>
                                                        </td>
                                                    </tr>

                                            <?php }
} else {?>
                                            <tr><td colspan="100%">No record found.</td></tr>
                                             <?php }
?>
                                        </tbody>
                                    </table>
                                       <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
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






<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {

   $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });

});

</script>


