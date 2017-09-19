<?php $this->view('frontend/includes/header1'); ?>
<div class="middle-content">

    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Date</th>
        <th>Reference ID</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php $userPackagesList = getUserPackages($session_data['logged_in']['userid']); ?>
      <?php foreach($userPackagesList as $upl){ ?>
      <?php //dump($upl); ?>
      <tr>
        <td><?= $upl['package_name']; ?></td>
        <td></td>
        <td><?= $upl['package_amount']; ?></td>
        
      </tr>
      <?php } ?>
    </tbody>
  </table>     
</div>
   <div class="clear"></div> 
<?php $this->view('frontend/includes/footer',array('dashboard_footer'=>true)); ?>
</body>
</html>
