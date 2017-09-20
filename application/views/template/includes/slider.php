<?php 
$packages = getUserPackages($session_data['logged_in']['userid']);
$pack = array();
foreach($packages as $row)
{
  $pack[] = $row['package_id'];
}
$notification_list = getNotifications(0,$pack);
if(count($notification_list) > 0){ ?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-blue">
                    <h2>
                        <marquee direction="left" behavior="right" class="marquee">
                            <span>
                                <?php foreach ($notification_list as $row) { ?>
                                    <?= $row['notification'];?> |    
                                <?php } ?>
                            </span>
                        </marquee>
                    </h2>
                </div>
            </div>
        </div>
    </div>
<?php } ?>