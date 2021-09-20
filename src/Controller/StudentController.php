<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
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

        $students = $this->serializer->serialize($students, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($students, 200, [], true);
    }

    #[Route('/student/{studentId}', name: 'getStudentById', methods: 'GET')]
    public function getStudentById(int $studentId): JsonResponse
    {
        $student = $this->studentRepository->find($studentId);

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

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

        $response = $this->serializer->serialize($response, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($response, 200, [], true);
    }

    #[Route('/student/lastname/{lastname}', name: 'getStudentByLastname', methods: 'GET')]
    public function getStudentByLastname(string $lastname): JsonResponse
    {
        $student = $this->studentRepository->findBy(['lastname' => $lastname]);

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student', name: 'addNewStudent', methods: 'POST')]
    public function addNewStudent(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = new Student();
        $student->setFirstname($data['firstname']);
        $student->setLastname($data['lastname']);
        $student->setNicknames((array)$data['nicknames']);
        $student->setAge($data['age']);
        $student->setPhoto($data['photo']);
        $student->setPower($data['power']);
        $student->setStrengths((array)$data['strengths']);
        $student->setWeaknesses((array)$data['weaknesses']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/firstname', name: 'patchStudent_firstname', methods: 'PATCH')]
    public function patchStudent_firstname(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setFirstname($data['firstname']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/lastname', name: 'patchStudent_lastname', methods: 'PATCH')]
    public function patchStudent_lastname(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setLastname($data['lastname']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);;

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/nicknames', name: 'patchStudent_nicknames', methods: 'PATCH')]
    public function patchStudent_nicknames(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setNicknames((array)$data['nicknames']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/age', name: 'patchStudent_age', methods: 'PATCH')]
    public function patchStudent_age(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setAge($data['age']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/photo', name: 'patchStudent_photo', methods: 'PATCH')]
    public function patchStudent_photo(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setPhoto($data['photo']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/power', name: 'patchStudent_power', methods: 'PATCH')]
    public function patchStudent_power(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setPower($data['power']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/strengths', name: 'patchStudent_strengths', methods: 'PATCH')]
    public function patchStudent_strengths(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setStrengths((array)$data['strengths']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }

    #[Route('/student/{studentId}/weaknesses', name: 'patchStudent_weaknesses', methods: 'PATCH')]
    public function patchStudent_weaknesses(string $studentId, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = $this->studentRepository->find($studentId);

        $student->setWeaknesses((array)$data['weaknesses']);

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        $student = $this->serializer->serialize($student, "json", [
            AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return$object->getId();
            }
        ]);

        return new JsonResponse($student, 200, [], true);
    }
}