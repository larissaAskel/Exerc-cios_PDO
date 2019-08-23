<!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8" />
<title></title>
</head> 

<body>
<?php
$dbhost = 'localhost'; 
$dbuser = 'aluno'; 
$dbpassword = 'aluno'; 
$dbname = 'atv_prt_043_2_bd';

$fabricante=$_POST['fabricante'];
$ano_fabricacao=$_POST['ano_fabricacao'];
$quilometragem=$_POST['quilometragem'];

try {
    $conx= new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $query ="INSERT INTO autos (fabricante, ano_fabricacao, quilometragem) values ('$fabricante', '$ano_fabricacao', '$quilometragem')";
    $conx->exec($query);
    $number_regs = $consulta->rowCount();
    ?><p>Número de Registros : <?php echo $number_regs; ?></p><?php
    $conx= null;}
    catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
    }
?>
</body>
</html>
