<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador Banco</title>
</head>
<body>
    <pre>
        <?php
        require_once 'ContaBanco.php';

        $pessoa1 = new ContaBanco();
        $pessoa2 = new ContaBanco();

        $pessoa1->abrirConta("CC");
        $pessoa1->setDono("Jubileu");
        $pessoa1->setNumeroConta(1111);
        $pessoa1->depositar(300);
        $pessoa1->pagarMensalidade();
        $pessoa1->sacar(50);
        echo '-----------------------------------------------------';
        $pessoa2->abrirConta("CP");
        $pessoa2->setDono("Creuza");
        $pessoa2->setNumeroConta(2222);
        $pessoa2->depositar(500);
        $pessoa2->pagarMensalidade();
        $pessoa2->sacar(100);
        echo '-----------------------------------------------------</br>';

        print_r($pessoa1);
        print_r($pessoa2);
        ?>
    </pre>
</body>
</html>