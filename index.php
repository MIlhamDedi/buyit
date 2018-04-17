<?php if(!isset($_SESSION)) { session_start(); } ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Crete+Round|Pacifico" rel="stylesheet">

    <title>Muhammad Ilham Dedi | U1620128B</title>
  </head>
  <body style="background-color: #00ce8f; font-family: 'Crete Round', serif;">
    <?php if(isset($_POST) && (isset($_POST['submit']) && $_POST['submit'] == "Submit")) { ?>
    <?php
      $total = $_POST['apple-qty'] * 69 + $_POST['orange-qty'] * 59 + $_POST['banana-qty'] * 39;
      
      $orderFile = fopen("order.txt", "r") or die("Unable to open file for read!");
      $appleQty = substr(fgets($orderFile), 24, -1);
      $orangeQty = substr(fgets($orderFile), 25, -1);
      $bananaQty = substr(fgets($orderFile), 25, -1);
      fclose($orderFile);
      
      $orderFile = fopen("order.txt", "w") or die("Unable to open file for write!");
      $order = "Total number of apples: " . ($_POST['apple-qty']) . "\r\nTotal number of oranges: " . ($_POST['orange-qty']) . "\r\nTotal number of bananas: " . ($_POST['banana-qty']) . "\r\n";
      fwrite($orderFile, $order);
      fclose($orderFile);
    ?>
    <div >
      <h1 style="text-align: center; color: white; font-family: 'Pacifico', cursive; font-size: 40px; padding: 10px">BuyIt</h1>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">Thank You For The Purchase, <?php echo !isset($_POST['name']) || empty($_POST['name']) || is_null($_POST['name']) ? "<em>Anonymous</em>" : $_POST['name']; ?>!</h5>
          </div>
          <div class="modal-body">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col-sm">
                                  Apple
                              </div>
                              <div class="col-sm" style="text-align: right;">
                              <?php echo ($_POST['apple-qty'] * 69) < 100 ? ($_POST['apple-qty'] * 69) . "&#162;" : '&#36;' . number_format(($_POST['apple-qty'] * 69)/100, 2); ?>
                              </div>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col-sm">
                                  Orange
                              </div>
                              <div class="col-sm" style="text-align: right;">
                              <?php echo ($_POST['orange-qty'] * 59) < 100 ? ($_POST['orange-qty'] * 59) . "&#162;" : '&#36;' . number_format(($_POST['orange-qty'] * 59)/100, 2); ?>
                              </div>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col-sm">
                                  Banana
                              </div>
                              <div class="col-sm" style="text-align: right;">
                              <?php echo ($_POST['banana-qty'] * 39) < 100 ? ($_POST['banana-qty'] * 39) . "&#162;" : '&#36;' . number_format(($_POST['banana-qty'] * 39)/100, 2); ?>
                              </div>
                          </div>
                      </li>
                      <li class="list-group-item" style="background-color: #00ce8f; color: snow">
                          <div class="row">
                              <div class="col-sm">
                                  Total (Paid via <?php echo $_POST['pay-method']; ?>)
                              </div>
                              <div class="col-sm" style="text-align: right;">
                              <?php echo $total > 0 && $total < 100 ? $total . "&#162;" : '&#36;' . number_format($total/100, 2); ?>
                              </div>
                          </div>
                      </li>
                    </ul>
          </div>
          <div class="modal-footer">
          <h5 style="text-align: center; color: #00ce8f; font-family: 'Pacifico', cursive; font-size: 30px; padding: 10px">BuyIt</h5>
          </div>
      </div>
      </div>
    </div>
    <?php } ?>
  </body>
</html>