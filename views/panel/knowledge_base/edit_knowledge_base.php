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
                    <li><a>Knowledge Base</a></li>
                </ul>

                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Knowledge Base</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Knowledge Base</h3>
                                    </div>
 <input name="id" type="hidden" value="<?=$getKnowledgeBase->id?>" />
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Question</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

          <input name="question" type="text" placeholder="Question" class="form-control" value="<?=set_value('question', $getKnowledgeBase->question);?>" />
                                                    <div class="error"><?php echo form_error('question'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Answer</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                          <textarea name="answer" placeholder="Answer" class="form-control"  required><?=set_value('answer', $getKnowledgeBase->answer);?></textarea>

                                                    <div class="error"><?php echo form_error('answer'); ?></div>
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






