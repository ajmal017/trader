<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<script src="<?php echo base_url(); ?>assets/admin/js/libs/notifications.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Notifications Master</a></li>
    </ol>
</div>
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Notifications Master</h4>

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
                            <?php $packages = getPackages(); ?>

                            <label class="control-label" for="exampleInputText1">Packages</label>
                            <div class="controls">
                                <select class="form-control" ng-model="packages" multiple="multiple">
                                    <?php foreach($packages as $row){ ?>
                                    <option value="<?= $row['package_id']; ?>"><?= $row['package_name']; ?></option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Notification </label>
                            <div class="controls">
                                <textarea id="wysiwyg" class="form-control" placeholder="Enter notification ..." rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Notification Email</label>
                            <div class="controls">
                                <textarea id="wysiwyg1" class="form-control" placeholder="Enter notification ..." rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1"></label>
                            <div class="controls">
                                <input type="submit" class="btn btn-primary" value="Submit" ng-click="save_notification()"/>
                            </div>
                        </div>
                </div>
            </div>
        </div>
       
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">List Of Notifications</h4>

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
                        <th>Notification</th>
                        <th>Status</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $list=getNotifications(); ?>
                    <?php foreach ($list as $row ) { ?>
                        <tr id="notification-id-<?= $row['notification_id']; ?>">
                            <td><?= $row['notification'];?></td>
                            <td><?= $row['notification_status'];?></td>
                            <td>
                                <a href="<?= site_url(); ?>/admin_notifications/edit/<?= $row['notification_id']; ?>">Edit</a> | 
                                <a href="javascript:void(0);" ng-click="deleteNotification(<?= $row['notification_id']; ?>)">Delete</a>
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
        $('#wysiwyg1').wysihtml5({
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
