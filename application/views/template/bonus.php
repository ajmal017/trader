<?php $this->view('frontend/includes/header1'); ?>
    <div class="middle-content">
      <div class="center">
        <button class="accordion" style="width: 42%;">
        <h4>Last Week Bonus</h4>
        <br/>
        <h5>
        <?php 
      		$userid = $session_data['logged_in']['userid'];
    		$total =  getBonus($userid,true);
    		echo "₹ ".sprintf("%02d", $total); 
		?>
        </h5>
        <br />
        <div class="clear"></div>
        </button>

        <?php 
            $userid = $session_data['logged_in']['userid'];
            $user_payment_details =  user_payment_details($userid);
        ?>
        <button class="accordion" style="width: 42%;">
            <h4>Total Bonus</h4>
            <br/>
            <h5><?= "₹ ".sprintf("%02d", $user_payment_details['Total_Amount']); ?></h5>
            <br/>
            <div class="clear"></div>
        </button>

        <button class="accordion" style="width: 42%;">
            <h4>Total Paid Amount</h4>
            <br/>
            <h5><?= "₹ ".sprintf("%02d", $user_payment_details['Paid_Amount']); ?></h5>
            <br/>
            <div class="clear"></div>
        </button>

        <button class="accordion" style="width: 42%;">
            <h4>Total Remaining Amount</h4>
            <br/>
            <h5><?= "₹ ".sprintf("%02d", $user_payment_details['Remaining_Amount']); ?></h5>
            <br/>
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