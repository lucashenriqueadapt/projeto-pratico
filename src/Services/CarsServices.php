<?
namespace Services;

use Repositories\CarsRepository;

class CarsServices
{
    private $carsRepository;
    public function __construct(CarsRepository $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function getCars()
    {
        return $this->carsRepository->getCars();
    }
    
    public function getCar(int $id)
    {
        return $this->carsRepository->getCar($id);
    }

    public function deleteCar(int $id)
    {
        return $this->carsRepository->deleteCar($id);
    }

    public function saveCar(array $dados)
    {
        return $this->carsRepository->saveCar($dados);
    }

    public function updateCar(array $dados)
    {
        return $this->carsRepository->updateCar($dados);
    }
}

?>