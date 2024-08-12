<?
include_once 'vendor/autoload.php';
include_once 'conexao.php';

use Controller\UserController;
use Repositories\UserRepository;
use Services\UserServices;


$userRepository = new UserRepository($conexao);
$userService = new UserServices($userRepository);
$userControl = new UserController($userService);

echo json_encode(match ($_POST['acao'] ?? $_GET['acao']) {
    "login" => $userControl->login(),
    "cadastro" => $userControl->cadastro(),
    default => throw new Exception('Ação Inválida:' . json_encode($_POST))
});
