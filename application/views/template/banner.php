<div class="example-animation">
  <?php 
      $slider = array(
                array("image"=>"amitjain.jpg","text1"=>"Its About Capital & Risk Management","text2"=>"Mind Set & Trade setup"),
                array("image"=>"amitjain1.jpg","text1"=>"Earn Per Day","text2"=>"₹ 2000 to ₹ 3000"),
                array("image"=>"amitjain2.jpg","text1"=>"Right Opportunity + Patience","text2"=>"= 100% Success"),
                array("image"=>"amitjain3.jpg","text1"=>"100 % SUCCESS = ","text2"=>"Observation + Learning + Practice")
                );
      foreach($slider as $row) { 
        ?>
      <div data-lazy-background="<?= base_url(); ?>timthumb.php?src=<?= base_url(); ?>/assets/frontend/images/msi/<?= $row['image']; ?>&h=473&q=100">
          <h3 data-pos="['27%', '110%', '27%', '5%']" data-duration="400" data-effect="move"><?= $row['text1']; ?></h3>
          <div data-pos="['46%', '-40%', '46%', '5%']" data-duration="400" data-effect="move" class="bnr-btn"><?= $row['text2']; ?></div>
      </div>
  <?php } ?>
</div>
