<?php

namespace App\Controller;

use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddUserController extends AbstractController
{
    public function __construct(
        private UserService $userService
    ) {}

    #[Route('/add/user', name: 'app_add_user', methods:['POST'])]
    public function index(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->userService->addUser($data);

        return $this->json("Successful!");
    }
}
