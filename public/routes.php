<?php

use App\Controller\AppController;

// TELAS: ERROS 
use App\Controller\Error\ErrorController;
use App\Controller\Error\NotFoundController;

// CRUD PRODUTOS
use App\Controller\Produto\SalvarProdutoController as SalvarProduto;
use App\Controller\Produto\RemoverProdutoController as RemoverProduto;
use App\Controller\Produto\EditarProdutoController as EditarProduto;
use App\Controller\Produto\IncrementarProdutoController as IncrementarProduto;
use App\Controller\Produto\VenderProdutoController as VenderProduto;

// CRUD CATEGORIA
use App\Controller\Categoria\SalvarCategoriaController as SalvarCategoria;
use App\Controller\Categoria\RemoverCategoriaController as RemoverCategoria;
use App\Controller\Categoria\EditarCategoriaController as EditarCategoria;

// VALIDAÇÃO USUARIO
use App\Controller\LoginController as Login;
use App\Controller\LogoutController as Logout;

// TELAS: CATEGORIAS
use App\Controller\Painel\CategoriasController as Categorias;
use App\Controller\Painel\NovaCategoriaController as NovaCategoria;
use App\Controller\Painel\TelaEditarCategoriaController as TelaEditarCategoria;

// TELAS: PRODUTOS
use App\Controller\Painel\ProdutosController as Produto;
use App\Controller\Painel\NovoProdutoController as NovoProduto;
use App\Controller\Painel\TelaEditarProdutoController as TelaEditarProduto;

// TELA INICIAL
use App\Controller\Painel\IndexController as Index;

$router = [
    'routes' => [
        '/' => AppController::class,
        '/categoria/salvarCategoria' => SalvarCategoria::class,
        '/categoria/removerCategoria' => RemoverCategoria::class,
        '/categoria/editarCategoria' => EditarCategoria::class,
        '/produto/salvarProduto' => SalvarProduto::class,
        '/produto/removerProduto' => RemoverProduto::class,
        '/produto/editarProduto' => EditarProduto::class,
        '/produto/incrementarProduto' => IncrementarProduto::class,
        '/produto/venderProduto' => VenderProduto::class,
        '/login' => Login::class,
        '/logout' => Logout::class,
        '/tela-inicial' => Index::class,
        '/tela-produtos' => Produto::class,
        '/novo-produto' => NovoProduto::class,
        '/tela-categorias' => Categorias::class,
        '/nova-categoria' => NovaCategoria::class,
        '/tela-editar-categoria' => TelaEditarCategoria::class,
        '/tela-editar-produto' => TelaEditarProduto::class,
        '/error' => ErrorController::class,
    ],
    'default' => NotFoundController::class
];
