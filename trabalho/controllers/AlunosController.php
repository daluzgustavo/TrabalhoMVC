<?php

namespace Controller;

use Model\AlunosModel;
use Model\VO\AlunosVO;

final class AlunosController extends Controller {

    public function list() {
        $model = new AlunosModel();
        $data = $model->selectAll(new AlunosVO());

        $this->loadView("listAlunos", [
            "alunos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new AlunosModel();
            $vo = new AlunosVO($id);
            $aluno = $model->selectOne($vo);
        } else {
            $aluno = new AlunosVO();
        }

        $this->loadView("formAlunos", [
            "alunos" => $alunos
        ]);
    }

    public function save() {
        $id = $_POST['id'];
        $vo = new AlunosVO($id, $_POST['nome'], $_POST['matricula']);
        $model = new AlunosModel();

        if(empty($id)){
            $result = $model->insert($vo);
        }else{
            $result = $model->update($vo);
        }
        
        $this->redirect('index.php');
    }

    public function remove() {
        $vo = new AlunosVO($_GET['id']);
        $model = new AlunosModel();
        $result = $model->delete($vo);

        $this->redirect('index.php');
    }

}
