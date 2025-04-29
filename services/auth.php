<?php
// define espaço para a organização do código
namespace services;
class Auth{
    private array $usuarios = [];

    // Método construtor
    public function __construct(){
        $this->carregarUsuarios();
    }
    // metodo para carregar usuarios do arquivo json
    private function carregarUsuarios(): void{
        // verificar se existe o arquivo
        if(file_exists(ARQUIVO_USUARIOS)){
            // Le o conteufo e decodifics o json para o array
            $conteudo = json_decode(file_get_contents(ARQUIVO_USUARIOS),true);

            // verificar se é um array
            $this->usuarios = is_array($conteudo) ? $conteudo : [];
        }

        else {
            $this -> usuarios =[
                ['username' => 'adm',
                 'password' => password_hash('adm123', PASSWORD_DEFAULT),
                 'perfil' => 'adm'],
            [   'username' => 'usuario',
                'password' => password_hash('usuario123', PASSWORD_DEFAULT),
                'perfil' => 'usuario']
            ];
            $this ->salvarUsuarios();
        }
    }

    // função para salvar usuarios no arquivo json
    private function salvarUsuarios(): void {
        $dir = dirname (ARQUIVO_USUARIOS);

        if(!is_dir($dir)){
            mkdir($dir, 0777, true);
        }

        file_put_contents(ARQUIVO_USUARIOS, json_encode($this->usuarios, JSON_PRETTY_PRINT));
    }

    // metodo para realizar login
    public function login (string $username, string $password):bool{
        foreach ($this ->usuarios as $usuario){
            if ($usuario ['username'] === $username &&password_verify($password, $usuario['password'])){
                
            }
        }
    }
}
?>