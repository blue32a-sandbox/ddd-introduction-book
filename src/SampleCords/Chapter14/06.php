<?php
// InuptPortの実装
interface IUserGetInputPort
{
    public function handle(UserGetInputData $inputData): void;
}
