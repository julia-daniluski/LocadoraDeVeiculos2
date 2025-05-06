<?php 

// inluir o autoload do composer para carregar as classes automaticamente
require_once __DIR__ . '/../vendor/autoload.php';

// incluir o arquivo com as variaveis
require_once __DIR__ . '/../config/config.php';

session_start();

//importar classes
use Services\{Locadora, Auth};

// importar as classes carro e moto
use Models\{Carro, Moto};

// Verificar se o usuário está logado
if(!Auth::verificarLogin()){
    header('Location: login.php');
    exit;
}

//opção logout
if(isset($_GET['logout'])){
    (new Auth())->logout();
    header('Location:login.php');
    exit;
}

// Criar uma instância da classe locadora
$locadora = new Locadora();

$mensagem = '';

$usuario = Auth::getUsuarios();

// verifica o formulário via POST
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // verifica se ta lo login usuario ou adm
        if(isset($_POST['adicionar']) || ($_POST['deletar']) || ($_POST['alugar']) ||($_POST['devolver'])){
            if(!Auth::isAdmin()){
                $mensagem = "Você não tem permissão para realizar essa ação.";
                goto renderizar;

            }
        }
        if(isset($_POST['adicionar'])){
            $modelo = $_POST['modelo'];
            $placa = $_POST['placa'];
            $tipo = $_POST['tipo'];

            $veiculo = ($tipo == 'Carro') ? new Carro($modelo, $placa) : new Moto ($modelo, $placa);
            $locadora->adicionarVeiculo($veiculo);

            $mensagem = "Veiculo adicionado com sucesso";
        }

        elseif(isset($_POST['alugar'])){
          $dias = isset($_POST['dias']) ? (int)$_POST['dias'] : 1; 
          $mensagem = $locadora->alugarVeiculo($_POST['modelo'], $dias); 
        }
        elseif(isset($_POST['devolver'])){
           $mensagem = $locadora->devolverVeiculo($_POST['modelo']); 
        }
        elseif(isset($_POST['deletar'])){
            $mensagem = $locadora->revomerVeiculo($_POST['placa']); 
        }
        elseif(isset($_POST['calcular'])){
            $dias = (int)$_POST['dias_calculo'] : 1; 
            $tipo = $_POST['dias_calculo'];
            $valor = $locadora->calcularPrevisaoAluguel($dias, $tipo);
            $mensagem = "Previsão de valor para {$dias} dias: R$" . number_format($valor, 2,',', '.'); 
        }

    }

    renderizar:
    require_once __DIR__ . '/../views/template.php';
?>