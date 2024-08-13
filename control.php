<?
include_once 'vendor/autoload.php';
include_once 'conexao.php';

use Controller\UserController;
use Repositories\UserRepository;
use Services\UserServices;

use Controller\FabricanteController;
use Repositories\FabricanteRepository;
use Services\FabricanteServices;

use Controller\VeiculosController;
use Repositories\VeiculosRepository;
use Services\VeiculosServices;

use Controller\CarsController;
use Repositories\CarsRepository;
use Services\CarsServices;


$userRepository = new UserRepository($conexao);
$userService = new UserServices($userRepository);
$userControl = new UserController($userService);

$fabricanteRepository = new FabricanteRepository($conexao);
$fabricanteService = new FabricanteServices($fabricanteRepository);
$fabricanteControl = new FabricanteController($fabricanteService);

$veiculoRepository = new VeiculosRepository($conexao);
$veiculoService = new VeiculosServices($veiculoRepository);
$veiculoControl = new VeiculosController($veiculoService);

$carsRepository = new CarsRepository($conexao);
$carsService = new CarsServices($carsRepository);
$carsControl = new CarsController($carsService);

echo json_encode(match ($_POST['acao'] ?? $_GET['acao']) {
    "login"          => $userControl->login(),
    "cadastro"       => $userControl->cadastro(),
    "getFabricantes" => $fabricanteControl->getFabricantes(),
    "getVeiculos"    => $veiculoControl->getVeiculos(),
    "cadastroCar"    => $carsControl->saveCar(),
    default => throw new Exception('Ação Inválida:' . json_encode($_POST))
});
