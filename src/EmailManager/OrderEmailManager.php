<?php

namespace App\EmailManager;

use App\Entity\EmailConfig\EmailConfig;
use App\Entity\Order\Order;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\ShopBundle\EmailManager\OrderEmailManagerInterface;
use Sylius\Bundle\CoreBundle\Mailer\Emails;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Twig\Environment;

/**
 * Class OrderEmailManager
 * @package App\EmailManager
 */
final class OrderEmailManager implements OrderEmailManagerInterface
{
    /**
     * @var Environment
     */
    private static $environment;
    /** @var SenderInterface */
    private $emailSender;
    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * OrderEmailManager constructor.
     * @param SenderInterface $emailSender
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(SenderInterface $emailSender, EntityManagerInterface $entityManager, Environment $environment)
    {
        $this->emailSender = $emailSender;
        $this->entityManager = $entityManager;
        self::$environment = $environment;
    }

    /**
     * {@inheritdoc}
     */
    public function sendConfirmationEmail(OrderInterface $order): void
    {
        $emailConfig = $this->entityManager->getRepository(EmailConfig::class);
        // Find by emailType, a unique type of any email configuration.
        $configuration = $emailConfig->findOneBy(['emailType' => Emails::ORDER_CONFIRMATION]);
        $this->emailSender->send(Emails::ORDER_CONFIRMATION, [$order->getCustomer()->getEmail()], ['order' => $order, 'configuration' => $configuration]);
    }
}
