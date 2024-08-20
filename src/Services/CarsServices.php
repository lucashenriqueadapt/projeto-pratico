<?
namespace Services;

use Dtos\CarsDto;
use Interfaces\Services\CarsInterface;
use Interfaces\Repository\CarsInterface as RepositoryCarsInterface;

class CarsServices implements CarsInterface
{
    private $carsRepository;
    public function __construct(RepositoryCarsInterface $carsRepository)
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

    public function saveCar(CarsDto $cars)
    {
        return $this->carsRepository->saveCar($cars);
    }

    public function updateCar(CarsDto $cars)
    {
        return $this->carsRepository->updateCar($cars);
    }
}

?>