<?
namespace Repositories;

use PDO;

class FabricanteRepository
{
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function getFabricantes(): array
    {
        return $this->conexao->query('SELECT idfabricante, nome FROM fabricante')->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>