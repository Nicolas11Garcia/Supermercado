<?php
include('../../php/class/Dao.php');
$dao = new DAO();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">

    <style>
        .flex-fechas{
            width: 590px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>


    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Visualizar ventas</h2>

    <div class="flex-fechas"style="margin-bottom: 30px;">

        <?php
          date_default_timezone_set("America/Santiago");
          $fecha_desde_print = date("d-m-Y 00:00:00"); //PARA QUE EL USUARIO VEA MEJOR
          $fecha_hasta_print = date("d-m-Y 23:59:59");

          $fecha_desde = date("Y-m-d 00:00:00");
          $fecha_hasta = date("Y-m-d 23:59:59"); //LO QUE NECESITAMOS PARA HACER EL SELECT FROM

        ?>
        <label class="label-input">Fecha desde: <span class="span-plomo"><?php echo $fecha_desde_print;?></span></label>
        <label class="label-input">Fecha hasta: <span class="span-plomo"><?php echo $fecha_hasta_print;?></span></label>
    </div>

    <div class="total-contenedor">

        <?php

          $ver_lo_vendido = $dao->verLoVendido($fecha_desde,$fecha_hasta);
          $total_general = 0;

          foreach ($ver_lo_vendido as $k) {
            $total_general = $k->getTotal() + $total_general;
          }
        ?>
        <p>Total: $<?php echo number_format($total_general, 0, ',', '.')  ?></p>
    </div>

    <div id="chartdiv">

    </div>

    <div style="height:40px">

    </div>
















<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX: true
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

xRenderer.grid.template.setAll({
  location: 1
})

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "country",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {
    strokeOpacity: 0.1
  })
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "country",
  tooltip: am5.Tooltip.new(root, {
    labelText: "{valueY}"

  })
}));

series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
series.columns.template.adapters.add("fill", function(fill, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", function(stroke, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

// Set data
var data = [

  <?php
  foreach ($ver_lo_vendido as $k) {
    $solo_hora = explode(" ",$k->getFecha());
    echo '{country: "Boleta: '.$k->getNumeroBoleta().' '.$solo_hora[1].'",
      value: '.$k->getTotal().'},';
  }
  ?>
];

xAxis.data.setAll(data);
series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
</script>

</body>
</html>