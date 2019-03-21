<?php
/**
 * Created by PhpStorm.
 * User: misrax
 * Date: 3/21/19
 * Time: 8:20 PM
 */

namespace App\Controller\EmailConfiguration;


use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class EmailConfigurationController
 * @package App\Controller\EmailConfiguration
 */
class EmailConfigurationController
{
    /**
     * EmailConfigurationController constructor.
     * @param FormFactoryInterface $formFactory
     * @param Environment $twig
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(FormFactoryInterface $formFactory, Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    /**
     * @inheritDoc
     */
    public function getEmails()
    {
        // TODO: Implement __invoke() method.
        return new Response($this->twig->render('emails.html.twig'));
    }


}
