<?php
$json_str = json_encode(['result' => $transaction], JSON_PRETTY_PRINT);
$json_str = str_replace("\\", "", $json_str);
$json_str = substr($json_str, 1, strlen($json_str) - 2);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
</html>

<div class="container" style="margin-top: 2%">
    <?php
    require '../../vendor/autoload.php';

    session_start();
    ?>

    <h1>Payment Result</h1>

    <div class="row">
        <div class="col-12">
           <pre>
                <?php echo $json_str; ?>
            </pre>
        </div>
    </div>

    <button class="btn btn-primary center-block text-center"
            style="text-align: right;float: right; margin: 30px 0 30px 0"
            onclick="history.go(-1);">Back
    </button>
</div>
