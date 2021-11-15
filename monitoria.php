<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTutoria</title>
    <link rel="stylesheet" href="/assets/css/monitoria.css">
    <link href='lib/fullcalendar/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header>
        <?php
            include("includes/header.php")
        ?>
    </header>

    <div class="block">
        <div id='calendar'></div>
    </div>
    <footer>
        <?php
            include("includes/footer.php")
            ?>
    </footer>

    <script src='lib/fullcalendar/main.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
    
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        select: function(info) {
            alert('selected ' + info.startStr + ' to ' + info.endStr);
            calendar.addEvent({
                title: 'Monitoria',
                start: info.startStr,
                end: info.endStr,
                description: 'This is a cool event',
                allDay: false
            })
        },
        eventRender: function(info) {
            var tooltip = new Tooltip(info.el, {
            title: info.event.extendedProps.description,
            placement: 'top',
            trigger: 'hover',
            container: 'body'
            });
        }
    });

    calendar.render();
    });
    

    
    </script>
</body>

</html>