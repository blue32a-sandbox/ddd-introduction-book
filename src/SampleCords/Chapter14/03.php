<?php
// ドメイン層の住人であるエンティティやドメインサービス
class User
{
    public function __construct(
        public readonly UserId $id,
        private UserName $name,
        private UserType $type
    ) {
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function getType(): UserType
    {
        return $this->type;
    }

    public function isPremium(): bool
    {
        return $this->type === UserType::PREMIUM;
    }

    public function changeName(UserName $name): void
    {
        $this->name = $name;
    }

    public function upgrade(): void
    {
        $this->type = UserType::PREMIUM;
    }

    public function downgrade(): void
    {
        $this->type = UserType::NORMAL;
    }

    public function __toString()
    {
        return sprintf('%s (%s)', $this->name->value, $this->id->value);
    }
}

class UserService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    public function exists(User $user): bool
    {
        $duplicatedUser = $this->userRepository->findByName($user->getName());
        return $duplicatedUser !== null;
    }
}
