<?php $this->view('template/includes/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/notifications.js"></script>
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
                            Notifications Master
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php $packages = getPackages(); ?>
                                        <label>Packages</label>
                                        <select class="form-control" ng-model="packages" multiple="multiple">
                                            <?php foreach($packages as $row){ ?>
                                            <option value="<?= $row['package_id']; ?>"><?= $row['package_name']; ?></option>    
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Notification</label>
                                        <textarea id="wysiwyg" class="form-control" placeholder="Enter notification ..." rows="10" ng-model="notification"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="button" class="btn btn-primary waves-effect" value="Submit" ng-click="save_notification();"/>
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
                            Notifications List
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Notification</th>
                                        <th>Status</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Notification</th>
                                        <th>Status</th>
                                        <th>Controls</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php $list=getNotifications(); ?>
                                <?php foreach ($list as $row ) { ?>
                                    <tr id="notification-id-<?= $row['notification_id']; ?>">
                                        <td><?= $row['notification'];?></td>
                                        <td><?= $row['notification_status'];?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary waves-effect" onclick="window.open('<?= site_url(); ?>admin_notifications/edit/<?= $row['notification_id']; ?>','_blank')">Edit</button>

                                            <button type="button" class="btn btn-primary waves-effect deletePackage" ng-click="deleteNotification(<?= $row['notification_id']; ?>)">Delete</button>
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