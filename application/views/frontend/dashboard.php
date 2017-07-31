<?php $this->view('frontend/includes/header1'); ?>
    <div class="middle-content">
      <div class="center">
        <button class="accordion">
        <h4>Current Package</h4>
        <br />
        <h5>trader</h5>
        <br />
        <p>view more..</p>
        <img src="<?= base_url(); ?>assets/frontend/images/gold-icon.png" />
        <div class="clear"></div>
        </button>
        <div class="panel">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
        </div>
        <button class="accordion">
        <h4>coming soon</h4>
        <br />
        <h5>trader</h5>
        <br />
        <p>view more..</p>
        <img src="<?= base_url(); ?>assets/frontend/images/gold-icon.png" />
        <div class="clear"></div>
        </button>
        <div class="panel">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
        </div>
        <button class="accordion">
        <h4>coming soon</h4>
        <br />
        <h5>trader</h5>
        <br />
        <p>view more..</p>
        <img src="<?= base_url(); ?>assets/frontend/images/gold-icon.png" />
        <div class="clear"></div>
        </button>
        <div class="panel">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
        </div>
      </div>
    </div>
   <div class="clear"></div> 
<?php $this->view('frontend/includes/footer',array('dashboard_footer'=>true)); ?>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>
</body>
</html>