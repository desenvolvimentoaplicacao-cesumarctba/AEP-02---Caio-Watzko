<?php

class pessoa
{
    //atributos da classe
    public $nome;
    public $dataNascimento;
    public $peso;
    public $altura;
    public $cpf;

    //método construtor
    public function __construct ($nome, $dataNascimento, $peso, $altura, $cpf)
    {
        $this ->nome           = $nome;
        $this ->dataNascimento = $dataNascimento;
        $this ->peso           = $peso;
        $this ->altura         = $altura;
        $this ->cpf            = $cpf;
    }

    //métodos da classe
    public function validaCPF($cpf)
    {
        //substitui o que não seja número
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        //verifica se o cpf tem apenas 11 números
        if (strlen($cpf) != 11)
        {
            echo 'CPF invalido, digite novamente ' . PHP_EOL;
            $cpf = 0;
        }

        //verifica se os numeros sao repetidos, por exemplo 555.555.555-55
        if (preg_match('/(\d)\1{10}/', $cpf))
        {
            echo 'CPF invalido, digite novamente ' . PHP_EOL;
            $cpf = 0;
        }

        //calculo de verificação
        for ($x = 9; $x<10; $x++)
        {
            for ($y = 0, $z = 0; $z<$x; $z++)
            {
                $y += $cpf{$z} * (($x + 1) - $z);
            }

            $y = ((10 * $y) % 11) % 10;

            if ($cpf{$z} != $y)
            {
                echo 'CPF invalido, digite novamente ' . PHP_EOL;
                $cpf = 0;
            }
        }

        return $cpf;
    }

    public function calculaIMC($peso, $altura)
    {
        //faz o cálculo do IMC
        $imc = $altura * $altura;
        $imctot = $peso / $imc;
        $imc2 = number_format($imctot);


        if ($imc2 >=16 && $imc2 <=16.9){
            echo "seu peso é de $imc2 KG/M2" . PHP_EOL;
            echo 'Voce esta muito abaixo do peso, deve mudar de habitos';
        }else if ($imc2 >=17 && $imc2  <=18.4){
            echo "seu peso é de $imc2 KG/M2" . PHP_EOL;
            echo "Voce esta abaixo do peso, tente mudar de habitos";
        }else if ($imc2 >=18.5 && $imc2  <=24.9){
            echo "seu peso é de $imc2 KG/M2" . PHP_EOL;
            echo "Voce esta com o peso normal, continue assim";
        }else if ($imc2 >=25 && $imc2  <=29.9){
            echo "seu peso é de $imc2 KG/M2" . PHP_EOL;
            echo "Voce esta acima do peso, pense em mudar de habitos";
        }else if ($imc2 >=30 && $imc2  <=34.9){
            echo "seu peso é de $imc2 KG/M2" . PHP_EOL;
            echo 'Voce esta com obesidade grau I, deve mudar de habitos o quanto antes';
        } else if ($imc2 >=35 && $imc2  <=40){
            echo "seu peso é de $imc2 KG/M2" . PHP_EOL;
            echo 'Voce esta com obesidade guar II, deve mudar de habitos agora';
        }else if ($imc2 >40){
            echo "seu peso é de $imc2 KG/M2" . PHP_EOL;
            echo 'Voce esta com obesidade grau III, va ate um especialista';
        }
    }

    public function calculaIdade($dataNascimento)
    {
        $dataNascimento = readline('Digite sua data de nascimento: ');

        //separa a data em dia, mês e ano
        list ($dia, $mes, $ano) = explode('/', $dataNascimento);

        //pega o dia atual para o cálculo
        $diaAtual = mktime(0,0,0, date('m'), date('d'), date('y'));

        //faz o cálculo da idade
        $idade = floor((((($diaAtual - $dataNascimento)/60)/60)/24)/365.25);

        echo "Sua idade e de $idade" . PHP_EOL;
    }

}