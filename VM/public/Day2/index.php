<?php
// declare our validation variables
$vehicle = $vehicleErr = $passengerErr = $formResponse = "";
$passengers = 0;
$vehicles = ["Plane", "Car", "Bike"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validate vehicle selection
    if (empty($_POST["vehicle"])) {
        $vehicleErr = "Please select a vehicle";
    } else {
        $vehicle = test_input($_POST["vehicle"]);
        // check if input is one of the options
        if (!in_array($vehicle, $vehicles)) {
            $vehicleErr = "Vehicle input is not a valid selection option";
        }
    }

    // validate passenger input
    if (empty($_POST["passengers"])) {
        $passengerErr = "Please enter number of passengers";
    } else {
        $passengers = test_input($_POST["passengers"]);
    }
}

// CAN ALSO USE filter_var($var, "SANTITIZE_TYPE")
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

spl_autoload_register(function ($class_name) {
    include '../Day1/' . $class_name . '.php';
});
if (isset($_POST['submit'])) {
    $instance = new $vehicle();
    $instanceMax = $instance->getPassengers();

    if ($instanceMax < $passengers) {
        $formResponse = "You CANNOT Travel!";
    } else {
      header('Location: ./success.php');
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      .response {
        border: 1px solid red;
        background-color: lightgrey;
        color: brown;
        display: inline-block;
      }
    </style>
  </head>
  <body>
    <form method="POST" action=<?php htmlspecialchars($_SERVER["PHP_SELF"])?> >
      <div><strong>Travel using a</strong></div>
      <br>
      <div>
        <input type="radio" name="vehicle" value="Plane" <?php if (isset($vehicle) && $vehicle == "Plane") {echo "checked";}?>/>
        <label for="Plane">Plane</label>
      </div>
      <div>
        <input type="radio" name="vehicle" value="Car" <?php if (isset($vehicle) && $vehicle == "Car") {echo "checked";}?>/>
        <label for="Car">Car</label>
      </div>
      <div>
        <input type="radio" name="vehicle" value="Bike" <?php if (isset($vehicle) && $vehicle == "Bike") {echo "checked";}?>/>
        <label for="Bike">Bike</label>
      </div>
      <span style="color:red;">* <?php echo $vehicleErr; ?></span>
      <br>
      <div>
        <strong>Passengers</strong>
        <input type="number" name="passengers" value="<?php echo $passengers ?>" /><span style="color:red;">* <?php echo $passengerErr; ?></span>
      </div>
      <input type="submit" value="Submit" name="submit"/>
    </form>

    <p class="response"><?php echo $formResponse; ?></p>

  </body>
</html>

