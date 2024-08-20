<?
namespace Interfaces\Services;

use Dtos\CarsDto;

interface CarsInterface
{
    public function getCars();
    public function getCar(int $id);
    public function deleteCar(int $id);
    public function saveCar(CarsDto $cars);
    public function updateCar(CarsDto $cars);
}

?>