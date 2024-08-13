<?

namespace Repositories;

use PDO;

class CarsRepository
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

    public function saveCar(array $dados)
    {
        $stmt = $this->conexao->prepare("INSERT INTO cars (modelo, idfabricante, idveiculo, anofabricacao) VALUES (?,?,?,?)");
        $stmt->execute([$dados['modelo'], $dados['fabricante'], $dados['veiculo'], $dados['ano']]);
        return [
            "status" => "success",
            "message" => "Carro salvo com sucesso"
        ];
    }

    public function updateCar(array $dados)
    {
        $stmt = $this->conexao->prepare("UPDATE cars SET modelo = ?, idfabricante = ?, idveiculo = ?, anofabricacao = ? WHERE idcars = ?");
        $stmt->execute([$dados['modelo'], $dados['fabricante'], $dados['veiculo'], $dados['ano'], $dados['id']]);
        return [
            "status" => "success",
            "message" => "Carro atualizado com sucesso"
        ];
    }
}
