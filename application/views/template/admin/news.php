<?php $this->view('template/includes/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/news.js"></script>
<section class="content">
    <div class="container-fluid">
        <!--<div class="block-header">
            <h2>PACKAGES</h2>
        </div>-->
        <!-- Tabs With Custom Animations -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            News Master
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>News Heading</label>
                                        <input type="text" class="form-control" ng-model="news_heading" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>News Description</label>
                                        <textarea class="form-control" placeholder="Enter notification ..." rows="10" ng-model="news_desc"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="button" class="btn btn-primary waves-effect" value="Submit" ng-click="save_news();"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs With Custom Animations -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            News List
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>News Heading</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>News Heading</th>
                                        <th>Controls</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                $news_list=getNews();
                                foreach ($news_list as $row ) { 
                                    ?>
                                    <tr id="news-id-<?php echo $row['news_id']; ?>">
                                        <td><?= $row['news_heading'];?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary waves-effect" onclick="window.open('<?php echo site_url(); ?>admin_news/edit/<?php echo $row['news_id']; ?>','_blank')">Edit</button>

                                            <button type="button" class="btn btn-primary waves-effect" ng-click="delete_news(<?php echo $row['news_id']; ?>)">Delete</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->view('template/includes/footer'); ?>
<script>
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });
});
</script>