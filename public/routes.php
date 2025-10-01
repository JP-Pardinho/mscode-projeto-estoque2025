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

// CRUD USUARIOS
use App\Controller\Usuario\SalvarUsuarioController as SalvarUsuario;
use App\Controller\Usuario\RemoverUsuarioController as RemoverUsuario;
use App\Controller\Usuario\EditarUsuarioController as EditarUsuario;

// CRUD VENDAS
use App\Controller\Venda\SalvarVendaController as SalvarVenda;
use App\Controller\Venda\EditarVendaController as EditarVenda;

// Login e Logout
use App\Controller\LoginController as Login;
use App\Controller\LogoutController as Logout;

//  PAINEL
use App\Controller\Painel\CategoriasController as Categorias;
use App\Controller\Painel\NovaCategoriaController as NovaCategoria;
use App\Controller\Painel\TelaEditarCategoriaController as TelaEditarCategoria;
// TELAS DOS PRODUTOS
use App\Controller\Painel\ProdutosController as Produto;
use App\Controller\Painel\NovoProdutoController as NovoProduto;
use App\Controller\Painel\TelaEditarProdutoController as TelaEditarProduto;
// TELAS DOS USUARIOS
use App\Controller\Painel\TelaLoginController as TelaLogin;
use App\Controller\Painel\NovoUsuarioController as TelaCadastro;
use App\Controller\Painel\PerfilUsuarioController as TelaPerfil;
// TELAS DAS VENDAS
use App\Controller\Painel\NovaVendaController as NovaVenda;
use App\Controller\Painel\FinalizarVendaController as FinalizarVenda;
use App\Controller\Painel\VendasController as Vendas;

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
        
        '/usuario/salvarUsuario' => SalvarUsuario::class,
        '/usuario/removerUsuario' => RemoverUsuario::class,
        '/usuario/editarUsuario' => EditarUsuario::class,    
        
        '/venda/salvarVenda' => SalvarVenda::class,
        '/venda/editarVenda' => EditarVenda::class,

        '/login' => Login::class,
        '/logout' => Logout::class,
        
        '/nova-categoria' => NovaCategoria::class,
        '/novo-produto' => NovoProduto::class,
        '/tela-login' => TelaLogin::class,
        '/tela-perfil' => TelaPerfil::class,
        '/tela-cadastro' => TelaCadastro::class,
        '/tela-produtos' => Produto::class,
        '/tela-categorias' => Categorias::class,
        '/tela-editar-categoria' => TelaEditarCategoria::class,
        '/tela-editar-produto' => TelaEditarProduto::class,
        '/nova-venda' => NovaVenda::class,
        '/finalizar-venda' => FinalizarVenda::class,
        '/vendas-realizadas' => Vendas::class,

        '/error' => ErrorController::class,
    ],
    'default' => NotFoundController::class
];
