<?php
// 仕様オブジェクトを受け取るリポジトリの実装
class circleRepository implements ICircleRepository
{
    private readonly PDO $pdo;

    public function find(ISpecification $specification): array
    {
        $sql = "SELECT *FROM circles";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $circles = [];
        foreach ($rows as $row) {
            // インスタンスを生成して条件に合うか確認している（合わなければ捨てられる）
            $circle = $this->createInstance($row);
            if ($specification->isSatisfiedBy($circle)) {
                $circles[] = $circle;
            }
        }
        return $circles;
    }
}
