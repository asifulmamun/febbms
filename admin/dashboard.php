<?php
/*
    ------- HOME PAGE --------
    This is index or main file
    here is included initial etcile.
*/
    include 'init.php'; // initial file
    $template_name = 'Dashboard'; // template name
    include $tpl . 'header.php'; // header included
    include $config . 'conn.php'; // db connection
?>


<!-- counter -->
<div class="row justify-content-md-center">
    <div class="col-md-10 col-sm-12 col-xs-12 text-center py-1 pt-5 border-bottom mb-3">
      <h4>How many Request for blood and How many Donar..!</h4>
    </div>
    <div class="col-6 text-center praent_counter">
      <div class="mx-auto counter text-center bg-success rounded-circle text-light" data-count="<?php echo countDonar('becomedonor'); ?>">0</div>
      <span class="text-success">Total Donor</span>
    </div>
    <div class="col-6 text-center praent_counter">
      <div class="mx-auto counter text-center bg-success rounded-circle text-light" data-count="<?php echo countDonar('requestblood'); ?>">0</div>
      <span class="text-success">Total Request For Blood</span>
    </div>
</div>

<!-- Requester -->
<?php
  include $tpl . 'dashboard-requseter.php';
?>

<!-- Donar -->
<?php
  include $tpl . 'dashboard-donar.php';
?>






<?php
/*
    ------- FOOTER PAGE --------
    All footer function are included to this page.
*/
    include $tpl . 'footer.php'; // footer included
?>

<!-- counter js -->
<script type="text/javascript">
$('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {
    duration: 1000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
    }
  });  
});
</script>