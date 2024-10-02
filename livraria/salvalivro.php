<?php

// conexao
$servidor = 'localhost';
$banco = 'livraria';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['nome'];
echo "<br>";
echo $_GET['idioma'];
echo "<br>";
echo $_GET['paginas'];
echo "<br>";
echo $_GET['editora'];
echo "<br>";
echo $_GET['data'];
echo "<br>";
echo $_GET['isbn'];

$codigoSQL = "INSERT INTO `livro` (`id`, `nome`, `idioma`, `paginas`, `editora`, `data`, `isbn`) VALUES (NULL, :nm, :idi, :pag, :edi, :data, :isbn)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'idi' => $_GET['idioma'], 'pag' => $_GET['paginas'], 'edi' => $_GET['editora'], 'data' => $_GET['data'], 'isbn' => $_GET['isbn']));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>