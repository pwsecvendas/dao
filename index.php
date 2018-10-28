<?php 

require_once("config.php");

/* $sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios); */

#CARREGA APENAS UM USUARIO
/* $root = new Usuario();
$root->loadById(4);
echo $root; */

#CARREGA UMA LISTA COM TODOS OS USUARIOS
/* $lista = Usuario::getList();
echo json_encode($lista); */

#CARREGA UMA LISTA DE USUARIOS ONDE O PARAMETRO DE BUSCA É O LOGIN E ORDENADOS POR
/* $search = Usuario::search("us");
echo json_encode($search); */

#CARREGA UM USUARIO USANDO O LOGIN E A SENHA
$usuario = new Usuario();
$usuario->login("rot","!@#$");
echo $usuario;
 ?>