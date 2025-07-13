<?php

    namespace App\Controller;

    use App\Core\Abstract\AbstractController;

    class ClientController extends AbstractController{

    
        public function index()
        {
            $this->renderHtml('dashboard/dashboard.client');
        }

        public function show()
        {
            $this->renderHtml('client/show');
        }

        public function create()
        {
            $this->renderHtml('client/create');
        }

        public function store()
        {
            header('Location: '.HOST.'client');
            exit;
        }

        public function edit()
        {
            $this->renderHtml('client/edit');
        }

        public function update()
        {
            header('Location: /clients');
            exit;
        }

        public function destroy()
        {
            header('Location: /clients');
            exit;
        }
    }