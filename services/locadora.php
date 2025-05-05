<?php
namespace Services;
use models\{Veiculos, Carro, Moto, Helicoptero, Veiculo};

class Locadora {
    private array $veiculos = [];

    public function __construct() {
        $this->carregarVeiculos();
    }

    private function carregarVeiculos(): void {
        if (file_exists(ARQUIVO_JSON)) {
            $dados = json_decode(file_get_contents(ARQUIVO_JSON), true);
            foreach ($dados as $dado) {
                if ($dado['tipo'] === 'Carro') {
                    $veiculo = new Carro($dado['modelo'], $dado['placa']);
                } elseif ($dado['tipo'] === 'Moto') {
                    $veiculo = new Moto($dado['modelo'], $dado['placa']);
                } elseif ($dado['tipo'] === 'Helicoptero') {
                    $veiculo = new Helicoptero($dado['modelo'], $dado['placa']);
                } else {
                    echo "Não disponível outros veiculos.";
                    continue;
                }

                $veiculo->setDisponivel($dado['disponivel']);
                $this->veiculos[] = $veiculo;
            }
        }
    }

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
        }

        $dir = dirname(ARQUIVO_JSON);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        file_put_contents(ARQUIVO_JSON, json_encode($dados, JSON_PRETTY_PRINT));
    }


    //adicionar veiculo
    public function adicionarVeiculo(Veiculo $veiculo): void {
        $this->veiculos[] = $veiculo;
        $this->salvarVeiculos();
    }

    // remover veiculo
    public function removerVeiculo(string $modelo, string $placa): string {
       foreach($this->veiculos as $key => $veiculo){
            // verifica se modelo e placa correspondem um ao outro
            if($veiculo->getModelo() === $modelo && $veiculo->getPlaca() === $placa){
                // remove o veiculo do array
                unset($this->veiculos[$key]);

                //reorganizar os indices mandando ele para ele mesmo
                $this->veiculos = array_values($this->veiculos);

                // salvar o novo estado do vetor
                $this->salvarVeiculos();
                return "Veículo '{}' removido com sucesso!";

                    }
                }

                return "Veiculo '{}' não foi removido ou não foi encontrado!";

            }

    // funçao alugar veiculo por x dias

    // funçao devolver veiculo

    // funçao retornar a lista de veiculos

    // funçao calcular previsao do valor
}
?>
