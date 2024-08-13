<?

namespace Controller;

use Services\CarsServices;
use Security\JWTAuthenticator;

class CarsController
{
    private $carsServices;

    public function __construct(CarsServices $carsServices)
    {
        $this->carsServices = $carsServices;
    }

    public function getCars()
    {
        $token = JWTAuthenticator::verifyToken($_POST['token']);
        if ($token['status'] == 401) return $token;
        
        return $this->carsServices->getCars();
    }

    public function getCar()
    {
        $id = $_POST['id'];
        return $this->carsServices->getCar($id);
    }

    public function deleteCar()
    {
        $id = $_POST['id'];
        return $this->carsServices->deleteCar($id);
    }

    public function saveCar()
    {
        $data = json_decode($_POST['dados']);
        $dados = [
            'modelo' => $data->modelo,
            'fabricante' => $data->fabricante,
            'veiculo' => $data->veiculo,
            'ano' => $data->ano
        ];
        return $this->carsServices->saveCar($dados);
    }

    public function updateCar()
    {
        $data = json_decode($_POST['dados']);
        $dados = [
            'id' => $data->idcars,
            'modelo' => $data->modelo,
            'fabricante' => $data->idfabricante,
            'veiculo' => $data->idveiculo,
            'ano' => $data->anofabricacao
        ];
        return $this->carsServices->updateCar($dados);
    }
}
