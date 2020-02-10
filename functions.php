<?php

if (file_exists("skell.xml")) {
    $data = simplexml_load_file("skell.xml");
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

?>
