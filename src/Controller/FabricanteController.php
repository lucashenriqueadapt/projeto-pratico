<?

namespace Controller;

use Security\JWTAuthenticator;
use Services\FabricanteServices;

class FabricanteController
{
    private FabricanteServices $fabricanteServices;

    public function __construct(FabricanteServices $fabricanteServices)
    {
        $token = JWTAuthenticator::verifyToken($_POST['token']);
        if ($token['status'] == 401) return $token;
        return $this->fabricanteServices = $fabricanteServices;
    }

    public function getFabricantes(): array
    {
        return $this->fabricanteServices->getFabricantes();
    }
}
