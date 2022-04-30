<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table td {
            padding: 5px;
            text-align: center;
            border: 1px solid #aaa;
        }

        .weekend {
            background: pink;
        }

        .workday {
            background: white;
        }

        .today {
            background: lightseagreen;
        }
    </style>
</head>

<body>
    <h1>Method : Array</h1>
    <?php
    $month = 2;

    ?>
    <table>
        <tr>
            <td>Sun</td>
            <td>Mon</td>
            <td>Tue</td>
            <td>Wed</td>
            <td>Thur</td>
            <td>Fri</td>
            <td>Sat</td>
        </tr>
        <?php

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

        print("<pre>");
        print_r($dateArray);
        print("</pre>");

        foreach ($dateArray as $key => $day) {

            if ($key % 7 == 0) {
                print("<tr>");
            }

            if (!empty($day)) {
                $dayFormat = date("d", strtotime($day));
            } else {
                $dayFormat = "";
            } 
            print "<td>{$dayFormat}</td>";
            if ($key % 7 == 6) {
                print("</tr>");
            }
        }
        ?>
    </table>
    <hr>
     <table>
        <tr>
            <td>Sun</td>
            <td>Mon</td>
            <td>Tue</td>
            <td>Wed</td>
            <td>Thur</td>
            <td>Fri</td>
            <td>Sat</td>
        </tr>
        <?php

        for ($i = 0; $i < 6; $i++) {
            print("<tr>");

            for ($j = 0; $j < 7; $j++) {
                $d = $i * 7 + ($j + 1) - $firstWeekday - 1;

                if ($d >= 0 && $d < $monthDays) {
                    $fs = strtotime($firstDay);
                    $shiftd = strtotime("+$d days", $fs);
                    $date = date("d", $shiftd);
                    $w = date("w", $shiftd);
                    $chktoday = "";
                    if (date("Y-m-d", $shiftd) == $today) {
                        $chktoday = 'today';
                    }
                    if ($w == 0 || $w == 6) {
                        print("<td class='weekend $chktoday' >");
                    } else {
                        print("<td class='workday $chktoday'>");
                    }
                    print($date);
                    print("</td>");
                } else {
                    print("<td></td>");
                }
            }
            print ("</tr>");
        }
        ?>
    </table>
</body>

</html>