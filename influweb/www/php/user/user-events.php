<?php
require '../../../bd-conex.php';
include '../influencer-data.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $influName; ?> | Eventos</title>
    <link rel="stylesheet" href="../../css/products-sponsors.css">
    <link rel="stylesheet" href="../../css/idiomas.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- DEVEXTREME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/20.1.7/css/dx.common.css" />
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/20.1.7/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/20.1.7/js/dx.all.js"></script>
</head>

<body style="background-color: <?php echo $influBg; ?>; font-size: 1rem !important;">
    <?php include 'user-header.php'; ?>

    <main class="container my-4">
        <div class="container">

            <h3 class="title" data-section="eventos" data-value="titulo"> PRÓXIMOS EVENTOS </h3>
            <div id="scheduler"></div>

            <script>
                $(document).ready(function() {
                    $('#scheduler').dxScheduler({
                        dataSource: '../events-data.php',
                        views: ['day', 'week', 'month'],
                        currentView: 'month',
                        currentDate: new Date(),
                        startDayHour: 9,
                        endDayHour: 18,
                        height: 600,
                        timeZone: 'Europe/Madrid',
                        adaptiveLayoutEnabled: true,
                        adaptiveColumnWidth: true,
                        editing: {
                            allowAdding: false,
                            allowUpdating: false,
                            allowDeleting: false,
                            allowResizing: false,
                            allowDragging: false
                        },
                        views: [{
                            type: 'day',
                            name: 'Day',
                            intervalCount: 1,
                            startDateExpr: 'startDate',
                            endDateExpr: 'endDate'
                        }, {
                            type: 'week',
                            name: 'Week',
                            intervalCount: 1,
                            startDateExpr: 'startDate',
                            endDateExpr: 'endDate'
                        }, {
                            type: 'month',
                            name: 'Month',
                            intervalCount: 1,
                            startDateExpr: 'startDate',
                            endDateExpr: 'endDate'
                        }]
                    });
                });
            </script>
        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <span>&copy;
            <?php echo date('Y'); ?> - <?php echo $influName; ?>
        </span>
    </footer>

    <script src="../../js/language.js"></script>
</body>

</html>