<?php

/* $eventoAd = $data->getAllEventAdministrative();
  foreach ($eventoAd as $value) {
  ?>{
  id: '<?php echo $value['id']; ?>',
  title: '<?php echo $value['title']; ?>',
  <?php
  if (empty($value['startHour'])) {
  ?>
  start: '<?php echo $value['start']; ?>',
  <?php
  } else {
  ?>
  start: '<?php echo $value['start'] . ' ' . $value['startHour']; ?>',
  <?php
  }
  ?>
  end: '<?php echo $value['end']; ?>',
  color:'<?php echo $value['color']; ?>'
  }<?php
  $last = $data->getLastEventAdministrative();
  $ex;
  foreach ($last as $valueX) {
  $ex = $valueX['id'];
  }
  if ($ex == $value['id']) {

  } else {
  echo ',';
  };
  } */

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

$color=rand_color();
echo "hola ".$color;
echo '<input type="color" value="'.$color.'">';

?>