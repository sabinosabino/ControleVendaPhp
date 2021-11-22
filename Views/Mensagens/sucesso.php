<script src=<?php echo "../Scripts/acoes.js"; ?>></script>
<script src=<?php echo "../Scripts/jquery.mask.js"; ?>></script>
<?php
if (strpos($dadosModel[0], "excluido") > 0) {
  $redirec = "../" .$dadosModel[1] ."/";
} else {
  $redirec = "../" .$dadosModel[1] ."/novo";
}
?>
<div class="alert alert-success text-center" role="alert">
  <div>
    <h2><?php echo $dadosModel[0] ?></h2>
  </div>
  <div><strong>
      <h4>Você será redireciondo(a)</h4>
    </strong>
  </div>
</div>

<?php
if (strpos($dadosModel[0], "salvo") > 0) {
  echo 
  '<script type="text/javascript">
  setInterval(
    function() {
      window.location.href = "../' .$dadosModel[1] .'/novo";
    }, 1500);
  </script>';
} else {
  echo
  '<script type="text/javascript">
  setInterval(
    function() {
      window.location.href = "../'.$dadosModel[1] .'/";
    }, 1500);
  </script>';
}
