<?php $this->view('template/includes/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/news.js"></script>
<section class="content">
    <div class="container-fluid">
        <!--<div class="block-header">
            <h2>PACKAGES</h2>
        </div>-->
        <!-- Tabs With Custom Animations -->
        <?php $news_data=getNews($news_id);?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                           Edit News Master
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>News Heading</label>
                                        <input type="hidden" ng-init="news_id='<?= $news_data['news_id']; ?>'" />
                                        <input type="text" ng-model="news_heading" ng-init="news_heading='<?= $news_data['news_heading']; ?>'" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>News Description</label>
                                        <textarea class="form-control" placeholder="Enter news ..." rows="10" ng-model="news_desc" ng-init="news_desc='<?= $news_data['news_desc']; ?>'"></textarea>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="button" class="btn btn-primary waves-effect" value="Submit" ng-click="edit_news();"/>
                                </div>
                            </div>
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