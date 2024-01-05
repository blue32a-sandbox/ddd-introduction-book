<?php
// 最適化のために直接クエリを実行する
class CircleQueryService
{
    private readonly PDO $pdo;

    // ...

    public function getSummaries(CircleGetSummariesCommand $command): CircleGetSummariesResult
    {
        $sql = "
SELECT
circles.id as circleId,
users.name as ownerName
FROM circles
LEFT OUTER JOIN users
ON circles.ownerId = users.id
ORDER BY circles.id
LIMIT :size OFFSET :skip
";
        $stmt = $this->pdo->prepare($sql);

        $page = $command->page;
        $size = $command->size;
        $stmt->bindValue(':skip', ($page - 1) * $size, PDO::PARAM_INT);
        $stmt->bindValue(':size', $size, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $summaries = [];
        foreach ($rows as $row) {
            $circleId = (string) $row['circleId'];
            $ownerName = (string) $row['ownerName'];
            $summary = new CircleSummaryData($circleId, $ownerName);
            $summaries[] = $summary;
        }

        return new CircleGetSummariesResult($summaries);
    }
}
