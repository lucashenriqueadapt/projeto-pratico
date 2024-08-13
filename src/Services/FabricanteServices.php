<?
namespace Services;

use Repositories\FabricanteRepository;

class FabricanteServices
{
    private FabricanteRepository $fabricanteRepository;

    public function __construct(FabricanteRepository $fabricanteRepository)
    {
        $this->fabricanteRepository = $fabricanteRepository;
    }

    public function getFabricantes():array
    {
        return $this->fabricanteRepository->getFabricantes();
    }
}

?>