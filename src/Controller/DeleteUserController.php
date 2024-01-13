<?php

namespace App\Controller;

use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DeleteUserController extends AbstractController
{
    public function __construct(
        private UserService $userService
    ) {}

    #[Route('/delete/user/{id}', name: 'app_delete_user', methods:['DELETE'])]
    public function index(int $id): JsonResponse
    {
        $this->userService->deleteUser($id);

        return $this->json("Successful!");
    }
}