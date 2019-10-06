<?php

//faz o chamado do arquivo da classe
require_once __DIR__ . "/classes/pessoa.php";

//cria o objeto pessoa
$pessoa = new pessoa('nome', 'dataNascimento', 'peso', 'altura', 'cpf');

$pessoa->nome           = readline('Digite o seu nome: ');
$pessoa->dataNascimento = readline('Digite sua data de nascimento: ');
$pessoa->peso           = readline('digite seu peso em KG: ');
$pessoa->altura         = readline('Digite sua altura em CM: ');

//laço de repetição para verificação do CPF
$loop = 0;
while ($loop = 0)
{
    $pessoa->cpf = readline('Digite o seu CPF: ');
    $pessoa->      validaCPF($cpf);
    
    if ($pessoa->cpf != 0)
    {
        $loop++;
    }
}

//opções dos cálculos de IMC e idade
$loop = 0;
while ($loop = 0)
{
    echo                'O que deseja fazer?' . PHP_EOL;
    echo                '1 - Calcular seu IMC' . PHP_EOL;
    $escolha = readline('2 - Calcular sua idade  ' . PHP_EOL);

    switch ($escolha)
    {
        case 1:
            $pessoa->calculaIMC($peso, $altura);
            echo                '1 - Realizar nova tarefa' . PHP_EOL;
            $escolha = readline('2 - Finalizar Programa' . PHP_EOL);

            if ($escolha = 1)
            {
                break;
            }else if ($escolha = 2){
                $loop++;
            }
        case 2:
            $pessoa->calculaIdade($dataNascimeno);
            echo                '1 - Realizar nova tarefa' . PHP_EOL;
            $escolha = readline('2 - Finalizar Programa' . PHP_EOL);

            if ($escolha = 1)
            {
                break;
            }else if ($escolha = 2){
                $loop++;
            }
        default:
            echo 'opcao inexistente, digite novamente' . PHP_EOL;
            break;
    }
}