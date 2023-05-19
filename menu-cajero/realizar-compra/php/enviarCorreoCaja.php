<?php
  include('../../../php/class/Dao.php');
  session_start();
  $dao = new DAO();


//RECUPERAMOS LOS DATOS DE EL PROCESO DE COMPRA MEDIANTE AJAX
$correo= $_POST['correo'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$rut= $_POST['rut'];

$numero_boleta = $_SESSION["numero_boleta"];

$total = 0;


$lista_boletas = $dao->buscarBoletaID($numero_boleta);
foreach ($lista_boletas as $k) {
    $total = $k->getTotal();
}
$iva_porcentaje = 19;
$iva = $total * $iva_porcentaje / 100;

$sub_total = $total - $iva;



$destinatario = $correo; 
$asunto       = "Boleta Compra";
$cuerpo = '
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Boleta</title>';
$cuerpo .= ' 
<style>
.boleta {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
  }
  
  .encabezado {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .logo {
    max-width: 200px;
  }
  
  
  .datos-cliente {
    margin-bottom: 20px;
  }
  
  .productos {
    margin-bottom: 20px;
  }
  
  .total {
    text-align: right;
    margin-bottom: 20px;
  }
  
  .pie {
    text-align: center;
  }
  
  p {
    text-align: justify; /* alineación justificada para todo el párrafo */
  }
        
  span {
    float: right; /* para que el elemento <span> se muestre a la derecha */
  }
  
  hr{
    border: solid 1px;
    border-color: #83de4a;
  }

  .fondoVerde{
    color: white;
    background-color: #61d618;
    border-radius: 6px;
    margin-top: 10px;
    padding: 10px;
    line-height: 1.5; /* valor menor para reducir espacio entre líneas */
  
  }
  h3 {
    font-weight: normal;
  }
  
  .productos table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .productos th,
  .productos td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    text-align: center;
  
  }
  
  .productos th {
    background-color: #aceb84;
    font-weight: bold;
    text-align: center;
  }
  
  .recordatorio {
    margin-top: 20px;
    padding: 20px;
    border: 1px dotted black;
    border-radius: 6px;
  }
  
  .recordatorio h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }
  
  .recordatorio ul {
    list-style: disc;
    margin-left: 20px;
    
  }
  
  .recordatorio li {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
  }
  </style>
';

$cuerpo .= '
</head>
<body>
  <div class="boleta">
    <div class="encabezado">
      <img src="https://cdn.discordapp.com/attachments/722839515491860501/1107223823855652915/logo.jpg" alt="Logo Supermercado" class="logo">
      <div class="fondoVerde">
      <img src="https://cdn.discordapp.com/attachments/722839515491860501/1107431910554218567/mone.png"style="margin-top:5px;"  alt="Logo Supermercado" class="logo">
      <h1 style="margin-top:10px;"><b>Compraste en Supermercado KALA</b></h1>
      </div>
      <h3>Este correo es la confirmación de tu compra en Supermercado KALA.</h3>
    </div>
    
    <h2 class="borde-cliente">Numero de boleta: '.$numero_boleta.'</h2>
    <hr>
    <h2 class="borde-cliente">Detalles de la compra</h2>
    <hr>
    <div class="datos-cliente">
      <h3>Datos del cliente</h3>
      <p><label>Nombre</label> <span>'.$nombre.' '.$apellido.'</span></p>
      <p><label>RUT</label> <span>'.$rut.'</span></p>
      <p><label>Correo</label> <span>'.$correo.'</span></p>
    </div>
    <hr>

    <div class="productos">
  <h2>Productos</h2>
  <table>
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>';
    $productos_comprados_boleta = $dao->buscarDetalleSegunBoleta($numero_boleta);
    foreach($productos_comprados_boleta as $k){

      $cuerpo .='
      <tr>
      <td>'.$k->getTitulo().'</td>
      <td>'.$k->getCantidad().'</td>
      <td>$'.number_format($k->getPrecio(), 0, ',', '.').'</td>
      </tr> ';
    }
    $cuerpo.='
    </tbody>
  </table>
</div>
<hr>
<div class="total">
  <p><label>Subtotal:</label> <span><b>$'.number_format($sub_total, 0, ',', '.').'</b></span></p>
  <p><label>Iva:</label> <span><b>$'.number_format($iva, 0, ',', '.').'</b></span></p>
  <hr>
  <p><label>Total Pagado</label> <span><b>$'.number_format($total, 0, ',', '.').'</b></span></p>
  <br>
</div>

<div class="recordatorio">
  <h2>Recuerda lo siguiente sobre tu compra:</h2>
  <ul>
    <li>Debes presentar tu boleta o un documento que la acredite si deseas hacer el cambio total o parcial de los productos.</li>
    <li>Solo se aceptarán cambios y devoluciones de productos que incluyan sus elementos originales de embalaje, certificados de garantía, manuales de uso y accesorios.</li>
    <li>Para hacer cambios o devoluciones, consulta los Términos y condiciones de compras online KALA .</li>
  </ul>
</div>
<br>
<div class="pie">
      Compra confirmada. Gracias por tu compra.
    </div>
  </div>
</div>
</body>
</html>';


    
    
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: WebDeveloper\r\n"; 
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
    (mail($destinatario,$asunto,$cuerpo,$headers));

?>
