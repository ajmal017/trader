<?php $this->view('template/includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ng/profile.js"></script>
<section class="content">
    <div class="container-fluid">
        <?php $this->view('template/includes/slider'); ?>
        <!--<div class="block-header">
            <h2>MY TEAM</h2>
        </div>-->

<?php 
    $userid = $session_data['logged_in']['userid'];
    $ids = array($userid);
    for($i = 1;$i <= 10;$i++){  
        if(count($ids) > 0)
        {
            $user_data = getDirectUsers($ids);
            $ids = array();
            foreach ($user_data as $row ) {
                array_push($ids,$row['userid']);
                ?>

                <?php 
            }
            if(count($ids))
            {
              ?>
                <!-- Tabs With Custom Animations -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-red">
                                <h2>
                                    LEVEL - <?= $i; ?>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Sponsor ID</th>
                                                <th>Sponsor Name</th>
                                                <th>Active</th>
                                                <th>Registration Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Sponsor ID</th>
                                                <th>Sponsor Name</th>
                                                <th>Active</th>
                                                <th>Registration Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                            foreach ($user_data as $row ) { ?>
                                                <tr>
                                                    <td><?= $row['userid']; ?></td>
                                                    <td><?= $row['username']; ?></td>
                                                    <td><?= $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></td>
                                                    <td><?= $row['sponsor_id']; ?></td>
                                                    <td><?= $row['sponsorname']; ?></td>
                                                    <td><?= ($row['status'] == 'active') ? 'Active':'Deactive' ; ?></td>
                                                    <td><?= date("d-M-Y",strtotime($row['created_date']));?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php 
                }
            }
        }  
    ?> 
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