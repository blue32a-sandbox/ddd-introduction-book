<?php
// メンバー勧誘を行う処理
class CircleApplicationService
{
    // ...

    public function invite(CircleInviteCommand $command): void
    {
        $this->pdo->beginTransaction();
        try {
            $fromUserId = new UserId($command->fromUserId);
            $fromUser = $this->userRepository->find($fromUserId);
            if ($fromUser === null) {
                throw new UserNotFoundException($fromUserId, '招待元ユーザが見つかりませんでした。');
            }

            $invitedUserId = new UserId($command->inviteUserId);
            $invitedUser = $this->userRepository->find($invitedUserId);
            if ($invitedUser === null) {
                throw new UserNotFoundException($invitedUserId, 'ユーザが見つかりませんでした。');
            }

            $circleId = new CircleId($command->circleId);
            $circle = $this->circleRepository->find($circleId);
            if ($circle === null) {
                throw new CircleNotFoundException($circleId, 'サークルが見つかりませんでした。');
            }

            // サークルのオーナーを含めて３０名か確認
            if (count($circle->getMembers()) >= 29) {
                throw new CircleFullException($circleId);
            }

            $circleInvitation = new CircleInvitation($circle, $fromUser, $invitedUser);
            $this->circleInvitationRepository->save($circleInvitation);

            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
