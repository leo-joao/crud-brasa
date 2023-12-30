<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MensagensModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;

class Mensagens extends BaseController
{
    public function novamensagem()
    {
        $teacherModel = new TeacherModel();
        $teachers = $teacherModel->findAll();

        $data['teachers'] = $teachers;

        echo view('templates/headerMessage', $data);
        echo view('formMessage', $data);
    }

    public function gravaMensagem()
    {
        $data = $this->request->getVar();

        $studentName = $data['name'];
        $teacherId = $data['teacher'];
        $mensagem = $data['content'];

        $mensagensModel = new MensagensModel();
        $alunosModel = new StudentModel();

        $data = [
            'name' => $studentName
        ];

        $alunosModel->insert($data);
        $alunoId = $alunosModel->insertID();

        $dataMensagem = [
            'content' => "$mensagem",
            'sender' => $alunoId,
            'receiver' => $teacherId,
        ];

        if ($mensagensModel->insert($dataMensagem)) {
            session()->setFlashdata('success', 'Mensagem enviada com sucesso, aguarde o retorno do professor.');
        } else {
            session()->setFlashdata('error', 'Erro ao enviar mensagem.');
        }

        return redirect()->to('newmsg');
    }

    public function listar()
    {

        $session = session();

        $loginData = $session->get();

        if (!isset($loginData['isLogged'])) {
            return redirect()->to('/');
        } else {
            $userId = $loginData['id'];
        }

        $mensagensModel = new MensagensModel();
        $mensagens = $mensagensModel->where('receiver', $userId)->findAll();

        $alunosModel = new StudentModel();
        $alunos = $alunosModel->findAll();

        $teacherModel = new TeacherModel();
        $teachers = $teacherModel->findAll();

        $data['mensagens'] = $mensagens;
        $data['alunos'] = $alunos;
        $data['teachers'] = $teachers;

        echo view('templates/header', $data);
        echo view('mensagens/listar', $data);
        echo view('templates/footer', $data);
    }

    public function responder()
    {

        if ($this->request->isAJAX()) {
            $idMensagem = $this->request->getPost('idMensagem');
            $teacherAnswer = $this->request->getPost('teacher_answer');

            $mensagensModel = new MensagensModel();

            $data = [
                'teacher_answer' => "$teacherAnswer"
            ];

            $response = [
                'status' => 'success',
                'teacher_answer' => $teacherAnswer,
            ];

            try {
                $mensagensModel->update(['id' => $idMensagem], $data);
            } catch (\Exception $e) {
                die('Erro ao atualizar: ' . $e->getMessage());
            }

            return $this->response->setJSON($response);
        } else {
            return redirect()->to('mensagens');
        }
    }

    public function deletar($id)
    {
        $mensagemModel = new MensagensModel();

        $mensagemModel->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Mensagem deletada com sucesso!');

        return redirect()->to('mensagens');
    }

    public function logout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to('/');
    }
}
