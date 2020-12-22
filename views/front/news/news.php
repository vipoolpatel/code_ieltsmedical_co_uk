<?php
$this->load->view('header/header');
?>


<style>
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px
}
.pagination>li {
    display: inline
}
.pagination>li>a,
.pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd
}
.pagination>li:first-child>a,
.pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px
}
.pagination>li:last-child>a,
.pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px
}
.pagination>li>a:focus,
.pagination>li>a:hover,
.pagination>li>span:focus,
.pagination>li>span:hover {
    z-index: 2;
    color: #23527c;
    background-color: #eee;
    border-color: #ddd
}
.pagination>.active>a,
.pagination>.active>a:focus,
.pagination>.active>a:hover,
.pagination>.active>span,
.pagination>.active>span:focus,
.pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7
}
.pagination>.disabled>a,
.pagination>.disabled>a:focus,
.pagination>.disabled>a:hover,
.pagination>.disabled>span,
.pagination>.disabled>span:focus,
.pagination>.disabled>span:hover {
    color: #777;
    cursor: not-allowed;
    background-color: #fff;
    border-color: #ddd
}
.pagination-lg>li>a,
.pagination-lg>li>span {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333
}
.pagination-lg>li:first-child>a,
.pagination-lg>li:first-child>span {
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px
}
.pagination-lg>li:last-child>a,
.pagination-lg>li:last-child>span {
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px
}
.pagination-sm>li>a,
.pagination-sm>li>span {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5
}
.pagination-sm>li:first-child>a,
.pagination-sm>li:first-child>span {
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px
}
.pagination-sm>li:last-child>a,
.pagination-sm>li:last-child>span {
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px
}
</style>
          <section class="generic-banner relative">
          <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
              <div class="generic-banner-content">
                <h2 class="text-white">News and Articles</h2>

              </div>
            </div>
          </div>
        </div>
      </section>

        <!-- Start latest-blog Area -->
      <section class="latest-blog-area section-gap" id="blog">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
              <div class="title text-center">
                <h1 class="mb-10">Latest News from our Blog</h1>
                <!-- <p>Who are in extremely love with eco friendly system.</p> -->
              </div>
            </div>
          </div>
          <div class="row">

<?php
foreach ($getBlog as $value) {

	?>
            <div class="col-lg-6 single-blog">
              <img  style="width:100%;" class="img-fluid" src="<?=base_url()?>img/blog/<?=$value->photo_image?>" alt="<?=$value->title?>">
              <br /><br />
              <a href="<?=base_url($value->slug);?>"><h4><?=$value->title?></h4></a><br>
              <p>
               <?=strip_tags(strtolower(substr($value->description, 0, 200)))?>... <a href="<?=base_url($value->slug);?>">Read More </a>
              </p>
              <p class="post-date"><?=date('d-m-Y h:i A', strtotime($value->created_date));?></p>
            </div>
<?php
}
?>
          </div>
           <?php echo $this->pagination->create_links(); ?>
        </div>
      </section>

<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>