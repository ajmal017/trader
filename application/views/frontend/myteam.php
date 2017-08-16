<?php $this->view('frontend/includes/header1'); ?>

<?php 
    $userid = $session_data['logged_in']['userid'];
    $ids = array($userid);
?>
<div class="middle-content">
<?php 
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
              <div class="level_1">
                  <h3>Level - <?= $i; ?></h3>
                  <table class="table table-hover">
                    <tr>
                      <th>User ID</th>
                      <th>UserName</th>
                      <th>Name</th>
                      <th>Sponsor ID</th>
                      <th>Sponsor Name</th>
                      <th>Active</th>
                      <th>Registration Date</th>
                    </tr>
                    
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
              </table>
                  <div class="clear"></div>
              </div>
<?php 
            }
        }
    }  
?>
<div class="clear"></div>
<?php $this->view('frontend/includes/footer',array('dashboard_footer'=>true)); ?>
</body>
</html>