<?

namespace Controller;

use Interfaces\Services\CarsInterface;
use Security\JWTAuthenticator;
use Mappers\CarsMapper;

class CarsController
{
    private $carsServices;

    public function __construct(CarsInterface $carsServices)
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
        $cars = CarsMapper::assocObjDadosToCars(json_decode($_POST['dados']));
        return $this->carsServices->saveCar($cars);
    }

    public function updateCar()
    {
        $cars = CarsMapper::assocObjDadosToCars(json_decode($_POST['dados']));
        return $this->carsServices->updateCar($cars);
    }
}
