<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de ventas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="grafico"></canvas>

    <?php
    // Valores iniciales
    $papas = 0;
    $salsa1 = 0;
    $salsa2 = 0;
    $salsa3 = 0;
    $salsa4 = 0;

    // Datos de ejemplo
    $ventas = array(
        'Papas Fritas' => $papas,
        'Salsa 1' => $salsa1,
        'Salsa 2' => $salsa2,
        'Salsa 3' => $salsa3,
        'Salsa 4' => $salsa4
    );

    // Actualizar las variables y el gráfico cuando se envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $papas = $_POST['papas'];
        $salsa1 = $_POST['salsa1'];
        $salsa2 = $_POST['salsa2'];
        $salsa3 = $_POST['salsa3'];
        $salsa4 = $_POST['salsa4'];

        $ventas['Papas Fritas'] = $papas;
        $ventas['Salsa 1'] = $salsa1;
        $ventas['Salsa 2'] = $salsa2;
        $ventas['Salsa 3'] = $salsa3;
        $ventas['Salsa 4'] = $salsa4;
    }
    ?>

    <form id="formulario" method="post">
        <label for="papas">Papas Fritas:</label>
        <input type="number" id="papas" name="papas" value="<?php echo $papas; ?>">
        <br>
        <label for="salsa1">Salsa 1:</label>
        <input type="number" id="salsa1" name="salsa1" value="<?php echo $salsa1; ?>">
        <br>
        <label for="salsa2">Salsa 2:</label>
        <input type="number" id="salsa2" name="salsa2" value="<?php echo $salsa2; ?>">
        <br>
        <label for="salsa3">Salsa 3:</label>
        <input type="number" id="salsa3" name="salsa3" value="<?php echo $salsa3; ?>">
        <br>
        <label for="salsa4">Salsa 4:</label>
        <input type="number" id="salsa4" name="salsa4" value="<?php echo $salsa4; ?>">
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <script>
    // Obtener el contexto del lienzo
    var ctx = document.getElementById('grafico').getContext('2d');

    // Crear el gráfico de barras inicial
    var grafico = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($ventas)); ?>,
            datasets: [{
                label: 'Ventas',
                data: <?php echo json_encode(array_values($ventas)); ?>,
                backgroundColor: 'rgba(0, 123, 255, 0.7)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Actualizar el gráfico y los datos cuando se envía el formulario
    document.getElementById('formulario').addEventListener('submit', function(e) {
        e.preventDefault(); // Evitar que el formulario se envíe

        // Obtener los nuevos valores de las variables
        var papas = parseInt(document.getElementById('papas').value);
        var salsa1 = parseInt(document.getElementById('salsa1').value);
        var salsa2 = parseInt(document.getElementById('salsa2').value);
        var salsa3 = parseInt(document.getElementById('salsa3').value);
        var salsa4 = parseInt(document.getElementById('salsa4').value);

        // Actualizar las variables
        <?php
        $papas = ' + papas + ';
        $salsa1 = ' + salsa1 + ';
        $salsa2 = ' + salsa2 + ';
        $salsa3 = ' + salsa3 + ';
        $salsa4 = ' + salsa4 + ';

        $ventas['Papas Fritas'] = $papas;
        $ventas['Salsa 1'] = $salsa1;
        $ventas['Salsa 2'] = $salsa2;
        $ventas['Salsa 3'] = $salsa3;
        $ventas['Salsa 4'] = $salsa4;
        ?>

        // Actualizar los datos del gráfico
        grafico.data.datasets[0].data = <?php echo json_encode(array_values($ventas)); ?>;
        grafico.update();
    });
</script>
</body>
</html>
