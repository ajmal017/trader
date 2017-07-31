<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/libs/packages.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Packages master</a></li>
    </ol>
</div>
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Packages master</h4>

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
                <div class="col-md-8">
                    <form id="addPackageForm" method="POST" action="<?php echo site_url(); ?>/admin_packages/add_package" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Name</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="package_name" id="package_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Amount</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="package_amount" id="package_amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Type</label>
                            <div class="controls">
                                <select class="form-control" name="package_type" id="package_type">
                                    <option value="">Select</option>
                                    <option value="Lumsum">Lumsum</option>
                                    <option value="SIP">SIP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Description</label>
                            <div class="controls">
                                <textarea id="wysiwyg" class="form-control" name="package_desc" id="package_desc" rows="10">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Image</label>
                            <div class="controls">
                                <input type="file" class="form-control" name="files" id="files" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Downloadable Documents</label>
                            <div class="controls">
                                <input type="file" class="form-control" name="downloadable_documents[]" id="downloadable_documents" multiple/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1"></label>
                            <div class="controls">
                                <input type="submit" class="btn btn-primary" id="save" value="Submit"/>
                            </div>
                        </div>
                    </form>
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
                        <th>Name</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $package_list=getPackages();
                    foreach ($package_list as $row ) { 
                        ?>
                        <tr id="package-id-<?php echo $row['package_id']; ?>">
                            <td><?= $row['package_name'];?></td>
                            <td><?= $row['package_type'];?></td>
                            <td>
                                <a href="<?php echo site_url(); ?>/admin_packages/edit/<?php echo $row['package_id']; ?>">Edit</a> | 
                                <a href="javascript:void(0);" class="deletePackage" ng-click="deletePackage(<?php echo $row['package_id']; ?>)">Delete</a>
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
