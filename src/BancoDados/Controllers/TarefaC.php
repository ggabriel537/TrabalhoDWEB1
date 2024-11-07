<?php
require_once 'src/BancoDados/Models/TarefaM.php';
require_once 'src/Entidades/Tarefa.php';

class TarefaC
{
    private $tarefam;

    public function __construct($db)
    {
        $this->tarefam = new TarefaM($db);
    }

    public function listarTarefas()
    {
        $tarefas = $this->tarefam->retornarTarefas();
        echo json_encode($tarefas);
    }

    public function criar()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->nome) && isset($data->user_id) && isset($data->descricao) && isset($data->prazo) && isset($data->notificar)) {
            try {
                $tarefa = new Tarefa(null, $data->nome, $data->user_id, $data->descricao, $data->prazo, $data->notificar);
                $this->tarefam->salvar($tarefa);

                http_response_code(201);
                echo json_encode(["message" => "Tarefa criada com sucesso."]);
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao criar a tarefa."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    public function listarTarefa($id)
    {
        if (isset($id)) {
            try {
                $tarefa = $this->tarefam->retornarTarefa($id);
                if ($tarefa) {
                    echo json_encode($tarefa);
                } else {
                    http_response_code(404);
                    echo json_encode(["message" => "Tarefa não encontrada."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao buscar a tarefa."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    public function atualizar($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($id) && isset($data->nome) && isset($data->user_id) && isset($data->descricao) && isset($data->prazo) && isset($data->notificar)) {
            try {
                $tarefa = new Tarefa($id, $data->nome, $data->user_id, $data->descricao, $data->prazo, $data->notificar);
                $count = $this->tarefam->atualizar($tarefa);
                if ($count > 0) {
                    http_response_code(200);
                    echo json_encode(["message" => "Tarefa atualizada com sucesso."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "Erro ao atualizar a tarefa."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao atualizar a tarefa."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    public function deletar($id)
    {
        if (isset($id)) {
            try {
                $count = $this->tarefam->deletar($id);
                if ($count > 0) {
                    http_response_code(200);
                    echo json_encode(["message" => "Tarefa deletada com sucesso."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "Erro ao deletar a tarefa."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao deletar a tarefa."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }
}
?>
