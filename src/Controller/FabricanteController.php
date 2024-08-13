<?
namespace Controller;

use Services\FabricanteServices;

class FabricanteController
{
    private FabricanteServices $fabricanteServices;

    public function __construct(FabricanteServices $fabricanteServices)
    {
        $this->fabricanteServices = $fabricanteServices;
    }

    public function getFabricantes():array
    {
        return $this->fabricanteServices->getFabricantes();
    }
}