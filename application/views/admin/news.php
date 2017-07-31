<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<script src="<?php echo base_url(); ?>assets/admin/js/libs/news.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">News master</a></li>
    </ol>
</div>
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">News master</h4>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-block alert-danger" style="display: none;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <p class="error_message"></p>
                </div>
                <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">News Heading</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="news_heading" id="news_heading">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">News Description</label>
                            <div class="controls">
                                <textarea id="wysiwyg" class="form-control" placeholder="Enter notification ..." rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1"></label>
                            <div class="controls">
                                <input type="button" class="btn btn-primary" value="Submit" ng-click="save_news()"/>
                            </div>
                        </div>
                </div>
            </div>
        </div>
       
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">List Of Packages</h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <table id="table-basic" class="table table-striped">
                    <thead>
                    <tr>
                        <th>News Heading</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $news_list=getNews();
                    foreach ($news_list as $row ) { 
                        ?>
                        <tr id="news-id-<?php echo $row['news_id']; ?>">
                            <td><?= $row['news_heading'];?></td>
                            <td>
                                <a href="<?php echo site_url(); ?>/admin_news/edit/<?php echo $row['news_id']; ?>">Edit</a> | 
                                <a href="javascript:void(0);" ng-click="delete_news(<?php echo $row['news_id']; ?>)">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>    
</div>
</div>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/bootstrap-wysihtml5.js"></script>
<script>
    jQuery(function ($) {
        $('#wysiwyg').wysihtml5({
            stylesheets: ['assets/plugins/bootstrap-wysihtml5/css/wysiwyg-color.css']
        });
        $('.wysihtml5-toolbar .btn-default').removeClass('btn-default').addClass('btn-white');
    });
</script>
            </div>
        </div>
    <?php $this->load->view('admin/includes/footer'); ?>    
    </body>
</html>
