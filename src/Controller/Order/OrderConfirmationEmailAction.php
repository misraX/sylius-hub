<?php

namespace App\Controller\Order;

use App\Entity\Order\Order;
use App\Form\Type\CustomOrderConfirmationEmailType;
use App\Form\Type\CustomOrderConfirmationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class OrderConfirmationEmailAction
 * @package App\Controller\Order
 */
class OrderConfirmationEmailAction
{

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var Environment
     */
    private $twig;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * OrderConfirmationEmailAction constructor.
     */
    public function __construct(FormFactoryInterface $formFactory, Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(Request $request, $id): Response
    {
        $em = $this->entityManager;
        $repo = $em->getRepository(Order::class);
        $order = $repo->find($id);
        $form = $this->formFactory->create(CustomOrderConfirmationType::class, $order->getCustomer());
        $form_email = $this->formFactory->create(CustomOrderConfirmationEmailType::class);
        $form->handleRequest($request);
        $form_email->handleRequest($request);
        return new Response($this->twig->render('admin_ordre_confirmation.html.twig', [
            'form' => $form->createView(),
            'form_email'=>$form_email->createView(),
            'order' => $order
        ]));
    }
}

