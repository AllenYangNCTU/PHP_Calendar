<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live calender</title>
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
            background: lightgreen;
        }
        .today {
            background: lightseagreen;
        }
    </style>
</head>
<body>
    <?php
    $month = 5;
    ?>
    <table>
        <tr>
            <td style="background-color: orange;">Sunday</td>
            <td style="background-color: orange;">Monday</td>
            <td style="background-color: orange;">Tuesday</td>
            <td style="background-color: orange;">Wednesday</td>
            <td style="background-color: orange;">Thursday</td>
            <td style="background-color: orange;">Friday</td>
            <td style="background-color: orange;">Saturday</td>
        </tr>
        <?php
        $firstDay = date("Y-") . $month . "-1";
        $firstWeekday = date("w", strtotime($firstDay));
        $monthDays = date("t", strtotime($firstDay));
        $lastDay = date("Y-") . $month . "-" . $monthDays;
        $today = date("Y-m-d");

        for ($i = 0; $i < 6; $i++) {
            print "<tr>";
            for ($j = 0; $j < 7; $j++) {
                $d = $i * 7 + ($j + 1) - $firstWeekday - 1;
                if ($d >= 0 && $d < $monthDays) {
                    $fs = strtotime($firstDay);
                    $shiftd = strtotime("+$d days", $fs);
                    $date = date("d", $shiftd);
                    $w = date("w", $shiftd);
                    $chktoday = "";
                    if (date("Y-m-d", $shiftd) == $today)  $chktoday = 'today';
                    if ($w == 0 || $w == 6) print("<td class='weekend'> $chktoday");
                    else                    print("<td class='workday'> $chktoday");
                    print($date);
                    print("</td>");
                }
            }
            print("</tr>");
        }
        ?>
    </table>
</body>
</html>