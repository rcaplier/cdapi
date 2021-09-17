<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class StudentController extends AbstractController
{

    private StudentRepository $studentRepository;

    /**
     * @param StudentRepository $studentRepository
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }


    #[Route('/students', name: 'students')]
    public function students(SerializerInterface $serializer): JsonResponse
    {
        $students = $this->studentRepository->findAll();

        $students = $serializer->serialize($students, "json");

        return new JsonResponse($students, 200, [], true);
    }
}
