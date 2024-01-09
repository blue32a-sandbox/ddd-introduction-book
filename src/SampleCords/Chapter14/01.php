<?php
// プレゼンテーション層の住人であるコントローラ
class UserController extends Controller
{
    public function __construct(
        private readonly UserApplicationService $userApplicationService
    ) {
    }

    public function index(): UserIndexResponseModel
    {
        $result = $this->userApplicationService->getAll();
        $users = array_map(
            fn ($x) => new UserResponseModel($x->id, $x->name),
            $result->users
        );

        return new UserIndexResponseModel($users);
    }

    public function get(string $id): UserGetResponseModel
    {
        $command = new UserGetCommand($id);
        $result = $this->userApplicationService->get($command);

        $userModel = new UserResponseModel($result->user);

        return new UserGetResponseModel($userModel);
    }

    public function post(UserPostRequestModel $request): UserPostResponseModel
    {
        $command = new UserRegisterCommand($request->userName);
        $result = $this->userApplicationService->register($command);

        return new UserPostResponseModel($result->createdUserId);
    }

    public function put(string $id, UserPutRequestModel $request): void
    {
        $command = new UserUpdateCommand($id, $request->name);
        $this->userApplicationService->update($command);
    }

    public function delete(string $id): void
    {
        $command = new UserDeleteCommand($id);
        $this->userApplicationService->delete($command);
    }
}
