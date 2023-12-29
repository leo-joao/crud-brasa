<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\SubjectModel;
use App\Models\TeacherModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function registration()
    {
        $subjectsModel = new SubjectModel();
        $subjects = $subjectsModel->findAll();

        $data['subjects'] = $subjects;

        echo view('templates/headerRegister');
        echo view('formRegister', $data);
    }

    public function authentication()
    {

        $session = \Config\Services::session();

        $teacherModel = new TeacherModel();

        $login = $this->request->getVar('login');
        $pass = $this->request->getVar('pass');

        $user = $teacherModel->where('login', $login)->first();

        if (is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Usuário ou senha inválido. Tente novamente');
        }

        $passVerify = password_verify($pass, $user['pass']);

        if (!$passVerify) {
            return redirect()->back()->withInput()->with('error', 'Usuário ou senha inválido. Tente novamente');
        }

        $sessionData = [
            'login' => $user['login'],
            'id' => $user['id'],
            'isLogged' => TRUE
        ];

        $session->set($sessionData);
        return redirect()->to('mensagens');
    }

    public function register()
    {
        $data = $this->request->getVar();

        $subjectId = $data['subject'];

        $candidateModel = new CandidateModel();

        $data['subject'] = $subjectId;

        if ($candidateModel->insert($data)) {
            session()->setFlashdata('success', 'Cadastro realizado com sucesso aguarde o nosso contato.');
        } else {
            session()->setFlashdata('error', 'Erro ao cadastrar. Por favor, tente novamente.');
        }

        return redirect()->to('registration');
    }
}
