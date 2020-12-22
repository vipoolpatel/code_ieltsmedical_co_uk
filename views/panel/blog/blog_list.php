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
                    <li><a>Blog</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Blog List</h2>
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
                             <a href="<?=base_url()?>panel/blog/add_blog" class="btn btn-primary" title="Add New Blog"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Blog</span></a>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Blog Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">

                               <div class="col-md-2">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>
                                <div class="col-md-3">
                                <label>Title</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('account_name')) ? $this->input->get('account_name') : ''?>" placeholder="Title" name="account_name"/>
                                </div>
                                 <div class="col-md-2">
                                <label> Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                 <div class="col-md-2">
                                <label> End Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div>

                                   <div class="col-md-3">
                                <label> Author</label>
                                <?php
$author_user_id = !empty($this->input->get('author_user_id')) ? $this->input->get('author_user_id') : '';
?>
                                 <select name="author_user_id" class="form-control">
                                    <option value="">Select Author</option>
                                        <?php
foreach ($course_date as $row) {
	?>
                                          <option <?=($author_user_id == $row->user_id) ? 'selected' : ''?> value="<?=$row->user_id?>"><?=$row->account_name?></option>
                                        <?php }?>
                                </select>
                                </div>

                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/blog/blog_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Blog List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Author</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getBlog)) {
	foreach ($getBlog as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->account_name?></td>
                                                        <td><?=$value->title?></td>
                                                        <td><?=$value->slug?></td>
                                                           <td>
                                                            <?php
if (!empty($value->photo_image)) {
			?>
                                                            <a target="_blank" href="<?=base_url()?>img/blog/<?=$value->photo_image?>">
                                                            <img height="80px;" width="80px" src="<?=base_url()?>img/blog/<?=$value->photo_image?>">
                                                            </a>
                                                            <?php
}
		?>
                                                          </td>
                                                        <td><?=!empty($value->user_status) ? 'Active' : 'Inactive'?></td>
                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?=base_url()?>panel/blog/edit_blog/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/blog/delete_blog/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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






<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>



<script>
$(document).ready(function() {
      $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });
});

</script>
