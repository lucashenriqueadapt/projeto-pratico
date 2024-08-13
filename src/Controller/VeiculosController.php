<?
namespace Controller;

use Services\VeiculosServices;

class VeiculosController
{
    private VeiculosServices $veiculosServices;

    public function __construct(VeiculosServices $veiculosServices)
    {
        $this->veiculosServices = $veiculosServices;
    }

    public function getVeiculos():array
    {
        return $this->veiculosServices->getVeiculos();
    }
}

?>