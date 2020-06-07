<?php
  include_once "dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
  <title>Healthy Burger</title>
</head>
<body>
  <div id="header">
    <div id="header-logo-container">
      <!-- logo -->  
    </div>
  </div>
  <div id="body">
    <!-- body top section -->
    <div id="body-top">
      <div id="body-top-left">
        <div id="menu-main">
          <h1 id="menu">Menu</h1>
            <h2 id="menu-burger">Burgers</h2>
            <h2 id="menu-addon">Add-on</h2>
            <h2 id="menu-drinks">Drinks</h2>  
        </div>
      </div>
      <div id="body-top-right">
        <div id="body-top-right-top">
          <div id="menu-sub">
            <!-- sub-burgers -->
            <div id="sub-burgers">
              <table>
              <?php
                try {
                  $stmt = $pdo->query("SELECT * FROM menu WHERE type = 'Burger'");
                  $result = $stmt->fetchAll();

                  foreach ($result as $row) {
                    echo "<tr>" . "<td>" . $row['menu_item'] . "</td>" . "<td>$" . $row['price'] . "</td>" . "<td>" . $row['calories'] . " calories" . "</td>" . "<td>" . "<button id='b-" . $row['menu_id'] . "'>ADD</button>" . "</td>" . "</tr>";
                  }

                } catch(PDOException $e) {
                  echo $e->getMessage();
                }
              ?>
              </table>
            </div>
            <!-- sub-addon -->
            <div id="sub-addon">
              <table>
              <?php
                try {
                  $stmt = $pdo->query("SELECT * FROM menu WHERE type = 'Add-on'");
                  $result = $stmt->fetchAll();

                  foreach ($result as $row) {
                    echo "<tr>" . "<td>" . $row['menu_item'] . "</td>" . "<td>$" . $row['price'] . "</td>" . "<td>" . $row['calories'] . " calories" . "</td>" . "<td>" . "<button id='a-" . $row['menu_id'] . "'>ADD</button>" . "</td>" . "</tr>";
                  }
                } catch(PDOException $e) {
                  echo $e->getMessage();
                }
              ?>
              </table>
            </div>
            <!-- sub-drink -->
            <div id="sub-drinks">
              <table>
              <?php
                try {
                  $stmt = $pdo->query("SELECT * FROM menu WHERE type = 'Drinks'");
                  $result = $stmt->fetchAll();

                  foreach ($result as $row) {
                    echo "<tr>" . "<td>" . $row['menu_item'] . "</td>" . "<td>$" . $row['price'] . "</td>" . "<td>" . $row['calories'] . " calories" . "</td>" . "<td>" . "<button id='d-" . $row['menu_id'] . "'>ADD</button>" . "</td>" . "</tr>";
                  }
                } catch(PDOException $e) {
                  echo $e->getMessage();
                }
              ?>
              </table>
            </div>
          </div>
        </div>
        <div id="body-top-right-bottom">
          <div id="body-top-right-bottom-left">
            <p>Total: $<span id="order-total"></span></p>
          </div>
          <div id="body-top-right-bottom-right">
            <form action="order.php" method="post">
              <input type="hidden" name="order-total" value="0" id="order-total-hidden">
              <input type="submit" name="order-total-submit" value="ORDER">
            </form>
          </div>

        </div>
      </div>
    </div>

    <hr class="section-divider">

    <div id="body-mid">
      <div id="body-mid-left">
        <div id="catering-add">
          <h1 id="catering">Book for Catering</h1>
          <form action="catering.php" method="post" id="catering-add-form">
            <input type="text" name="add-customer-name" required placeholder="Full Name*"><br/>
            <input type="text" name="add-no-people" required placeholder="Number of People*"><br/>
            <input type="text" name="add-no-meal" required placeholder="Number of Meal*"><br/>
            <input type="text" name="add-date" required placeholder="YYYY-MM-DD*"><br/>
            <input type="text" name="add-mobile-no" required placeholder="Mobile Number*"><br/>
            <input type="text" name="add-email" required placeholder="Email Address*"><br/>
            <input type="text" name="add-comment" placeholder="Comment"><br/>
            <input type="submit" name="add-booking" class="submit-button" value="BOOK">
          </form>
        </div>
      </div>
      <div id="body-mid-right">
        <div id="body-mid-right-top">
          <!-- ud: update and delete -->
          <div id="catering-ud">
            <h1>Search Booking</h1>
            <form action="index.php" method="post" id="catering-ud-form">
              <input type="text" name="ud-customer-name" required placeholder="Full Name*"><br/>
              <input type="text" name="ud-email" required placeholder="Email Address*"><br/>
              <input type="submit" name="ud-search" class="submit-button" value="SEARCH"><br/>
            </form>
            <!-- display the search results of the booking down here -->
          </div>
        </div>
        <div id="body-mid-right-bottom">
            <!-- include search function here in php -->
            <table>
            <?php
              if (isset($_POST['ud-search'])) {
                $udCustomerName = $_POST['ud-customer-name'];
                $udEmail = $_POST['ud-email'];

                $stmt = $pdo->prepare('SELECT * FROM catering WHERE name = ? AND email = ?');
                $stmt->execute([$udCustomerName, $udEmail]);
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
                  echo "<tr><td id='ud-search-result-heading'><b>Search Results<b></td></tr>";
                  echo "<tr>";
                    echo "<td>Name:</td>";
                    echo "<td>" . $row['name'] . "</td>";
                  echo "</tr>";
                  
                  echo "<tr>";
                    echo "<td>Number of People:</td>";
                    echo "<td>" . $row['no_people'] . "</td>";
                  echo "</tr>";

                  echo "<tr>";
                    echo "<td>Number of Meal:</td>";
                    echo "<td>" . $row['no_meal'] . "</td>";
                  echo "</tr>";

                  echo "<tr>";
                    echo "<td>Date:</td>";
                    echo "<td>" . $row['date'] . "</td>";
                  echo "</tr>";

                  echo "<tr>";
                    echo "<td>Mobile No:</td>";
                    echo "<td>" . $row['mobile_no'] . "</td>";
                  echo "</tr>";

                  echo "<tr>";
                    echo "<td>Email:</td>";
                    echo "<td>" . $row['email'] . "</td>";
                  echo "</tr>";

                  echo "<tr>";
                    echo "<td>Comment:</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                  echo "</tr>";

                  echo "<tr>";
                    echo "<td>" . "<button id='ud-update-booking'>UPDATE</button>" . "</td>";
                    echo "<form action='catering.php' method='post'>";
                      echo "<input type='hidden' name='id-holder' id='id-holder' value='" . $row['booking_id'] . "'>";
                      echo "<td>" . "<input type='submit' name='ud-delete-booking' value='DELETE'>" . "</td>";
                    echo "</form>";
                  echo "</tr>";
                }
              }
            ?>
            </table>
        </div>

        <!-- modal -->
      
        <div id="ud-modal">
          <h1>Update Booking</h1>
          <form action="catering.php" method="post" id="modal-ud-form">
            <input type="hidden" name="modal-ud-id" id="modal-ud-id" value="0">
            <input type="text" name="modal-ud-no-people" required placeholder="Number of People*"><br/>
            <input type="text" name="modal-ud-no-meal" required placeholder="Number of Meal*"><br/>
            <input type="text" name="modal-ud-date" required placeholder="YYYY-MM-DD*"><br/>
            <input type="text" name="modal-ud-mobile-no" required placeholder="Mobile Number*"><br/>
            <input type="text" name="modal-ud-email" required placeholder="Email Address*"><br/>
            <input type="text" name="modal-ud-comment" required placeholder="Comment"><br/>
            <input type="submit" name="modal-ud-booking" class="submit-button" value="UPDATE">
          </form>
        </div>

        <!-- end modal -->

      </div>
    </div>

    <hr class="section-divider">

    <div id="body-bottom">
      <!-- no body-bottom-left and body-bottom-right -->
      <h1 id="career">Career</h1>
      <form action="career.php" method="post" id="career-form">
        <input type="text" name="applicant-name" required placeholder="Full Name*"><br/>
        <input type="text" name="career-date" required placeholder="YYYY-MM-DD*"><br/>
        <input type="text" name="career-mobile-no" required placeholder="Mobile Number*"><br/>
        <input type="submit" name="career-submit" class="submit-button" value="Message">
      </form>
    </div>
  </div>
  <div id="footer">
    <div id="footer-content">
      <h1>HEALTHY BURGER</h1>
      <p>Copyright &copy; 2000 - 2020</p>
      <p>All Rights Reserved.</p>
    </div>
  </div>
  <script src="js/modal-window.js"></script>
  <script src="js/modal-init.js"></script> 
</body>
</html>