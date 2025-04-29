<?php
namespace Services;
use models\{Veiculos, Carro, Moto, Helicoptero};

// classe para gerenciar a locação
class Locadora{
    private array $veiculos = [];

    public function __construct(){
        $this->carregarVeiculos();
    }

    private function carregarVeiculos(): void{
        if (file_exists(ARQUIVO_JSON)){

            //decodifica o arquivo json
            $dados = json_decode(file_get_contents(ARQUIVO_JSON), true);
            foreach ($dados as $dado){

            // Verifica o tipo de veículo informado no array $dado
            if ($dado['tipo'] === 'Carro') {
                // Cria uma instância da classe Carro com o modelo e a placa fornecidos
                $veiculo = new Carro($dado['modelo'], $dado['placa']);
            
            } elseif ($dado['tipo'] === 'Moto') {
                // Cria uma instância da classe Moto com o modelo e a placa fornecidos
                $veiculo = new Moto($dado['modelo'], $dado['placa']);
            
            } elseif ($dado['tipo'] === 'Helicoptero') {
                // Cria uma instância da classe Helicoptero com o modelo e a placa fornecidos
                $veiculo = new Helicoptero($dado['modelo'], $dado['placa']);
            
            } else {
                // mensagem que não temos outro tipo de veiculo
                echo "Não disponível outros veiculos.";
            }

            $veiculo->setDisponivel($dado['disponivel']);

            $this->veiculos[] = $veiculo;
                }
            }
        }
    // salvar veiculos
    private function salvarVeiculos(): void {
        $dados = [];
    
        foreach ($this->veiculos as $veiculo) {
            $dados[] = [
                'tipo' => ($veiculo instanceof Carro) ? 'Carro' :
                          (($veiculo instanceof Moto) ? 'Moto' : 'Helicoptero'),
                'modelo' => $veiculo->getModelo(),
                'placa' => $veiculo->getPlaca(),
                'disponivel' => $veiculo->isDisponivel()
            ];

            $dir = dirname(ARQUIVO_JSON);

            if (!is_dir($dir)){
                mkdir($dir, 0777, true);
            }

            file_put_contents(ARQUIVO_JSON, json_encode($dados, JSON_PRETTY_PRINT));
        }
    }
    
    }


?>