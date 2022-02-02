<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTutoria</title>
    <?php include('../includes/head.php') ?>
</head>

<body style="background-color: initial">

    <header>
        <?php
		include("../includes/header.php");
        require "../includes/verifica.php";
        ?>
    </header>

    <div id="content" class="container text-center bg-light">
        <h2>Lista de Monitorias</h2>
        <hr>
        <div id="calendar"></div>
    </div>

    <footer>
        <?php
            include("../includes/scripts_footer.php")
        ?>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            $.ajax({
                'url': "/SistemaMonitoria/api/EventosMonitoria.php",
                'method': "GET",
                'contentType': 'application/json'
            }).done( function(data) {
                data = JSON.parse(data);
                
                eventosMonitoriaCalendario = [];
                data.forEach(eventoMonitoria => {
                    eventosMonitoriaCalendario.push({
                        title: eventoMonitoria.titulo,
                        start: eventoMonitoria.data + " " + eventoMonitoria.hora_inicio,
                        end: eventoMonitoria.data + " " + eventoMonitoria.hora_fim,
                    });
                });

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    headerToolbar: {
                        right: 'prev,next today',
                        center: '',
                    },
                    height: 'auto',
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
                    locale: 'pt-br',
                    events: eventosMonitoriaCalendario
                    // events: [
                    //     {
                    //         title  : 'Monitoria Prog',
                    //         start  : '2022-02-02'
                    //     },
                    //     {
                    //         title  : 'Monitoria Cálculo',
                    //         start  : '2022-02-02 14:30',
                    //         end    : '2022-02-04 10:30'
                    //     },
                    // ]
                });
                calendar.render();
            })
        });
    </script>

</body>


</html>