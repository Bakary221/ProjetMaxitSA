<?php

namespace App\Controller;

    use App\Service\ClientService;
    use App\Core\Validator;
    use App\Core\FileUpload;
    use App\Service\ClientCompteService;

    class SecurityController extends \App\Core\Abstract\AbstractController
    {
        private ClientService $clientService;
        private ClientCompteService $clientCompteService;

        public function __construct()
        {
            parent::__construct();
            $this->clientService = \App\Core\App::getDependancy('clientService');
            $this->session = \App\Core\App::getDependancy('session');
            $this->clientCompteService = \App\Core\App::getDependancy("clientCompteService");
            $this->layout = 'layouts/security.layout';
        }

        public function create()
        {
            $this->renderHtml('security/login');
        }

        public function show()
        {
            $this->renderHtml('security/inscription');
        }

        public function login()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login = $_POST['login'] ?? '';
                $password = $_POST['password'] ?? '';

                $donnees = ['login' => $login, 'password' => $password];
                $regles = [
                    'login' => 'obligatoire',
                    'password' => 'obligatoire'
                ];

                $erreurs = Validator::valider($donnees, $regles);

                if (!empty($erreurs)) {
                    $this->session->set('errors', $erreurs);
                    header('Location: '.HOST);
                    exit;
                }

                $user = $this->clientService->seConnecter($login);

                if ($user && password_verify($password, $user->getPassword())) {
                    $this->session->set('user', $user->toArray());

                    $data = $this->clientCompteService->getInfosClient($_SESSION['user']['id']);

                    $this->session->set('data' , $data);
                    header('Location: /acceuil');
                    exit;
                } else {
                    $this->session->set('errors', ['global' => 'Identifiant ou mot de passe incorrect.']);
                    header('Location: '.HOST);
                    exit;
                }
            }

            header('Location: '.HOST);
            exit;
        }

        public function register()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'nom' => $_POST['nom'] ?? '',
                    'prenom' => $_POST['prenom'] ?? '',
                    'adresse' => $_POST['adresse'] ?? '',
                    'numeroTelephone' => $_POST['numeroTelephone'] ?? '',
                    'numeroIdentite' => $_POST['numeroIdentite'] ?? '',
                    'login' => $_POST['login'] ?? '',
                    'password' => $_POST['password'] ?? '',
                    'photoRecto' => $_FILES['photoRecto']['name'] ?? '',
                    'photoVerso' => $_FILES['photoVerso']['name'] ?? '',
                    'idTypeUtilisateur' => 1 // client
                ];

                $regles = [
                    'nom' => 'obligatoire|lettres_espaces|min_longueur:2',
                    'prenom' => 'obligatoire|lettres_espaces|min_longueur:2',
                    'adresse' => 'obligatoire|min_longueur:5',
                    'numeroTelephone' => 'obligatoire|telephone_senegal',
                    'numeroIdentite' => 'obligatoire|alphanumerique|min_longueur:6',
                    'login' => 'obligatoire|email',
                    'password' => 'obligatoire|min_longueur:6',
                    'photoRecto' => 'fichier_obligatoire|fichier_image|fichier_taille_max:2097152',
                    'photoVerso' => 'fichier_obligatoire|fichier_image|fichier_taille_max:2097152'
                ];

                $erreurs = Validator::valider($data, $regles);

                if (!empty($erreurs)) {
                    $this->session->set('errors', $erreurs);
                    $this->session->set('old', $data);
                    header('Location: '.HOST."inscription");
                    exit;
                }

                try {
                    $uploader = new FileUpload('public/images/upload/');
                    $data['photoRecto'] = $uploader->upload($_FILES['photoRecto']);
                    $data['photoVerso'] = $uploader->upload($_FILES['photoVerso']);
                } catch (\Exception $e) {
                    $this->session->set('errors', ['global' => $e->getMessage()]);
                    $this->session->set('old', $data);
                    header('Location: '.HOST."inscription");
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
                    header('Location: '.HOST."inscription");
                    exit;
                }
            }

            $this->renderHtml('security/inscription');
        }

        public function logout()
        {
            $this->session->destroy();
            header('Location: ' . HOST);
            exit;
        }

        public function index() {}
        public function edit() {}
        public function destroy() {}
        public function store() {}
        public function update() {}
    }
