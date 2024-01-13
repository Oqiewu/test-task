<?php

namespace App\Controller;

use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetAllUsersController extends AbstractController
{
    public function __construct(
        private UserService $userService
    ) {}

    #[Route('/get/users', name: 'app_get_users', methods:['GET'])]
    public function index(): JsonResponse
    {
        return $this->json($this->userService->getAllUsers());
    }
}