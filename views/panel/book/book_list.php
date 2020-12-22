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
                    <li><a>Book and Video</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Book and Video List</h2>
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
                             <a href="<?=base_url()?>panel/book/add_book" class="btn btn-primary" title="Add New Book, Video and Licence"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Book, Video and Licence</span></a>


                               <a href="<?=base_url()?>panel/book/create_feed" class="btn btn-primary" title="Create Book Feed"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Create Book Feed</span></a>

                               <a target="_blank" href="<?=base_url()?>file/feed/book.xml" class="btn btn-primary" title="Download Book Feed"><span class="bold">Download Book Feed</span></a>

                             <a href="<?=base_url()?>panel/book/book_order/1" class="btn btn-info" title="Book Order"><i class=""></i><span class="bold">Book and Video Order</span></a>

                             <a href="<?=base_url()?>panel/book/license_key_order" class="btn btn-info" title="Book Order"><i class=""></i><span class="bold"> Licence Key Order</span></a>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">
                               <div class="col-md-2">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>
                                <div class="col-md-3">
                                <label>Title Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('name')) ? $this->input->get(' name') : ''?>" placeholder="Title Name" name="name"/>
                                </div>
                                 <div class="col-md-3">
                                <label>URl to Vimeo ID</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('url')) ? $this->input->get('url') : ''?>" placeholder="URl to Vimeo ID" name="url"/>
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
                                    <a href="<?=base_url()?>panel/book/book_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Book and Video List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                             <th>ISBNS</th>
                                                <th>Title Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                               <th>Licence Key</th>
                                                <th>Type</th>
                                                <th>URl to Vimeo ID</th>
                                                <th>Book, Video and Licence Key Type</th>
                                                <!-- <th>Clothing</th>
                                                <th>On Sale</th>
                                                <th>SKU</th>
                                                <th>Description Feed</th>
                                                <th>Availability</th>
                                                <th>Google Product Category </th>
                                                <th>Brand</th>
                                                <th>Gtin</th>
                                                <th>MPN</th>
                                                <th>Identifier Exists</th>
                                                <th>Condition</th> -->
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getBook)) {
	foreach ($getBook as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                         <td><?=$value->isbns?></td>
                                                        <td><?=$value->name?></td>
                                                        <td>
                                                            <?php
if (!empty($value->photo_image)) {
			?>
                                                            <a target="_blank" href="<?=base_url()?>img/book/<?=$value->photo_image?>">
                                                            <img height="80px;" width="80px" src="<?=base_url()?>img/book/<?=$value->photo_image?>">
                                                            </a>
                                                            <?php
}
		?>
                                                          </td>


                                <td><?=$value->price?></td>
                                <td><?=$value->license_key?></td>
                                                       <td>

                                                    <?php
$book_type = $this->db->where('book_id', $value->id);
		$book_type = $this->db->get('book_type')->result();
		foreach ($book_type as $value1) {
			echo $value1->type . ',';
		}
		?>
                                                       </td>
                                                       <td><?=$value->url?></td>
                                                        <td><?=$value->book_video_type?></td>

                                                        <!-- <td><?=$value->is_clothing?></td>
                                                        <td><?=$value->is_on_sale?></td>
                                                        <td><?=$value->sku?></td>
                                                        <td><?=$value->description_feed?></td>
                                                        <td><?=$value->availability?></td>
                                                        <td><?=$value->google_product_category?></td>
                                                        <td><?=$value->brand?></td>
                                                        <td><?=$value->gtin?></td>
                                                        <td><?=$value->mpn?></td>
                                                        <td><?=$value->identifier_exists?></td>
                                                        <td><?=$value->condition?></td> -->

                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                        <?php
if ($value->book_video_type == 'License Key') {
			?>
<a class="btn btn-success" href="<?=base_url()?>panel/book/add_licence/<?=$value->id?>">Add Licence</a>
<?php }
		?>
  <a class="btn btn-primary" href="<?=base_url()?>panel/book/edit_book/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
  <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/book/delete_book/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>

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
