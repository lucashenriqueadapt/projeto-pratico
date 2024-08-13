<?
namespace Controller;

use Services\CarsServices;

class CarsController
{
    private $carsServices;

    public function __construct(CarsServices $carsServices)
    {
        $this->carsServices = $carsServices;
    }

    public function getCars()
    {
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
        $data = json_decode($_POST['data']);
        $dados = [
            'modelo' => $data['modelo'],
            'fabricante' => $data['fabricante'],
            'veiculo' => $data['veiculo'],
            'ano' => $data['ano']
        ];
        return $this->carsServices->saveCar($dados);
    }

    public function updateCar()
    {
        $dados = [
            'id' => $_POST['id'],
            'modelo' => $_POST['modelo'],
            'fabricante' => $_POST['fabricante'],
            'veiculo' => $_POST['veiculo'],
            'ano' => $_POST['ano']
        ];
        return $this->carsServices->updateCar($dados);
    }
}

?>