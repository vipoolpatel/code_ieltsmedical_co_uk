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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Book and Video</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Book and Video</h3>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Title</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="id" type="hidden" value="<?=$book->id?>" />
                                                    <input name="name" type="text" placeholder="Title" class="form-control" value="<?=set_value('name', $book->name);?>" />
                                                    <div class="error"><?php echo form_error('name'); ?></div>
                                                </div>
                                            </div>
                                        </div>



                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Slug </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="slug" type="text" placeholder="Slug" class="form-control" value="<?=set_value('slug', $book->slug);?>" />
                                                    <div class="error"><?php echo form_error('slug'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                                <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">ISBNS </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="isbns" type="text" placeholder="ISBNS" class="form-control" value="<?=set_value('isbns', $book->isbns);?>" />
                                                    <div class="error"><?php echo form_error('isbns'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                           <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Image </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                        <input type="file" name="photo_image" >
                                                        <?php
                                                        if (!empty($book->photo_image)) {
                                                        	?>
                                                        <img  width="70" height="70"  src="<?=base_url()?>img/book/<?=$book->photo_image?>">
                                                         <?php
                                                            }
                                                            ?>
                                                         <input type="hidden" value="<?=$book->photo_image?>" name="old_imagename">
                                                    <div class="error"><?php echo form_error('photo_image'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                            <hr/>

                                            <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="description" type="text" rows="5" placeholder="Description" class="form-control editor"/><?=set_value('description', $book->description);?></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
                                                </div>
                                            </div>
                                        </div>




<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Price</label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="price" type="text" placeholder="Price" class="form-control" value="<?=set_value('price', $book->price);?>" />
            <div class="error"><?php echo form_error('price'); ?></div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">License Key</label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="license_key" type="text" placeholder="License Key" class="form-control" value="<?=set_value('license_key', $book->license_key);?>" />
            <div class="error"><?php echo form_error('license_key'); ?></div>
        </div>
    </div>
</div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Type</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                            <?php

                                            $array = array('Doctor', 'Nurse', 'Allied Health');

                                            ?>
                                            <select class="form-control" multiple="" name="type[]" required="">
                                                <?php
                                            foreach ($array as $value) {
                                            	$selected = '';
                                            	foreach ($book_type as $type) {
                                            		if ($value == $type->type) {
                                            			$selected = 'selected';
                                            		}
                                            	}
                                            	?>

                                                    <option  <?=$selected?> value="<?=$value?>"><?=$value?></option>
                                                <?php }
                                                    ?>
                                               </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">URl to Vimeo ID </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="url" type="text" placeholder="URl to Vimeo ID" class="form-control" value="<?=set_value('url', $book->url);?>" />
                                                    <div class="error"><?php echo form_error('url'); ?></div>
                                                </div>
                                            </div>
                                        </div>



          <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Book, Video and Licence Key Type <span style="color: red;"> *</span></label>
                <div class="col-md-6 col-xs-12">
                  <select class="form-control" required="" name="book_video_type">
                      <option value="">Select</option>
                      <option <?=($book->book_video_type == 'Book') ? 'selected' : ''?> value="Book">Book</option>
                      <option  <?=($book->book_video_type == 'Video') ? 'selected' : ''?> value="Video">Video</option>

                      <option  <?=($book->book_video_type == 'License Key') ? 'selected' : ''?> value="License Key">License Key</option>
                  </select>
                </div>
            </div>

            <hr/><h3 style="text-align: center;">Feed Data</h3><hr/>

            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Clothing </label>
                <div class="col-md-6 col-xs-12">
                  <select class="form-control" name="is_clothing">
                      <option value="">Select</option>
                      <option <?=($book->is_clothing == 'True') ? 'selected' : ''?> value="True">True</option>
                      <option  <?=($book->is_clothing == 'False') ? 'selected' : ''?> value="False">False</option>
                  </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">On Sale </label>
                <div class="col-md-6 col-xs-12">
                  <select class="form-control" name="is_on_sale">
                      <option value="">Select</option>
                      <option <?=($book->is_on_sale == 'True') ? 'selected' : ''?> value="True">True</option>
                      <option  <?=($book->is_on_sale == 'False') ? 'selected' : ''?> value="False">False</option>
                  </select>
                </div>
            </div>

            <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">SKU</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="sku" type="text" placeholder="SKU" class="form-control" value="<?=set_value('sku', $book->sku);?>" />
                    <div class="error"><?php echo form_error('sku'); ?></div>
                </div>
            </div>
        </div>


<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label"> Description Feed</label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <textarea name="description_feed" type="text" rows="5" placeholder="Description Feed" class="form-control"/><?=set_value('description_feed', $book->description_feed);?></textarea>
            <div class="error"><?php echo form_error('description_feed'); ?></div>
        </div>
    </div>
</div>

<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Availability</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="availability" type="text" placeholder="Availability" class="form-control" value="<?=set_value('availability', $book->availability);?>" />
                    <div class="error"><?php echo form_error('availability'); ?></div>
                </div>
            </div>
        </div>


<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Google Product Category</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="google_product_category" type="text" placeholder="Google Product Category" class="form-control" value="<?=set_value('google_product_category', $book->google_product_category);?>" />
                    <div class="error"><?php echo form_error('google_product_category'); ?></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Brand</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="brand" type="text" placeholder="Brand" class="form-control" value="<?=set_value('brand', $book->brand);?>" />
                    <div class="error"><?php echo form_error('brand'); ?></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Gtin</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="gtin" type="text" placeholder="Gtin" class="form-control" value="<?=set_value('gtin', $book->gtin);?>" />
                    <div class="error"><?php echo form_error('gtin'); ?></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">MPN</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="mpn" type="text" placeholder="MPN" class="form-control" value="<?=set_value('mpn', $book->mpn);?>" />
                    <div class="error"><?php echo form_error('mpn'); ?></div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Identifier Exists</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="identifier_exists" type="text" placeholder="Identifier Exists" class="form-control" value="<?=set_value('identifier_exists', $book->identifier_exists);?>" />
                    <div class="error"><?php echo form_error('identifier_exists'); ?></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Condition</label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="condition" type="text" placeholder="Condition" class="form-control" value="<?=set_value('condition', $book->condition);?>" />
                    <div class="error"><?php echo form_error('condition'); ?></div>
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






