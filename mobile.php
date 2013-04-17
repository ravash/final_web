<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>
        </title>
        <link rel="stylesheet" href="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
		<link rel="stylesheet" href="css/main_m.css">
        <script src="https://s3.amazonaws.com/codiqa-cdn/jquery-1.7.2.min.js">
        </script>
        <script src="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.js">
        </script>
        <script src="js/my.js">
        </script>
        <!-- User-generated css -->
        <style>
        </style>
        <!-- User-generated js -->
        <script>
            try {

    $(function() {

    });

  } catch (error) {
    console.error("Your javascript has an error: " + error);
  }
        </script>
    </head>
    <body>
        <!-- Home -->
        <div data-role="page" id="page1">
            <div id="header" data-theme="a" data-role="header">
                <h3>
                    Dyno-Tourn
                </h3>
            </div>
                <div data-role="content">
        <form action="checklogin.php" method="POST" data-ajax="false">
            <div data-role="fieldcontain" id="myusername">
                <label for="myusername">
                    Username
                </label>
                <input name="myusername" id="myusername" placeholder="" value="" type="text">
            </div>
            <div data-role="fieldcontain" id="mypassword">
                <label for="mypassword">
                    Password
                </label>
                <input name="mypassword" id="mypassword" placeholder="" value="" type="text">
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
    </body>
</html>
