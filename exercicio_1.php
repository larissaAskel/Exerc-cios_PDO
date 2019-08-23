<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8" />
        <title>Exibe as informações</title>
    </head>

<body>

<h1>Exibe as informações</h1>

<?php
//Parâmetros de conexão com BD
$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'atv_prt_041_3_db';

try {

    //Efetua a conexão com BD
    $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    
    //Cria a Query SQL
    $query = "SELECT membros.nome, membros.email,membros.id_escola, membros.funcao, escolas.estado, equipes.nome_equipe from membros, equipes, escolas where membros.numero_equipe = equipes.numero_equipe and membros.id_escola = escolas.id_escola";
    
    //Executa a Query
    $consulta = $conx->query($query);
    while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

        $table[] = $row;
        }
    ?>
        
        <table>
        <tr>
        <td><strong>Membro</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Email</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong></strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Escola</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Estado</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Função</strong></td>
        <td width="10">&nbsp;</td>
        <td><strong>Nome da equipe</strong></td>
<?php

//Verifica se há linhas para exibir
if ($table) {
//Recupera cada elemento da array
foreach($table as $d_row) {
?>

<tr>

<td><?php echo($d_row["nome"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["email"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["nome_escola"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["estado"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["funcao"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["nome_equipe"]); ?></td>


</tr>
<?php
}
}
?>
</table>
<?php
$number_regs = $consulta->rowCount();
?>
<p>Número de Registros : <?php echo $number_regs; ?></p>

<?php
//Fecha a conexão
$conx = null;
} catch (PDOException $e) {
echo "Conexão falhou: " . $e->getMessage();
}

?>
</body>
</html>
