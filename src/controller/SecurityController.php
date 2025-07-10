<?php

    namespace App\Controller;

    class SecurityController extends \App\Core\Abstract\AbstractController
    {

        public function __construct()
        {
            $this->layout = 'layouts/security.layout';
        }

        public function create(){
            $this->renderHtml('security/login');
        }

        public function show(){
            $this->renderHtml('security/inscription');
        }

        public function login()
        {
            header('Location: /acceuil');
            exit;
        }

        public function logout()
        {
            $this->session->destroy();
            header('Location: /');
            exit;
        }

        public function register()
        {
            $this->renderHtml('security/register');
        }

        public function index(){}
        public function edit(){}
        public function destroy(){}
        public function store(){}
        
        public function update(){}
    }   
