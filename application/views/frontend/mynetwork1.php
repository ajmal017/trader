<?php $this->view('frontend/includes/header1'); ?>
<script>
angular.module("MyApp", []).controller("MyController", function($scope,$http) {

  $scope.tree = function()
  {
    window.location.href = '<?= site_url(); ?>/mynetwork?username='+$scope.search_username;
  }
});
</script>
<div class="middle-content">
      <div class="table">
        <table border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td align="center"><table border="0" cellspacing="0" cellpadding="0" style="border:1px solid #000; width:100%;">
                  <tbody>
                    <tr>
                      <td align="center" style="background-color:#6DA9CB;color:#fff;"></td>
                      <td align="center" style="font-weight:bold;background-color:#6DA9CB;color:#fff;padding-right:30px;"> Search Username </td>
                      <td align="right" style="background:#367fa9;"><input type="text" ng-model="search_username" class="form-control" style="width:200px;" placeholder="-Input Username-">
                      </td>
                      <td align="center" style="background:#367fa9;"><input type="button" id="submit" name="submit" value="Search" style="background: #053b5a; color: #fff; border: none; padding: 8px 15px;  cursor: pointer;" ng-click="tree()">
                      </td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center"><table width="700" height="400" border="0">
                  <tbody>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="6">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="7">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <?php $firstLap = getUserInfo(0,$username); ?>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="6">&nbsp;</td>
                      <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/mynetwork?username=<?= $firstLap['username']; ?>" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Netayan</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:03 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF></font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip1(this)"> <img src="<?php echo base_url(); ?>assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        <?= $firstLap['username']; ?> </a> </td>
                      <td colspan="6">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="9" align="center"><img src="<?php echo base_url(); ?>assets/frontend/images/index_042.png" width="500" height="36"></td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                      <?php if($firstLap['leftmember'] > 0){ ?>
                      <?php $secondLap = getUserInfo($firstLap['leftmember']); ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/mynetwork?username=<?= $secondLap['username']; ?>" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Netayan</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:11 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>9876543210</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip2(this)"> <img src="<?php echo base_url(); ?>assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        <?= $secondLap['username']; ?> </a> </td>
                      <?php }else{ 
                        $secondLap = 0;
                        ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/register/<?= $firstLap['username']; ?>?placement=left"> <img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"><br>
                        Add New </a> </td>
                      <?php } ?>
                      <td colspan="7">&nbsp;</td>
                      <?php if($firstLap['rightmember'] > 0){ ?>
                      <?php $secondLapRight = getUserInfo($firstLap['rightmember']); ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/mynetwork?username=<?= $secondLapRight['username']; ?>" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Netayan</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:11 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>9876543210</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip2(this)"> <img src="<?php echo base_url(); ?>assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        <?= $secondLapRight['username']; ?> </a> </td>
                      <?php }else{ 
                        $secondLapRight = 0;
                       ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/register/<?= $firstLap['username']; ?>?placement=right"> <img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"><br>
                        Add New </a> </td>
                      <?php } ?>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="5" align="center"><img src="<?php echo base_url(); ?>assets/frontend/images/small.gif" width="250" height="36"></td>
                      <td colspan="3">&nbsp;</td>
                      <td colspan="5" align="center"><img src="<?php echo base_url(); ?>assets/frontend/images/small.gif" alt="" width="250" height="36"></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <?php if($secondLap['leftmember'] > 0){ ?>
                      <?php $thirdLap = getUserInfo($secondLap['leftmember']); ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/mynetwork?username=<?= $thirdLap['username']; ?>" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="<?php echo base_url(); ?>assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        <?= $thirdLap['username']; ?> </a> </td>
                      <?php }else if($secondLap != 0){ ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/register/<?= $secondLap['username']; ?>?placement=left"> <img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"><br>
                        Add New</a> </td>
                      <?php }else{ ?>
                        <td style="min-width:100px" align="center"><img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"> </td>
                      <?php } ?>
                      
                      <td colspan="3">&nbsp;</td>
                      <?php if($secondLap['rightmember'] > 0){ ?>
                      <?php $thirdLap = getUserInfo($secondLap['rightmember']); ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/mynetwork?username=<?= $thirdLap['username']; ?>" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="<?php echo base_url(); ?>assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        <?= $thirdLap['username']; ?> </a> </td>
                      <?php }else if($secondLap != 0){ ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/register/<?= $secondLap['username']; ?>?placement=right"> <img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"><br>
                        Add New</a> </td>
                      <?php }else{ ?>
                        <td style="min-width:100px" align="center"><img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"> </td>
                      <?php } ?>
                      <td colspan="3">&nbsp;</td>
                      <?php if($secondLapRight['leftmember'] > 0){ ?>
                      <?php $thirdLapRight = getUserInfo($secondLapRight['leftmember']); ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/mynetwork?username=<?= $thirdLapRight['username']; ?>" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="<?php echo base_url(); ?>assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        <?= $thirdLapRight['username']; ?> </a> </td>
                      <?php }else if($secondLapRight != 0){ ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/register/<?= $secondLapRight['username']; ?>?placement=left"> <img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"><br>
                        Add New</a> </td>
                      <?php }else{ ?>
                        <td style="min-width:100px" align="center"><img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"> </td>
                      <?php } ?>

                      <td colspan="3">&nbsp;</td>
                      <?php if($secondLapRight['rightmember'] > 0){ ?>
                      <?php $thirdLapRight = getUserInfo($secondLapRight['rightmember']); ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/mynetwork?username=<?= $thirdLapRight['username']; ?>" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="<?php echo base_url(); ?>assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        <?= $thirdLapRight['username']; ?> </a> </td>
                      <?php }else if($secondLapRight != 0){ ?>
                        <td style="min-width:100px" align="center"><a class="tree" href="<?= site_url(); ?>/register/<?= $secondLapRight['username']; ?>?placement=right"> <img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" style="border:none"><br>
                        Add New</a> </td>
                      <?php }else{ ?>
                        <td style="min-width:100px" align="center"><img src="<?php echo base_url(); ?>assets/frontend/images/addnew2.png" height="60" width="60" style="border:none"> </td>
                      <?php } ?>
                      
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="17">&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
      </div>


      <!--TEJAL TABLE START -->
      <div class="table">
        <table border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td align="center"><table border="0" cellspacing="0" cellpadding="0" style="border:1px solid #000; width:100%;">
                  <tbody>
                    <tr>
                      <td align="center" style="background-color:#6DA9CB;color:#fff;"></td>
                      <td align="center" style="font-weight:bold;background-color:#6DA9CB;color:#fff;padding-right:30px;"> Search Username </td>
                      <td align="right" style="background:#367fa9;"><input type="text" ng-model="search_username" class="form-control ng-pristine ng-untouched ng-valid ng-empty" style="width:200px;" placeholder="-Input Username-">
                      </td>
                      <td align="center" style="background:#367fa9;"><input type="button" id="submit" name="submit" value="Search" style="background: #053b5a; color: #fff; border: none; padding: 8px 15px;  cursor: pointer;" ng-click="tree()">
                      </td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center"><table width="700" height="400" border="0">
                  <tbody>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="6">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="7">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                                        <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="6">&nbsp;</td>
                      <td style="min-width:100px" align="center"><a class="tree" href="http://localhost/projects/php_investmentclub/onlineinvestclub/index.php/mynetwork?username=amitjain" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Netayan</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:03 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF></font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip1(this)"> <img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        amitjain </a> </td>
                      <td colspan="6">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                      <td colspan="9" align="center"><img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/index_042.png" width="500" height="36"></td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                                                                    <td style="min-width:100px" align="center"><a class="tree" href="http://localhost/projects/php_investmentclub/onlineinvestclub/index.php/mynetwork?username=amit1" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Netayan</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:11 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>9876543210</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip2(this)"> <img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        amit1 </a> </td>
                                            <td colspan="7">&nbsp;</td>
                                                                    <td style="min-width:100px" align="center"><a class="tree" href="http://localhost/projects/php_investmentclub/onlineinvestclub/index.php/mynetwork?username=amit" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Netayan</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:11 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>9876543210</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip2(this)"> <img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        amit </a> </td>
                                            <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="5" align="center"><img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/small.gif" width="250" height="36"></td>
                      <td colspan="3">&nbsp;</td>
                      <td colspan="5" align="center"><img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/small.gif" alt="" width="250" height="36"></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                                                                    <td style="min-width:100px" align="center"><a class="tree" href="http://localhost/projects/php_investmentclub/onlineinvestclub/index.php/mynetwork?username=amit3" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        amit3 </a> </td>
                                            
                      <td colspan="3">&nbsp;</td>
                                                                    <td style="min-width:100px" align="center"><a class="tree" href="http://localhost/projects/php_investmentclub/onlineinvestclub/index.php/mynetwork?username=amit4" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        amit4 </a> </td>
                                            <td colspan="3">&nbsp;</td>
                                                                    <td style="min-width:100px" align="center"><a class="tree" href="http://localhost/projects/php_investmentclub/onlineinvestclub/index.php/mynetwork?username=amit5" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        amit5 </a> </td>
                      
                      <td colspan="3">&nbsp;</td>
                                                                    <td style="min-width:100px" align="center"><a class="tree" href="http://localhost/projects/php_investmentclub/onlineinvestclub/index.php/mynetwork?username=amit6" id="<table width=300 border=0 cellpadding=5 z-index=100 cellspacing=1 bgcolor=#CCCCCC><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Member Name</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>Clay Alvares</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>DOJ</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>24-03-2017 10:24:41 AM</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Sponsor ID</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>160307007008</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Left</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr><tr><td width=120px height=10px bgcolor=#336699><font color=#FFFFFF><strong>Total Right</strong></font></td><td width=180px height=10px bgcolor=#336699><font color=#FFFFFF>0</font></td></tr></table>" onmouseover="getTip4(this)"> <img src="http://localhost/projects/php_investmentclub/onlineinvestclub/assets/frontend/images/male-icon2.png" style="border:none"> <br>
                        amit6 </a> </td>
                                            
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="17">&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--TEJAL TABLE END-->
    </div>
 <?php $this->view('frontend/includes/footer',array('dashboard_footer'=>true)); ?>
</body>
</html>