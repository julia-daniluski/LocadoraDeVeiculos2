<?php
    namespace Models;
    use interfaces\Locavel;

    // classe que representa um carro
    class Carro extends Veiculo implements locavel {
        public function calcularAluguel(int $dias):float {
            return $dias * DIARIA_CARRO;
        }
        public function alugar():string{
            if($this->disponivel){
                $this->disponivel = false;
                return "Carro '{$this->modelo}' alugado com sucesso!"; 
            }
            return "Carro '{$this->modelo} indisponível no momento, por favor escolha outro.'";
        }
        public function devolver():string{
            if(!$this->disponivel){ // exclamação é a lógica da negação
                $this->disponivel = true;
                return "Carro '{$this->modelo}' devolvido com sucesso!"; 
            }
            return "Carro '{$this->modelo} já disponível.'";
        }
    }
?>