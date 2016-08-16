<?php

if (isset ($_POST["btnSubmit"])) {

   $requisitionNumber = $_POST["txtRequsitionNumber"];
   $requsitionStatus = $_POST["RequsitionStatus"];

   $curl = curl_init();

   curl_setopt_array($curl, array(
     CURLOPT_URL => "https://labs-staging.pwnhealth.com/customers/".$requisitionNumber."/mock_order",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => "<mock>\n<simulate>result</simulate>\n<result kind=\"normal\" complete=\"complete\">\n</result>\n</mock>\n",
     CURLOPT_HTTPHEADER => array(
       "authorization: Basic b25ldG9vbmU6TXB2bW4yNWRFdFJS",
       "cache-control: no-cache",
       "content-type: text/xml",
       "postman-token: e0ac2529-bbb3-6cb9-d59b-269d0c6d9736"
     ),
   ));

   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);


$results;
$success;
 if ($err) {
   $success = false;
   $results =  "cURL Error #:" . $err;
 } else {
   $success = true;
   $results =  $response;
 }

}

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
    <?php if(isset($results)) : ?>
      <?php if(isset($success)) : ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <span><strong>Message Sent!</strong> (Response:  <?php echo $results ?> )</span>
        </div>
      <?php else : ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <span><strong>Error: </strong> <?php echo $results ?> </span>
    </div>
  <?php endif; ?>

  <?php endif; ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="#">Labcorp Results Generator </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Labcorp Results Generator</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-8">
                    <form class="form-horizontal" method="POST">
            <fieldset>

            <!-- Form Name -->
            <legend>Labcorp Results Generator </legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="txtRequsitionNumber">Requisition Number</label>
              <div class="col-md-4">
              <input id="txtRequsitionNumber" name="txtRequsitionNumber" type="text" placeholder="placeholder" class="form-control input-md" required="">

              </div>
            </div>



            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="btnSubmit"></label>
              <div class="col-md-4">
                <button id="btnSubmit" name="btnSubmit" value="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

            </fieldset>
            </form>





       </div>
       <div class="col-md-4">

       </div>

      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>
