<?php
require_once '_php/authController.php';?>
<html>
<body>

<script>

var contador = '600';

function startTimer(duration, display) {
  var timer = duration, minutes, seconds;
  setInterval(function() {
    minutes = parseInt(timer / 60, 10)
    seconds = parseInt(timer % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    document.getElementById('segundos').value = minutes;
    document.getElementById('minutos').value = seconds;
    display.textContent = minutes + ":" + seconds;

    if (--timer < 0) {
      location.reload();
    }
  }, 1000);
}

window.onload = function() {
  var count = parseInt(contador),
    display = document.querySelector('#time');
  startTimer(count, display);
};
</script>

<div>Registros terminam em <span id="time">Carregando...</span>!</div>

<form action="" method="post">
<input type="number" id="segundos" readonly>
<input type="number" id="minutos" readonly>
<input type="submit" value="asdas" name="finalizar">
</form>

<?php
if(isset($_POST['vai'])){
}
?>

</body>
</html>
