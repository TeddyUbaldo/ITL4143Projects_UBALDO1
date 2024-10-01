<?php
// Set the initial time remaining to 5 minutes

phpinfo();

$timeRemaining = 300; // 5 minutes in seconds
?>



<!-- HTML Code -->
<div id="countdown-timer"><?php echo floor($timeRemaining / 60) . ":" . ($timeRemaining % 60); ?></div>

<!-- JavaScript Code -->
<script>
  let countdownTimer = document.getElementById('countdown-timer');
  let timeRemaining = <?php echo $timeRemaining; ?>;

  function updateCountdown() {
    let minutes = Math.floor(timeRemaining / 60);
    let seconds = timeRemaining % 60;
    countdownTimer.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    timeRemaining--;
    if (timeRemaining >= 0) {
      setTimeout(updateCountdown, 1000);
    } else {
     window.location.href='Ubaldologin.php';
    }
  }

  updateCountdown();
</script>