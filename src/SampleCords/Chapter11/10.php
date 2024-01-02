<?php
// アプリケーションサービスにサークル参加処理を追加する
class CircleApplicationService
{
    // ...

    public function join(CircleJoinCommand $command): void
    {
        $this->pdo->beginTransaction();
        try {
            $memberId = new UserId($command->userId);
            $member = $this->userRepository->find($memberId);
            if ($member === null) {
                throw new UserNotFoundException($memberId, 'ユーザが見つかりませんでした。');
            }

            $id = new CircleId($command->circleId);
            $circle = $this->circleRepository->find($id);
            if ($circle === null) {
                throw new CircleNotFoundException($id, 'サークルが見つかりませんでした。');
            }

            // サークルのオーナーを含めて３０名か確認
            if (count($circle->getMembers()) >= 29) {
                throw new CircleFullException($id);
            }

            // メンバーを追加する
            $circle->getMembers()[] = $member;
            $this->circleRepository->save($circle);

            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
