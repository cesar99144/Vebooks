<?php

use App\Core\Controller;
use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;
use App\Auth;

class Venda extends Controller{

    //Gera o boleto com base nos dados da venda em questão
    public function gerarBoleto($valor){

        $sacado = new Agente('Vebooks', 'xxx.xxx.xxx-xx', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
        $cedente = new Agente($_SESSION['userNome'], 'xx.xxx.xxx/xxx-xx', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');

        $boleto = new BancoDoBrasil(array(
        // Parâmetros obrigatórios
        'dataVencimento' => new DateTime('23-12-2020'),
        'valor' => $valor,
        'sequencial' => 1234567, // Para gerar o nosso número
        'sacado' => $sacado,
        'cedente' => $cedente,
        'agencia' => 0000, // Até 4 dígitos
        'carteira' => 18,
        'conta' => 00000000, // Até 8 dígitos
        'convenio' => 1234, // 4, 6 ou 7 dígitos
        ));

       echo $boleto->getOutput();

    }

    public function FinalizarCompra($valor, $autor, $idLivro){

        //Armazena as informações da venda no banco

        $info = $this->model('Vendas');
        $info->setAutorLivro($autor);
        $info->setIdLivroo($idLivro);
        $info->setIdClientee($_SESSION['userNome']);
        $info->setValoor($valor);

        $vendasDao = $this->model('VendasDao');

        $vendasDao->cadastrarVenda($info);

        //Após gravar a venda no banco o método de gerar boleto é chamado para exibir o boleto da venda para o cliente
        $this->gerarBoleto($valor);

        


    }

    public function listarVendasAutor($autor){

        Auth::checkLogin();

        $vendas = $this->model('VendasDao');
        $dados = $vendas->listarVendas($autor);

        $this->view('vendas/painel', $dados);
    }

}