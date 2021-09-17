<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class StudentController extends AbstractController
{

    private StudentRepository $studentRepository;
    private SerializerInterface $serializer;
    private EntityManagerInterface $entityManager;

    /**
     * @param StudentRepository $studentRepository
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(StudentRepository $studentRepository, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $this->studentRepository = $studentRepository;
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
    }

    #[Route('/students', name: 'getAllStudents', methods: 'GET')]
    public function getAllStudents(): JsonResponse
    {
        $students = $this->studentRepository->findAll();

        $students = $this->serializer->serialize($students, "json");

        return new JsonResponse($students, 200, [], true);
    }

    #[Route('/student/{studentId}', name: 'getStudentById', methods: 'GET')]
    public function getStudentById(int $studentId): JsonResponse
    {
        $student = $this->studentRepository->find($studentId);

        $student = $this->serializer->serialize($student, "json");

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}', name: 'deleteStudentById', methods: 'DELETE')]
    public function deleteStudentById(int $studentId): JsonResponse
    {
        $response = false;
        $student = $this->studentRepository->find($studentId);

        if ($student != null) {
            $this->entityManager->remove($student);
            $this->entityManager->flush();

            if (!$this->studentRepository->find($studentId)) {
                $response = true;
            }
        }

        $response = $this->serializer->serialize($response, "json");

        return new JsonResponse($response, 200, [], true);
    }

    #[Route('/student/lastname/{lastname}', name: 'getStudentByLastname', methods: 'GET')]
    public function getStudentByLastname(string $lastname): JsonResponse
    {
        $student = $this->studentRepository->findBy(['lastname' => $lastname]);

        $student = $this->serializer->serialize($student, "json");

        return new JsonResponse($student, 200, [], true);
    }

}
