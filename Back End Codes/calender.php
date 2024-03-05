<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Date Selection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
          body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url(bg.jpg);
            background-color: white;
            background-size: cover; /* Ensures the background image covers the entire container */
            background-position: center; /* Centers the background image */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h2 {
            color: #333;
        }
        #calendar-container {
            opacity:0.85;
            max-width: 400px;
            height: 250px; /* Adjusted height */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
            text-align: center;
        }
        #selectedDate {
            width: calc(100% - 20px);
            max-width: 300px;
            margin: 0 auto;
            padding: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
             margin-top: 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .datepicker {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 17em;
            padding: .5em .5em;
            margin-top: 1px;
            list-style: none;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: .25em;
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            background-clip: padding-box;
        }
        .datepicker.datepicker-dropdown.dropdown-menu {
            padding: 4px;
        }
    </style>
</head>
<body>

<div id="calendar-container">
    <h2>Select Date</h2>
    <form id="dateForm" action="info.php" method="post" class="text-center">
        <div class="form-group">
            <input type="text" id="selectedDate" name="selectedDate" class="form-control" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="/data.php">Show all Entries</a> <!-- Moved the anchor tag inside the calendar container -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
        $('#selectedDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: new Date(),
            todayHighlight: true
        }).datepicker("show");
    });
</script>

</body>
</html>
