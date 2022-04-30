<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar</title>
    <style>
        .table {
            width: 560px;
            height: 560px;
            display: flex;
            flex-wrap: wrap;
            align-content: baseline;
            margin-left: 1px;
            margin-top: 1px;
        }

        .table div {
            display: inline-block;
            width: 80px;
            height: 80px;
            border: 1px solid #999;
            box-sizing: border-box;
            margin-left: -1px;
            margin-top: -1px;
        }

        .table div.header {
            background: black;
            color: white;
            height: 32px;
            ;
        }

        .weekend {
            background: pink;
        }

        .workday {
            background: lightblue;
        }

        .today {
            background: lightseagreen;
        }
        .othermonth{
            background: lightgreen;
        }
    </style>
</head>

<body>
    <h1>Method : flex</h1>
    <?php
    $month = 6;

    $firstDay = date("Y-") . $month . "-1";
    $firstWeekday = date("w", strtotime($firstDay));
    $monthDays = date("t", strtotime($firstDay));
    $lastDay = date("Y-") . $month . "-" . $monthDays;
    $today = date("Y-m-d");
    $lastWeekday = date("w", strtotime($lastDay));
    $dateArray = [];

    for ($i = 0; $i < $firstWeekday; $i++) {
        $dateArray[] = "";
    }

    for ($i = 0; $i < $monthDays; $i++) {
        $date = date("Y-m-d", strtotime("+$i days", strtotime($firstDay)));
        $dateArray[] = $date;
    }

    for ($i = 0; $i < (6 - $lastWeekday); $i++) {
        $dateArray[] = "";
    }
    ?>

    <div class="table">
        <div class='header'>Sun</div>
        <div class='header'>Mon</div>
        <div class='header'>Tue</div>
        <div class='header'>Wed</div>
        <div class='header'>Thur</div>
        <div class='header'>Fri</div>
        <div class='header'>Sat</div>
        <?php
        foreach ($dateArray as $k => $day) {
            $holiday = ($k % 7 == 0 || $k % 7 == 6) ? 'weekend' : "workday";
            if (!empty($day)) {
                $dayFormat = date("j", strtotime($day));
                echo "<div class='{$holiday}'>{$dayFormat}</div>";
            } else {
                echo "<div class='othermonth'></div>";
            }
        }

        ?>
    </div>



</body>

</html>