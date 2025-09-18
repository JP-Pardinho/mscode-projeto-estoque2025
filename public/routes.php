<?php

use App\Controller\AppController;
use App\Controller\Error\ErrorController;
use App\Controller\Error\NotFoundController;
use App\Controller\Produto\SalvarProdutoController as SalvarProduto;
use App\Controller\Produto\RemoverProdutoController as RemoverProduto;
use App\Controller\Categoria\SalvarCategoriaController as SalvarCategoria;
use App\Controller\Categoria\RemoverCategoriaController as RemoverCategoria;
use App\Controller\LoginController as Login;
use App\Controller\LogoutController as Logout;
use App\Controller\Painel\EstoqueController as Estoque;
use App\Controller\Painel\CategoriasController as Categorias;
use App\Controller\Painel\NovoProdutoController as NovoProduto;
use App\Controller\Painel\NovaCategoriaController as NovaCategoria;
use App\Controller\Painel\IndexController as Index;

$router = [
    'routes' => [
        '/' => AppController::class,
        '/produto/salvarProduto' => SalvarProduto::class,
        '/produto/removerProduto' => RemoverProduto::class,
        '/categoria/salvarCategoria' => SalvarCategoria::class,
        '/categoria/removerCategoria' => RemoverCategoria::class,
        '/login' => Login::class,
        '/logout' => Logout::class,
        '/tela-inicial' => Index::class,
        '/tela-produtos' => Estoque::class,
        '/tela-categorias' => Categorias::class,
        '/novo-produto' => NovoProduto::class,
        '/nova-categoria' => NovaCategoria::class,
        '/error' => ErrorController::class,
    ],
    'default' => NotFoundController::class
];
