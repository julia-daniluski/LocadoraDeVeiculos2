# Funcionamento do sistema de locadora de veículos com PHP e Bootstrap

Este documento descreve o funcionamento do sistema de locadora de veículos desenvolvido em PHP, utilizando o bootstrap para interface, com autenticação de usuários, gerenciamento de veículos e persistência de dados em arquivos JSON. O foco principal é explicar o funcionamento geral do sistema,, com ênfase especial nos perfis de acesso (adm e usuário). 

## 1: visão geral do sistema

O sistema de locadora de veículos é uma aplicação web que permite:

- Autenticação de usuário com dois perfis: **adm** (administrador) e **usuário**;
- Gerenciamento de veículos: cadastro, aluguel, devolução e exclusão;
- Calculo de previsão de aluguel: com base no tipo de veículo (carro, moto ou helicoptero) e número de dias;
- Interface responsiva.

Os dados são armazenados em dois arquivos JSON: 

- `usuarios.json`: username, senha criptografada e perfil.
- `veiculos.json`: tipo, modelo, placa e status.