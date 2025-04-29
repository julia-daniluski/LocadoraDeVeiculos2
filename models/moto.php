<?php
    namespace Models;
    use interfaces\Locavel;

    // classe que representa um carro
    class Moto extends Veiculo implements locavel {
        public function calcularAluguel(int $dias):float {
            return $dias * DIARIA_MOTO;
        }
        public function alugar():string{
            if($this->disponivel){
                $this->disponivel = false;
                return "Moto '{$this->modelo}' alugada com sucesso!"; 
            }
            return "Carro '{$this->modelo} indisponível no momento, por favor escolha outra.'";
        }
        public function devolver():string{
            if(!$this->disponivel){ // exclamação é a lógica da negação
                $this->disponivel = true;
                return "Moto '{$this->modelo}' devolvida com sucesso!"; 
            }
            return "Moto '{$this->modelo} já disponível.'";
        }
    }
?>