<?

namespace Repositories;

use Dtos\CarsDto;
use Interfaces\Repository\CarsInterface;
use PDO;

class CarsRepository implements CarsInterface
{
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function getCars()
    {
        $stmt = $this->conexao->prepare("SELECT cars.idcars, cars.modelo, fabricante.nome as fabricante, veiculo.nome as veiculo, anofabricacao FROM cars JOIN fabricante ON cars.idfabricante = fabricante.idfabricante JOIN veiculo ON cars.idveiculo = veiculo.idveiculo WHERE cars.del = 0");
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return [
            "status" => "success",
            "data" => $dados
        ];
    }

    public function getCar(int $id)
    {
        $stmt = $this->conexao->prepare("SELECT * FROM cars WHERE idcars = ?");
        $stmt->execute([$id]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            "status" => "success",
            "data" => $dados
        ];
    }

    public function deleteCar(int $id)
    {
        $stmt = $this->conexao->prepare("DELETE FROM cars WHERE idcars = ?");
        $stmt->execute([$id]);
        return [
            "status" => "success",
            "message" => "Carro excluído com sucesso"
        ];
    }

    public function saveCar(CarsDto $cars)
    {
        $stmt = $this->conexao->prepare("INSERT INTO cars (modelo, idfabricante, idveiculo, anofabricacao) VALUES (?,?,?,?)");
        $stmt->execute([$cars->modelo, $cars->fabricante, $cars->veiculo, $cars->ano]);
        return [
            "status" => "success",
            "message" => "Carro salvo com sucesso"
        ];
    }

    public function updateCar(CarsDto $cars)
    {
        $stmt = $this->conexao->prepare("UPDATE cars SET modelo = ?, idfabricante = ?, idveiculo = ?, anofabricacao = ? WHERE idcars = ?");
        $stmt->execute([$cars->modelo, $cars->fabricante, $cars->veiculo, $cars->ano, $cars->id]);
        return [
            "status" => "success",
            "message" => "Carro atualizado com sucesso"
        ];
    }
}
