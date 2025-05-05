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

        <?= if($mensagem)?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">

        </div>


</body>