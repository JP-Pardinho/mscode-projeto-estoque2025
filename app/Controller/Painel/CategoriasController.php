<?php 

namespace App\Controller\Painel;

use App\Controller\AbstractController;
use App\Model\Categoria;

class CategoriasController extends AbstractController
{
    public function index (array $requestData) : void
    {
        $model = new Categoria();
        $categorias = $model->findAll();

        $this->render('categorias.php', ['categorias' => $categorias]);
    }    
}