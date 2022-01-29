<?php
$connect = new PDO("mysql:host=localhost; dbname=testing", "root", "");

$query = "
SELECT country_name FROM apps_countries 
ORDER BY country_name ASC
";

$result = $connect->query($query);

$data = array();

foreach($result as $row)
{
    $data[] = array(
        'label'     =>  $row["country_name"],
        'value'     =>  $row["country_name"]
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/JavaScript-autoComplete/1.0.4/auto-complete.min.js"></script> -->
    <!-- https://www.webslesson.info/2022/01/typeahead-autocomplete-textbox-using-javascript-in-php-for-bootstrap-5.html -->
    <script src="autocomplete.js"></script>

    <title>Typeahead Autocomplete</title>
</head>
<body>
<div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-6">
        <input style="margin-top: 30px;" type="text" name="country_name" id="country_name" class="form-control form-control-lg" placeholder="Country Name" />
    </div>
    <div class="col-md-3">&nbsp;</div>
</div>

<script>

// $(document).ready(function(){
    var auto_complete = new Autocomplete(document.getElementById('country_name'), {
        data:<?php echo json_encode($data); ?>,
        maximumItems:10,
        highlightTyped:true,
        highlightClass : 'fw-bold text-primary'
    }); 
// });

</script>

</body>
</html>