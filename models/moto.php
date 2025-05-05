<?php
namespace Models;
// limita espaços o namespace
use Interfaces\Locavel;

// classe que representa as Motos

class Moto extends Veiculo implements Locavel {

    // cria a funçao de calcular aluguel / float = dinheiro
    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_MOTO;
        // VARIAVEL QUE RECEBEU $DIAS VEZES A DIARIA
    }

    // funçao de alugar
    public function alugar(): string {
        if ($this->disponivel){
            $this->disponivel = false;
            return "Moto '{$this->modelo}' alugada com sucesso!";
        }
        return "Moto '{$this->modelo}' nâo está disponivel.";
    }
    
    // funçao de devolver != para dizer que está negando 
    public function devolver(): string {
        if (!$this->disponivel){
            $this->disponivel = true;
            return "Moto '{$this->modelo}' devolvida com sucesso!";
        }
        return "Moto '{$this->modelo}' já está disponivel para alugar.";
    }	
}