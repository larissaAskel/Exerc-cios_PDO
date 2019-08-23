<!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8" />
<title>Teste</title>
</head> 

<body>

<?php
$nome=$_POST['name'];
$idade=$_POST['age'];

$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'atv_prt_042_2_bd';

try {
    $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $query = "INSERT INTO teste1 (name, age) VALUES ('$nome', '$idade')";
    $conx->exec($query);
    echo "Registro inserido com sucesso";
    $conx = null;
    }
    catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
    }
?>
</body>
</html>
