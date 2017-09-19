<?php $this->view('frontend/includes/header1'); ?>
<?php 
$news = getNews($news_id); 

$date_create = date_create($news['created_date']);
?>
<div class="textsec">
  <div class="container">
   <div class="news_sec">
    <h3><?= $news['news_heading']; ?></h3>
    <h4><?= date_format($date_create,"jS"); ?><span><?= date_format($date_create,"M"); ?></span><?= date_format($date_create,"Y"); ?></h4>
    
    <?= $news['news_desc']; ?>
    </div>
  </div>
</div>
<?php $this->view('frontend/includes/footer',array('dashboard_footer'=>true)); ?>