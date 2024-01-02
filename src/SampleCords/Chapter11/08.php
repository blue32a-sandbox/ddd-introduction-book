<?php
// アプリケーションサービスにサークル作成処理を追加する
class CircleApplicationService
{
    public function __construct(
        private readonly ICircleFactory $circleFactory,
        private readonly ICircleRepository $circleRepository,
        private readonly CircleService $circleService,
        private readonly IUserRepository $userRepository,
        private readonly PDO $pdo
    ) {
    }

    public function create(CircleCreateCommand $command): void
    {
        $this->pdo->beginTransaction();
        try {
            $ownerId = new UserId($command->userId);
            $owner = $this->userRepository->find($ownerId);
            if ($owner === null) {
                throw new UserNotFoundException($ownerId, 'サークルのオーナーとなるユーザが見つかりませんでした。');
            }

            $name = new CircleName($command->name);
            $circle = $this->circleFactory->create($owner, $name);
            if ($this->circleService->exists($circle)) {
                throw new CanNotRegisterCircleException($circle, 'サークルは既に存在しています。');
            }

            $this->circleRepository->save($circle);
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
