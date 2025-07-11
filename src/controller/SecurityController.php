<?php

    namespace App\Controller;

    use App\Service\ClientService;

    class SecurityController extends \App\Core\Abstract\AbstractController
    {
        private ClientService $clientService;

        public function __construct()
        {
            parent::__construct();
            $this->clientService = \App\Core\App::getDependancy('clientService');
            $this->session = \App\Core\App::getDependancy('session');
            $this->layout = 'layouts/security.layout';
        }

        public function create(){
            $this->renderHtml('security/login');
        }

        public function show(){
            $this->renderHtml('security/inscription');
        }

        public function login(){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login = $_POST['login'] ?? '';
                $password = $_POST['password'] ?? '';

                \App\Core\ValidatorStatic::require('login', $login);
                \App\Core\ValidatorStatic::require('password', $password);

                if (!empty(\App\Core\ValidatorStatic::$errors)) {
                    $this->session->set('errors', \App\Core\ValidatorStatic::$errors);
                    header('Location: /');
                    exit;
                }

                $user = $this->clientService->seConnecter($login);

                if ($user && password_verify($password, $user->getPassword())) {
                    $this->session->set('user', $user->toArray());
                    header('Location: /acceuil');
                    exit;
                } else {
                    $this->session->set('errors', ['global' => 'Identifiant ou mot de passe incorrect.']);
                    header('Location: /');
                    exit;
                }
            }
            header('Location: /');
            exit;
        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'nom' => $_POST['nom'] ?? '',
                    'prenom' => $_POST['prenom'] ?? '',
                    'adresse' => $_POST['adresse'] ?? '',
                    'numeroTelephone' => $_POST['numeroTelephone'] ?? '',
                    'numeroIdentite' => $_POST['numeroIdentite'] ?? '',
                    'login' => $_POST['login'] ?? '',
                    'password' => $_POST['password'] ?? '',
                    'idTypeUtilisateur' => 1 // client
                ];

                \App\Core\ValidatorStatic::require('nom', $data['nom']);
                \App\Core\ValidatorStatic::require('prenom', $data['prenom']);
                \App\Core\ValidatorStatic::require('adresse', $data['adresse']);
                \App\Core\ValidatorStatic::require('numeroTelephone', $data['numeroTelephone']);
                \App\Core\ValidatorStatic::require('numeroIdentite', $data['numeroIdentite']);
                \App\Core\ValidatorStatic::require('login', $data['login']);
                \App\Core\ValidatorStatic::require('password', $data['password']);

                \App\Core\ValidatorStatic::phoneSN('numeroTelephone', $data['numeroTelephone']);
                \App\Core\ValidatorStatic::cniSN('numeroIdentite', $data['numeroIdentite']);

                if (empty($_FILES['photoRecto']['name'])) {
                    \App\Core\ValidatorStatic::$errors['photoRecto'] = "La photo recto est obligatoire.";
                }

                if (empty($_FILES['photoVerso']['name'])) {
                    \App\Core\ValidatorStatic::$errors['photoVerso'] = "La photo verso est obligatoire.";
                }

                if (!empty(\App\Core\ValidatorStatic::$errors)) {
                    $this->session->set('errors', \App\Core\ValidatorStatic::$errors);
                    $this->session->set('old', $data);
                    header('Location: /inscription');
                    exit;
                }

                try {
                    $uploader = new \App\Core\FileUpload('public/images/upload/');
                    $data['photoRecto'] = $uploader->upload($_FILES['photoRecto']);
                    $data['photoVerso'] = $uploader->upload($_FILES['photoVerso']);
                } catch (\Exception $e) {
                    $this->session->set('errors', ['global' => $e->getMessage()]);
                    $this->session->set('old', $data);
                    header('Location: /inscription');
                    exit;
                }

                $success = $this->clientService->inscription($data);

                if ($success) {
                    $this->session->set('success', "Inscription réussie !");
                    header("Location: /");
                    exit;
                } else {
                    $this->session->set('errors', ['global' => "Une erreur est survenue pendant l'inscription."]);
                    $this->session->set('old', $data);
                    header('Location: /inscription');
                    exit;
                }
            }

            $this->renderHtml('security/inscription');
        }


         public function logout(){
            $this->session->destroy();
            header('Location: '.HOST);
            exit;
        }

        public function index(){}
        public function edit(){}
        public function destroy(){}
        public function store(){}
        
        public function update(){}
    }   
