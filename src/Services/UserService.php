<?php

namespace App\Services;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Services\Validation;
use Exception;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private Validation $validation
    ){}

    public function addUser($data)
    {
        $user = new User();

        if($this->validation->validationToEmail($data['email']))
        {
            $user->setEmail($data['email']);
        } else {
            throw new Exception('Неверная электронная почта');
        }

        if($this->validation->validationToPhone($data['phone']))
        {
            $user->setPhone($data['phone']);
        } else {
            throw new Exception('Неверный номер телефона');
        }

        $age = intval(date('Y', time() - strtotime($data['birthday']))) - 1970;

        $user->setAge($age);
        $user->setCreatedAt(date('Y-m-d'));
        $user->setUpdatedAt(date('Y-m-d'));
        $user->setName($data['name']);
        $user->setSex($data['sex']);
        $user->setBirthday($data['birthday']);

        $this->userRepository->save($user, true);
    }

    public function editUser(int $id, $data)
    {
        $user = $this->userRepository->findById($id);

        $age = intval(date('Y', time() - strtotime($data['birthday']))) - 1970;
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $created_at = $data['createdAt'];
        $sex = $data['sex'];
        $birthday = $data['birthday'];

        if($this->validation->validationToEmail($email))
        {
            $user->setEmail($email);
        } else {
            throw new Exception('Неверная электронная почта');
        }

        if($this->validation->validationToPhone($phone))
        {
            $user->setPhone($phone);
        } else {
            throw new Exception('Неверный номер телефона');
        }

        !$age        ?: $user->setAge($age);
        !$created_at ?: $user->setCreatedAt(date('Y-m-d'));
        !$name       ?: $user->setName($data['name']);
        !$sex        ?: $user->setSex($data['sex']);
        !$birthday   ?: $user->setBirthday($data['birthday']);
        $user->setUpdatedAt(date('Y-m-d'));
        
        $this->userRepository->save($user, true);
    }

    public function deleteUser(int $id)
    {
        $user = $this->userRepository->findById($id);
        
        $this->userRepository->remove($user, true);
    }

    public function getUserById($id): User
    {
        $user = $this->userRepository->findById($id);

        return $user;
    }

    public function getAllUsers()
    {
        $users = $this->userRepository->findAll();

        return $users;
    }
}