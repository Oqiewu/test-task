<?php

namespace App\Controller;

use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditUserController extends AbstractController
{
    public function __construct(
        private UserService $userService
    ) {}

    #[Route('/edit/user/{id}', name: 'app_edit_user', methods:['PUT'])]
    public function index(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->userService->editUser($id, $data);

        return $this->json("Successful!");
    }
}
