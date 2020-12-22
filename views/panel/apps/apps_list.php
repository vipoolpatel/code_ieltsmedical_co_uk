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
                    <li><a>Apps</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Apps List</h2>
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
                             <a href="<?=base_url()?>panel/apps/add_apps" class="btn btn-primary" title="Add New Apps"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Apps</span></a>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Apps Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">

                               <div class="col-md-2">
                                <label>Apps  ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="Apps ID" name="id"/>
                                </div>
                                <div class="col-md-3">
                                <label> App Store</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('app_store')) ? $this->input->get(' app_store') : ''?>" placeholder="App Store" name="app_store"/>
                                </div>
                                 <div class="col-md-3">
                                <label> Google Play</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('google_play')) ? $this->input->get('google_play') : ''?>" placeholder="Google Play" name="google_play"/>
                                </div>
                                   <div class="col-md-2">
                                <label> Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                 <div class="col-md-2">
                                <label> End Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div>

                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/apps/apps_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Apps List</h3>
                                </div>
                                <div class="panel-body">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Apps ID</th>
                                                <th>App Store</th>
                                                <th>Google Play </th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getApps)) {
	foreach ($getApps as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->app_store?></td>
                                                        <td><?=$value->google_play?></td>

                                                           <td>
        <?php
if (!empty($value->photo_image)) {
			?>
        <a target="_blank" href="<?=base_url()?>img/app/<?=$value->photo_image?>">
        <img height="80px;" width="80px" src="<?=base_url()?>img/app/<?=$value->photo_image?>">
        </a>
        <?php
}
		?>
      </td>
                                                        <td><?=!empty($value->user_status) ? 'Active' : 'Inactive'?></td>
                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?=base_url()?>panel/apps/edit_apps/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/apps/delete_apps/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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


