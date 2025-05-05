<?php
    require_once __DIR__ .'/../services/Auth.php';
    use Services\Auth;

    $usuario = Auth::getUsuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        .action-wrapper{
    display: flex;
    align-items: center;
    gap: 0.5rem;
    justify-content: flex-start;
}

.btn-group-actions{
    display:flex;
    gap: 0.5rem;
    align-items: center;
}

.rent-group{
    display: flex;
    align-items: center;
    gap: 0.5rem;
    order: 2;
}
.delete-btn{
    order: 1;
}

.days-input{
    width: 60px !important;
    padding: 0.25rem 0.5rem;
    text-align: center;
}

#quadroDetalhes-1,
#quadroDetalhes-2,
#quadroDetalhes-3,
#quadroDetalhes-4,
#quadroDetalhes-5,
#quadroDetalhes-6 {
    display: none; /* O quadro começa escondido */
  }
  
  /* Classe que será adicionada para mostrar o quadro */
  #quadroDetalhes.mostrar {
    display: block;
  }
  
  .escondido {
    display: none;
  }
  


@media (max-width: 768px){
    .action-wrapper{
        flex-direction: column;
        align-items: stretch;
    }

    .btn-group-actions{
        flex-direction: column;
    }

    .rent-group{
        order: 1;
        width: 100%;
    }
    .delete-btn{
        order: 2;
        width: 100%;
    }
    .days-input{
        width: 100% !important;
    }

    .escondido {
        display: none;
      }
}
    </style>

    <title>Locadora de veículos</title>
</head>

<!--usuario-->
<body class="container py-4">
    <div class="container py-4">
        <!-- Barra de informações de usuario -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between alien-items-center inicio">
                    <h1>Sistema de Locadora de veículos</h1>
                    <div class="d-flex align-items-center gap-3 user-info mx-3">
                        <span class="user-icon">
                            <i class="bi bi-person" style="font-size: 24px;"></i>
                        </span>

                        <!-- Bem vindo usuario automatico -->
                        <span class="welcome-text">
                            Bem-vindo, <strong><?= htmlspecialchars($usuario['username']) ?></strong>
                        </span>

                        <!-- botão de logout validando logout -->
                        <a href="?logout=1" class="btn btn-outline-danger d-flex align-items-center gap-1"><i class="bi bi-box-arrow-in-right"></i>Sair</a>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php if($mensagem)?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($mensagem) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label=""close></button>
        </div>
        <?php endif; ?>


        <!-- Formulário para adicionar novos veiculos -->
        <div class="row same-height-row">
            <?php if (Auth::isAdmin()):?>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h4>Adicionar novo veículo</h4>
                    </div>
                    <div class="card-body">
                        <form action="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo:</label>
                                <input type="text" class="form-control" name="modelo" required>
                                <div class="invalid-feedback">
                                    Informe um modelo válido"
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa:</label>
                                <input type="text" class="form-control" name="placa" required>
                                <div class="invalid-feedback">
                                    Informe uma placa válida
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo:</label>
                                <select name="tipo" class="form-select" id="tipo" required>
                                    <option value="">Carro</option>
                                    <option value="">Moto</option>
                                    <option value="">Helicoptero</option>
                                </select>
                            </div>
                            <button class="btn btn-primary w-100" type="submit" name="adicionar">Adicionar veículo</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Formulário para calculo de aluguel -->
            <div class="col-<?php Auth::isAdmin()'md-6':'12'?>">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="mb-0">
                            Calcular a previsão de aluguel
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="" class="input-label">Tipo de veículo:</label>
                                <select class="form-select" name="" id="" required>
                                    <option value="carro">Carro</option>
                                    <option value="moto">Moto</option>
                                    <option value="helicoptero">Helicoptero</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="quantidade" class="form-label">Quantidade de dias</label>
                                <input type="number" name="quantidade" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="calcular">Calcular</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>