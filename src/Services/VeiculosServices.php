<?
namespace Services;

use Repositories\VeiculosRepository;

class VeiculosServices
{
    private VeiculosRepository $veiculosRepository;

    public function __construct(VeiculosRepository $veiculosRepository)
    {
        $this->veiculosRepository = $veiculosRepository;
    }

    public function getVeiculos():array
    {
        return $this->veiculosRepository->getVeiculos();
    }
}

?>