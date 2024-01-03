<?php
// サークル集約を永続化する処理
class CircleRepository implements ICircleRepository
{
    // ...

    public function save(Circle $circle): void
    {
        $stmt = $this->pdo->prepare("
INSERT INTO circles (id, name, ownerId)
VALUES (@id, @name, @ownerId)
ON DUPLICATE KEY UPDATE
name = VALUES(name),
ownerId = VALUES(ownerId);
        ");
        $stmt->execute([
            'id' => $circle->id->value,
            'name' => $circle->name->value,
            'ownerId' => $circle->owner->id->value,
        ]);

        $stmt = $this->pdo->prepare("
INSERT IGNORE INTO userCircles (userId, circleId)
VALUES (@userId, @circleId);
        ");

        foreach ($this->members as $member) {
            $stmt->execute([
                'userId' => $member->id->value,
                'circleId' => $circle->id->value,
            ]);
        }
    }
}
