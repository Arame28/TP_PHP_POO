<?php

  $headTitle = "Acceuil";
  ob_start();
?>

   <div class="container">
        <h1>Machine à Sous</h1>
        <div class="slot-machine">
            <div class="reel" id="reel1">🍒</div>
            <div class="reel" id="reel2">🍒</div>
            <div class="reel" id="reel3">🍒</div>
        </div>
        <button id="spinButton">Spin!</button>
        <p id="result"></p> 
        <h1>Félicitation! Vous avez gagné 40 points! </h1>
    </div>

    <script src="/sources/js/machine.js"></script>

<?php
$mainContent = ob_get_clean();


