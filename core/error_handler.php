<?php

//error handler function
function error_handler($errno, $errstr, $fileName, $lineNo) {
  echo '
  <style>
    .oden_error {
    border: 1px solid red;
    background-color: #efd6d6;
    margin: 5px;
    padding: 5px;
    display: inline-block;
    float: left;
  }
  </style>';
  switch ($errno) {

      // fatal error. die it.
    case E_USER_ERROR:
      echo "<span class='oden_error'><b>Error:</b> [$errno] $errstr<br />In $fileName on line $lineNo<br /></span>";
      echo "Ending Script<br>";
      die();
      break;

    case E_USER_WARNING:
      echo "<span class='oden_error'><b>My WARNING</b> [$errno] $errstr<br />In $fileName on line $lineNo<br /></span>";
      break;

    case E_USER_NOTICE:
      echo "<span class='oden_error'><b>My NOTICE</b> [$errno] $errstr<br />In $fileName on line $lineNo<br /></span>";
      break;

    default:
      echo "<span class='oden_error'>Unknown error type: [$errno] $errstr<br />In $fileName on line $lineNo<br /></span>";
      break;

  }

  /* Don't execute PHP internal error handler */
  return true; // no return (=null) is treated as true

}

?>