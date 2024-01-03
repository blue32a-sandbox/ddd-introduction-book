<?php
// サークルの名前を変更する処理
class CircleApplicationService
{
    public function __construct(
        private readonly ICircleRepository $circleRepository,
        private readonly PDO $pdo
    ) {
    }

    // ...

    public function update(CircleUpdateCommand $command): void
    {
        $this->pdo->beginTransaction();
        try {
            $id = new CircleId($command->id);
            // この時点でUserのインスタンスが再構築されるが
            $circle = $this->circleRepository->find($id);
            if ($circle === null) {
                throw new CircleNotFoundException($id);
            }

            if ($command->name !== null) {
                $name = new CircleName($command->name);
                $circle->changeName($name);

                if ($this->circleService->exists($circle)) {
                    throw new CanNotRegisterCircleException($circle, 'サークルはすでに存在しています。');
                }
            }

            $this->circleRepository->save($circle);
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }

        // Userのインスタンスは使われることなく捨てられる
    }
}
