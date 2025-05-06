<?php
require_once __DIR__ . '/../services/Auth.php';

use Services\Auth;

// session_start(); // Certifique-se de iniciar a sessão

$usuario = Auth::getUsuario(); // Obtém os dados do usuário logado

/**
 * Template principal do sistema de locadora de veículos
 * Recebe as variáveis $locadora, $mensagem e $usuario do controller (index.php)
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Locadora de Veículos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .action-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: flex-start;
        }
        .btn-group-actions {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        .rent-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            order: 2;
        }
        .delete-btn {
            order: 1;
        }
        .days-input {
            width: 60px !important;
            padding: 0.25rem 0.5rem;
            text-align: center;
        }
        @media (max-width: 768px) {
            .action-wrapper {
                flex-direction: column;
                align-items: stretch;
            }
            .btn-group-actions {
                flex-direction: column;
            }
            .rent-group {
                order: 1;
                width: 100%;
            }
            .delete-btn {
                order: 2;
                width: 100%;
            }
            .days-input {
                width: 100% !important;
            }
        }
        /* Estilos para a barra de usuário */
        .user-info {
            background-color: #000; /* Cor preta, como na imagem */
            padding: 0.5rem 1rem;
            border-radius: 4px;
            color: #fff; /* Texto branco */
        }
        .user-icon i {
            color: #fff; /* Ícone branco */
        }
        .welcome-text {
            margin-right: 1rem;
            font-size: 1rem;
        }
        .welcome-text strong {
            background-color: #fff; /* Fundo branco para o username, como na imagem */
            color: #000; /* Texto preto */
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-outline-danger {
            border-color: #fff; /* Borda branca para o botão Sair */
            color: #fff; /* Texto branco */
        }
        .btn-outline-danger:hover {
            background-color: #fff; /* Fundo branco ao passar o mouse */
            color: #dc3545; /* Cor do texto ao hover (vermelho Bootstrap danger) */
            border-color: #fff;
        }
    </style>
</head>
<body class="container py-4">
    <div class="container py-4">
        <!-- Barra superior com informações do usuário -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Sistema de Locadora de Veículos</h1>
                    <div class="d-flex align-items-center gap-3 user-info">
                        <!-- Ícone de usuário usando Bootstrap Icons -->
                        <span class="user-icon">
                            <i class="bi bi-person-circle" style="font-size: 24px;"></i>
                        </span>
                        <!-- Texto "Bem-vindo, [username]" -->
                        <span class="welcome-text">Bem-vindo, <strong><?= htmlspecialchars($usuario['username']) ?></strong></span>
                        <!-- Botão Sair com ícone usando Bootstrap Icons -->
                        <a href="?logout=1" class="btn btn-outline-danger d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-right"></i>
                            Sair
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($mensagem): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($mensagem) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <div class="row same-height-row">
            <?php if (Auth::isAdmin()): ?>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="mb-0">Adicionar Novo Veículo</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label class="form-label">Modelo</label>
                                <input type="text" name="modelo" class="form-control" required>
                                <div class="invalid-feedback">Informe um modelo válido.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Placa</label>
                                <input type="text" name="placa" class="form-control" required>
                                <div class="invalid-feedback">Informe uma placa válida.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <select name="tipo" class="form-select" required>
                                    <option value="Carro">Carro</option>
                                    <option value="Moto">Moto</option>
                                </select>
                            </div>
                            <button type="submit" name="adicionar" class="btn btn-primary w-100">Adicionar Veículo</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-<?= Auth::isAdmin() ? 'md-6' : '12' ?>">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="mb-0">Calcular Previsão de Aluguel</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label class="form-label">Tipo de Veículo</label>
                                <select name="tipo_calculo" class="form-select" required>
                                    <option value="Carro">Carro</option>
                                    <option value="Moto">Moto</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantidade de Dias</label>
                                <input type="number" name="dias_calculo" class="form-control" value="1" required>
                            </div>
                            <button type="submit" name="calcular" class="btn btn-info w-100">Calcular Previsão</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Veículos Cadastrados</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Modelo</th>
                                        <th>Placa</th>
                                        <th>Status</th>
                                        <?php if (Auth::isAdmin()): ?>
                                        <th>Ações</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($locadora->listarVeiculos() as $veiculo): ?>
                                    <tr>
                                        <td><?= $veiculo instanceof \Models\Carro ? 'Carro' : 'Moto' ?></td>
                                        <td><?= htmlspecialchars($veiculo->getModelo()) ?></td>
                                        <td><?= htmlspecialchars($veiculo->getPlaca()) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $veiculo->isDisponivel() ? 'success' : 'warning' ?>">
                                                <?= $veiculo->isDisponivel() ? 'Disponível' : 'Alugado' ?>
                                            </span>
                                        </td>
                                        <?php if (Auth::isAdmin()): ?>
                                        <td>
                                            <div class="action-wrapper">
                                                <form method="post" class="btn-group-actions">
                                                    <input type="hidden" name="modelo" value="<?= htmlspecialchars($veiculo->getModelo()) ?>">
                                                    <input type="hidden" name="placa" value="<?= htmlspecialchars($veiculo->getPlaca()) ?>">
                                                    
                                                    <!-- Botão Deletar (sempre disponível para admin) -->
                                                    <button type="submit" name="deletar" class="btn btn-danger btn-sm delete-btn">Deletar</button>
                                                    
                                                    <!-- Botões condicionais baseados no status do veículo -->
                                                    <div class="rent-group">
                                                        <?php if (!$veiculo->isDisponivel()): ?>
                                                            <!-- Veículo alugado: Botão Devolver -->
                                                            <button type="submit" name="devolver" class="btn btn-warning btn-sm">Devolver</button>
                                                        <?php else: ?>
                                                            <!-- Veículo disponível: Campo de dias e Botão Alugar -->
                                                            <input type="number" name="dias" class="form-control days-input" value="1" min="1" required>
                                                            <button type="submit" name="alugar" class="btn btn-primary btn-sm">Alugar</button>
                                                        <?php endif; ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>