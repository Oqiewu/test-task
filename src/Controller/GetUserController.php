<?php

namespace App\Controller;

use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetUserController extends AbstractController
{
    public function __construct(
        private UserService $userService
    ) {}

    #[Route('/get/user/{id}', name: 'app_get_user', methods:['GET'])]
    public function index(int $id): JsonResponse
    {
        return $this->json($this->userService->getUserById($id));
    }
}