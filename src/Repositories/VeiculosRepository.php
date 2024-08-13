<?
namespace Repositories;

use PDO;

class VeiculosRepository
{
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function getVeiculos(): array
    {
        return $this->conexao->query('SELECT idveiculo, nome, idfabricante FROM veiculo')->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>