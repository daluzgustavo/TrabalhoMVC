<?php

namespace Model;

use Model\VO\AlunosVO;

final class AlunosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM alunos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new AlunosVO($row["id"], $row["nome"], $row['dataNasc'], $row['curso'], $row['matricula'], $row['cpf']);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM alunos WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new AlunosVO($data[0]["id"], $data[0]["nome"], $data[0]['dataNasc'], $data[0]['curso'], $data[0]['matricula'], $data[0]['cpf']);
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO alunos (nome, matricula, dataNasc, curso, cpf) VALUES (:nome, :matricula, :dataNasc, :curso, :cpf)";
        $binds = [
            'nome' => $vo->getNome(),
            'matricula' => $vo->getMatricula()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();
        $query = 'UPDATE alunos SET nome = :nome, matricula = :matricula WHERE id = :id';
        $binds = [
            'nome' => $vo->getNome(),
            'matricula' => $vo->getMatricula(),
            'id' => $vo->getId()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = 'DELETE FROM alunos WHERE id = :id';
        $binds = ['id' => $vo->getId()];

        return $db->execute($query, $binds);
    }
}