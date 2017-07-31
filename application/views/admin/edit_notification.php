<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<script src="<?php echo base_url(); ?>assets/admin/js/libs/notifications.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Edit Notifications Master</a></li>
    </ol>
</div>
<?php $notification_data=getNotifications($notification_id); ?>
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Notifications Master</h4>

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
                            <label class="control-label" for="exampleInputText1">Notification </label>
                            <div class="controls">
                                <input type="hidden" id="notification_id" value="<?= $notification_data['notification_id']; ?>">
                                <textarea id="wysiwyg" class="form-control" placeholder="Enter notification ..." rows="10"><?= $notification_data['notification']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Notification Status</label>
                            <div class="controls">
                                <select class="form-control" id="notification_status">
                                    <option value="">Select</option>
                                    <option value="active" <?php if($notification_data['notification_status'] == 'active'){ echo "selected='selected'"; } ?> >Active</option>
                                    <option value="deactive" <?php if($notification_data['notification_status'] == 'deactive'){ echo "selected='selected'"; } ?>>Deactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1"></label>
                            <div class="controls">
                                <input type="submit" class="btn btn-primary" value="Submit" ng-click="edit_notification()"/>
                            </div>
                        </div>
                </div>
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
