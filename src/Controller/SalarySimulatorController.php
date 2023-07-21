<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalarySimulatorController extends AbstractController
{
    #[Route('/salary/simulator', name: 'app_salary_simulator')]
    public function index(Request $request)
    {
        $form = $this->createForm(SalarySimulatorType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Calculate salary based on the input data
            $salary = $this->calculateSalary($data);

            // You can pass the calculated salary to the template or perform other actions

            return $this->redirectToRoute('salary_result', ['salary' => $salary]);
        }

        return $this->render('salary_simulator/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function calculateSalary($data)
    {
        // Perform the salary calculation logic based on the input data
        // Replace this with your own salary calculation algorithm
        $salary = $data['baseSalary'] + $data['bonus'] - $data['deductions'];

        return $salary;
    }
}
