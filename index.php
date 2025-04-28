<?php
//backend
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>ADM - Locadora de veículos</title>
</head>
<body class="container py-4">
    <div class="container py-4">
        <!-- Barra de informações de usuario -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between alien-items-center inicio">
                    <h1>Lista de Locadora de veículos</h1>
                    <div class="d-flex align-items-center gap-3 user-info mx-3">
                        <span class="user-icon">
                            <i class="bi bi-person" style="font-size: 24px;"></i>
                        </span>
                        <!-- Bem vindo,(usuario) -->
                        <span class="welcome-text">
                            Bem-vindo, <strong>Usuário</strong>
                        </span>
                        <!-- botão de logout -->
                        <a href="" class="btn btn-outline-danger d-flex align-items-center gap-1"><i class="bi bi-box-arrow-in-right"></i>Sair</a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
        </div>
    </div>

        <!-- Tabela de veiculos cadastrados-->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            Veículos cadastrados
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>Tipo</th>
                                    <th>Modelos</th>
                                    <th>Placa</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Carro</td>
                                        <td>
                                            <a class="btn" id="btnDetalhes-1"><strong>Uno</strong></a>
                                            <div id="quadroDetalhes-1" class="escondido">
                                                <p>O Fiat Uno é um carro supermini fabricado pela Fiat que foi produzido no Brasil de 1984 a 2021. O modelo é conhecido por ser econômico, versátil e robusto. Cor prata, está 14.000 km rodados. É o carro perfeito para você?</p>
                                            </div>
                                        </td>
                                        
                                        <td>ABC1D23</td>
                                        <td> <span class="badge bg-warning">Alugado</span></td>
                                                </form>
                                            </div>
</td>
                                    </tr>

                                    <tr>
                                        <td>Moto</td>
                                        <td><a class="btn" id="btnDetalhes-2"><strong>Biz 125i EX</strong></a>
                                            <div id="quadroDetalhes-2" class="escondido">
                                                <p>A Honda Biz 125i EX é a escolha ideal para quem busca praticidade, economia e design moderno em uma só moto. Combinando facilidade de pilotagem, economia de combustível e alta durabilidade, essa motocicleta é perfeita tanto para deslocamentos diários na cidade quanto para trajetos mais longos. Cor preta, 18.000km rodados.</p>
                                            </div></td>
                                        <td>GAY 8B12</td>
                                        <td> <span class="badge bg-success">Disponivel</span></td>

                                                </form>
                                            </div>
</td>
                                    </tr>

                                    <tr>
                                        <td>Helicoptero</td>
                                        <td><a class="btn" id="btnDetalhes-3"><strong>Robinson R44</strong></a>
                                            <div id="quadroDetalhes-3" class="escondido">
                                                <p>O Robinson R44 é um helicóptero leve de quatro lugares produzido pela Robinson Helicopter Company desde 1992. Na cor preta, é perfeito para aqueles que querem viajar em segurança.</p>
                                            </div></td>
                                        <td>PT-ZEN</td>
                                        <td> <span class="badge bg-warning">Alugado</span></td>
                                                </form>
                                            </div>
                                    </tr>

                                    <tr>
                                        <td>Carro</td>
                                        <td><a class="btn" id="btnDetalhes-4"><strong>Fiesta 2012</strong></a>
                                            <div id="quadroDetalhes-4" class="escondido">
                                                <p>O Ford Fiesta é um hatch compacto que marcou presença significativa no mercado brasileiro por mais de duas décadas, conquistando uma sólida base de consumidores graças à sua combinação de estilo, tecnologia e dirigibilidade. Na cor preta, é uma opção em conta para aqueles que querem viajar com um carro manual. 10.000km rodados.</p>
                                            </div></td>
                                        <td>TWC1H98</td>
                                        <td> <span class="badge bg-success">Disponivel</span></td>
      
    </div>
  </div>
</div>

                                                </form>
                                            </div>
</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
          <!-- Scripts -->
  <script src="script.js"></script>
</body>
</html>