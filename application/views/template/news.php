<?php $this->view('frontend/includes/header1'); ?>
  <div class="textsec">
    <div class="container">
      <h1>News</h1>
      <?php $news = getNews(); ?>
      <?php foreach($news as $row){ 
        $date_create = date_create($row['created_date']);
        ?>
          <div class="sec-1">
              <div class="date-sec">
                  <span><?= date_format($date_create,"d"); ?></span>
                  <span class="month-sec"><?= date_format($date_create,"M"); ?></span>
                  <span class="date"><?= date_format($date_create,"Y"); ?></span>
              </div>
                  <div class="news-sec">
                      <h3><?= $row['news_heading']; ?></h3>
                      <p><?= $row['news_desc']; ?></p>
                      <a href="<?= site_url(); ?>/news/view/<?= $row['news_id']; ?>">Read More...</a>
                  </div>
              <div class="clear"></div>
          </div>
      <?php } ?>
    </div>
  </div>
<?php $this->view('frontend/includes/footer',array('dashboard_footer'=>true)); ?>