<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="wrapper">
  <?php $this->view('frontend/includes/header'); ?>
  <?php /*?> <?php $this->view('frontend/banner'); ?><?php */?>
  	<div class="example-animation">
    <div data-lazy-background="<?= imagePath('assets/frontend/images/about-us.jpg','',1286,193); ?>">
      <h3 data-pos="['27%', '110%', '27%', '40%']" data-duration="1500" data-effect="move">About Us</h3>
    </div>
  </div>
  <style>
  .aboutus img{
    height: 200px;
  }
  </style>
<div class="textsec">
  <div class="container about-us" >
    <div class="aboutus"> 

        <img src="<?= base_url(); ?>timthumb.php?src=<?= base_url(); ?>assets/frontend/images/msi/amitjainpassport.jpg&w=280&h=260&q=99">
        <h2>Amit Jain (The Founder Of Online Trading Institute)</h2>
        <p>Mr.Amit Jain is the pioneer of trading education such as share trading, future and option etc...He has trained numerous people for IT education & other Profession from last 14 years.He has vast knowledge of marketing and network. He had done MBA in (Finance). He can change people mind set by ensuring them Success in their lives by having communication with positive thinking etc. He gives practical knowledge along with teaching lessons about trade. Option writing is his passion. He has done more than 10000+ trade from last 10 years. Now he helps people to grow their money by different means. He is one of the top believer in passive income system. He has managed funds from last 3 years in multiple fields.</p>
    </div>
    <div class="aboutus"> 
        <img src="<?= base_url(); ?>timthumb.php?src=<?= base_url(); ?>assets/frontend/images/msi/sumitjain.jpg&w=280&h=260&q=99">
        <h2>Sumit Jain (Chief of operation & client relations)</h2>
        <p> Mr.Sumit Jain is the backbone of online trading institute taking care of operations and ensuring that we are compliant to rules and regulations. We take pride, the way we support our clients and Sumit is responsible for this with his never ending flow of energy. He is the man behind our support initiatives that helped us stay ahead of the game.</p>
    </div>
    <div class="aboutus"> 
        <img src="<?= base_url(); ?>timthumb.php?src=<?= base_url(); ?>assets/frontend/images/msi/riteshrsingh.jpg&w=280&h=260&q=99">
        <h2>Mr.Ritesh R Singh (Equity Market Analyst)</h2>
        <p> Mr.Ritesh R Singh is one of the top market analysis of our team. He is doing market analysis profession from last 10 years.  We are sure there support to our clients definitely give edge over others in terms of monetary gain.</p>
    </div>
    <div class="aboutus"> 
        <img src="<?= base_url(); ?>timthumb.php?src=<?= base_url(); ?>assets/frontend/images/msi/deepakgupta.jpg&w=280&h=260&q=99">
        <h2>Mr. Deepak Gupta (FNO Specialist)</h2>
        <p> Mr. Deepak Gupta is one of the core member of the Team. He specialises in Market Research Analysist, always trying his best to providing solutions which will enhance the knowledge towards Stock Market from last 3 years.</p>
    </div>
    <div class="aboutus"> 
        <img src="<?= base_url(); ?>timthumb.php?src=<?= base_url(); ?>assets/frontend/images/msi/bikrantdutta.jpg&w=280&h=260&q=99">
        <h2>Mr. Bikrant Dutt (Currency Trader)</h2>
        <p> Mr. Bikrant Dutt is an Accounts Professor cum Professional Crypto Currency Trader with 3 years of Bitcoins and Altcoins Trading. He also gives consultancy services for crypto and Alt coins. He mostly do Trade on demand and supply zone. He specializes in designing trading systems to profit from Market inconsistencies using various derivative strategies. He ensures that we don't compromise by taking excessive risk. He is new era trader, he likes to trade with digital era when trading happened 24*7. He also likes to play video game in free time.</p>
    </div>
  </div>
  <div class="about_us">
    <div class="container">
      <ul class="reset">
        <li> <img src="<?= base_url(); ?>assets/frontend/images/mission.png">
          <h4>mission</h4>
          <p>Create Financial Freedom Globally by Providing Financial Education</p>
        </li>
        <li><img src="<?= base_url(); ?>assets/frontend/images/vision.png">
          <h4>value</h4>
          <p>We Believe Transparency, Integrity and Trust.</p>
        </li>
        <li><img src="<?= base_url(); ?>assets/frontend/images/work.png">
          <h4>Goal</h4>
          <p>Provide Passive Income to Maximum People</p>
        </li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</div>
<?php $this->view('frontend/includes/footer'); ?>
