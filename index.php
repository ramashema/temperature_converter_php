<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Temperature Converter</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-4 col-md-4 col-sm-4 offset-4 offset-md-4 offset-sm-4 offset-lg-4 mt-sm-3 mt-md-3 mt-lg-3 bg-white p-5 rounded">
                <div class="text-center text-muted mb-4">
                    <h4>Temperature Converter</h4>
                </div>
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm form-control-lg" name="temp_value" id="temp_value" value="<?php isset($_POST['temp_value']) ? print $_POST['temp_value'] : print 0?>">
                    </div>
                    <div class="form-group">
                        <label>Centigrade: <input type="radio" name="temp_unit" class="custom-radio" value="centigrade" checked></label>
                        <label class="ml-5">Fahrenheit: <input type="radio" name="temp_unit" class="custom-radio" value="fahrenheit"></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-block" name="submitted" value="Calculate">
                    </div>
                </form>
                <div class="text-center">
                    <?php
                        if( isset($_POST['submitted']))
                        {
                            if( isset( $_POST['temp_value']) && is_numeric($_POST['temp_value']))
                            {
                                $temp_value = clean_input( $_POST['temp_value'] );

                                if( isset($_POST['temp_unit']) && $_POST['temp_unit'] == "centigrade" )
                                {
                                    $fahrenheit = 9/5 * $temp_value + 32;
                                    echo "<p class='alert alert-info'>".htmlspecialchars($temp_value)." &deg;C = ".htmlspecialchars($fahrenheit)." &deg;F</p>";

                                }

                                if ( isset($_POST['temp_unit']) && $_POST['temp_unit'] == "fahrenheit" )
                                {
                                    $centigrade = 5/9 * ( $temp_value - 32 );
                                    echo "<p class='alert alert-info'>".htmlspecialchars($temp_value). "&deg;F = ".htmlspecialchars($centigrade)." &deg;C</p>";
                                }
                            }

                            else
                            {
                                echo "<p class='alert alert-info'> Incorrect value entered (Must be numeric)</p>";
                            }
                        }

                        else
                        {
                            echo "<p class='alert alert-danger'>Enter the numeric value on the field  choose the Unit</p>";
                        }


                        function clean_input( $data )
                        {
                            if( get_magic_quotes_gpc()) stripslashes( $data );
                            $data = strip_tags( $data );

                            return htmlentities( $data );
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</>
</html>