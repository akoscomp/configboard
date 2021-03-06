<?php
include("config.php");

$xml_filename = "data.xml";

if (file_exists($xml_filename)) {
    $data = simplexml_load_file($xml_filename);
} else {
    exit('Failed to open xml file.');
}

function get_xml_data($data, $id) {
  foreach ($data->vars as $var) {
      foreach ($var as $keys) {
        if ($keys->id == $id) {
          return $keys->data;
        }
      }
  }
}

function print_xml_navitem_vars($data, $id_nav) {
  $p_cnt_vars = count($data->vars->value);
  for($i_vars = 0; $i_vars < $p_cnt_vars; $i_vars++) {
    $vars_value = $data->vars->value[$i_vars];
    $type_var = $vars_value->type;
    $navitem_var = $vars_value->navitem;
    $id_var = $vars_value->id;
    $name_var = $vars_value->name;
    $data_var = $vars_value->data;
    if (strcmp($navitem_var, $id_nav) == 0) {
      print_xml_vars($type_var, $id_var, $name_var, $data_var);
    }
  }
}

function print_xml_vars($type_var, $id_var, $name_var, $data_var) {
  switch ($type_var) {
    case "string":
      echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
          echo '<span class="input-group-text" id="var-name-'.$id_var.'">'.$name_var.'</span>';
        echo '</div>';
        echo '<input type="text" class="form-control input-'.$type_var.'" id="'.$id_var.'" data-type="'.$type_var.'" aria-describedby="basic-addon3" value="'.$data_var.'">';
      echo '</div>';
      break;
    case "password":
        echo '<form class="pure-form">';
        echo '<label for="basic-url">Change you password</label>';
        echo '<div class="input-group mb-3">';
          echo '<div class="input-group-prepend">';
            echo '<span class="input-group-text" id="var-name-'.$id_var.'">Old password</span>';
          echo '</div>';
          echo '<input type="password" class="form-control" id="var-data-password-'.$id_var.'" data-type="'.$type_var.'" aria-describedby="basic-addon3" placeholder="Old password" required>';
        echo '</div>';
        echo '<div class="input-group mb-3">';
          echo '<div class="input-group-prepend">';
            echo '<span class="input-group-text" id="basic-addon3">New password</span>';
          echo '</div>';
          echo '<input type="password" class="form-control" id="var-data-password1-'.$id_var.'" aria-describedby="basic-addon3" placeholder="New password" required>';
        echo '</div>';
        echo '<div class="input-group mb-3">';
          echo '<div class="input-group-prepend">';
            echo '<span class="input-group-text" id="basic-addon3">Confirm password</span>';
          echo '</div>';
          echo '<input type="password" class="form-control" id="var-data-password2-'.$id_var.'" aria-describedby="basic-addon3" placeholder="Confirm password" required>';
        echo '</div>';
        echo '<button type="button" id="'.$id_var.'" class="btn btn-success subbmit-password">Subbmit</button>';
        echo '</form>';
      break;
    case "readonly":
      //echo "RO!";
      break;
    default:
      echo "Undefined type!";
  }
}

?>
