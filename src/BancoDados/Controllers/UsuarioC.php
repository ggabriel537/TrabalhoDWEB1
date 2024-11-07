<?php
require_once 'src/BancoDados/Models/UsuarioM.php';
require_once 'src/Entidades/Usuario.php';

class UsuarioC
{
    private $usuariom;

    public function __construct($db)
    {
        $this->usuariom = new UsuarioM($db);
    }

    public function listarUsuarios()
    {
        $usuarios = $this->usuariom->retornarUsuarios();
        echo json_encode($usuarios);
    }

    public function criar()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->user) && isset($data->senha)) {
            try {
                $usuario = new Usuario($data->user, $data->senha);
                $this->usuariom->salvar($usuario);

                http_response_code(201);
                echo json_encode(["message" => "Usuário criado com sucesso."]);
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao criar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    public function listarUsuario($user)
    {
        if (isset($user)) {
            try {
                $usuario = $this->usuariom->retornarUsuario($user);
                if ($usuario) {
                    echo json_encode($usuario);
                } else {
                    http_response_code(404);
                    echo json_encode(["message" => "Usuário não encontrado."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao buscar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    public function atualizar($user)
    {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($user) && isset($data->user) && isset($data->senha)) {
            try {
                $usuario = new Usuario($data->user, $data->senha);
                $count = $this->usuariom->atualizar($usuario);
                if ($count > 0) {
                    http_response_code(200);
                    echo json_encode(["message" => "Usuário atualizado com sucesso."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "Erro ao atualizar o usuário."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao atualizar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    public function deletar($user)
    {
        if (isset($user)) {
            try {
                $count = $this->usuariom->deletar($user);
                if ($count > 0) {
                    http_response_code(200);
                    echo json_encode(["message" => "Usuário deletado com sucesso."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "Erro ao deletar o usuário."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao deletar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }
}
?>
