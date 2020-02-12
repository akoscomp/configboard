<?php
include("functions.php");

$id = isset($_POST['id']) ? $_POST['id'] : null;
$value = isset($_POST['value']) ? $_POST['value'] : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;
$password0 = isset($_POST['password0']) ? $_POST['password0'] : null;
$password1 = isset($_POST['password1']) ? $_POST['password1'] : null;

$return = "ERROR";

if ($type === "string") {
  $p_cnt_vars = count($data->vars->value);
  for($i_vars = 0; $i_vars < $p_cnt_vars; $i_vars++) {
    if ( $data->vars->value[$i_vars]->id == $id ) {
      $data->vars->value[$i_vars]->data = $value;
      $return = "Save OK";
    }
  }
  $data->asXml($xml_filename);
}

if ($type === "password") {
  $pw = get_xml_data($data, $id);
  if ($pw == hash('sha256', $password0)) {
    $pw_new = hash('sha256', $password1);
    $p_cnt_vars = count($data->vars->value);
    for($i_vars = 0; $i_vars < $p_cnt_vars; $i_vars++) {
      if ( $data->vars->value[$i_vars]->id == $id ) {
        $data->vars->value[$i_vars]->data = $pw_new;
        $return = "Save OK";
      }
      $data->asXml($xml_filename);
    }
  } else {
    $return = 1;
  }
}
echo $return;
?>
