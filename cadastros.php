<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;

    if (isset($dados['nome'])) {
        $arquivo = 'cadastro_idosos.csv';
        $cabecalho = ['Nome', 'Idade', 'Condições de Saúde'];

        $existe_arquivo = file_exists($arquivo);

        $file = fopen($arquivo, 'a');

        if (!$existe_arquivo) {
            fputcsv($file, $cabecalho);
        }

        fputcsv($file, [
            $dados['nome'],
            $dados['idade'],
            $dados['condicoes']
        ]);

        fclose($file);

        header("Location: index.html");
        exit();
    } elseif (isset($dados['nome-remedio'])) {
        $arquivo = 'cadastro_medicamentos.csv';
        $cabecalho = ['Nome do Remédio', 'Dosagem', 'Horário'];

        $existe_arquivo = file_exists($arquivo);

        $file = fopen($arquivo, 'a');

        if (!$existe_arquivo) {
            fputcsv($file, $cabecalho);
        }

        fputcsv($file, [
            $dados['nome-remedio'],
            $dados['dosagem'],
            $dados['horario']
        ]);

        fclose($file);

        header("Location: index.html");
        exit();
    }
}
?>
