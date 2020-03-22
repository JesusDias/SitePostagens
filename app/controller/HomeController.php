<?php

class HomeController
{
    public function index()
    {
        try {
            $colectPostagens = Postagem::selecionaTodos();

            //essa primeira linha carrega a pasta que tem as views
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parametros = array();
            $parametros['postagens'] = $colectPostagens;
            $conteudo = $template->render($parametros);

            echo $conteudo;
  
        } catch (Exception $e) {
            echo $e->getMessage();
        }
      
    }
}