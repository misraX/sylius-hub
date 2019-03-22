<?php
/**
 * Created by PhpStorm.
 * User: misrax
 * Date: 3/22/19
 * Time: 5:39 PM
 */

namespace App\EmailManager;


use App\Entity\EmailConfig\EmailConfig;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\ShopBundle\EmailManager\OrderEmailManagerInterface;
use Sylius\Bundle\CoreBundle\Mailer\Emails;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;

/**
 * Class OrderEmailManager
 * @package App\EmailManager
 */
final class OrderEmailManager implements OrderEmailManagerInterface
{
    /** @var SenderInterface */
    private $emailSender;

    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * OrderEmailManager constructor.
     * @param SenderInterface $emailSender
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(SenderInterface $emailSender, EntityManagerInterface $entityManager)
    {
        $this->emailSender = $emailSender;
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function sendConfirmationEmail(OrderInterface $order): void
    {
        $emailConfig = $this->entityManager->getRepository(EmailConfig::class);
        $configuration = $emailConfig->find(1);
        $this->emailSender->send(Emails::ORDER_CONFIRMATION, [$order->getCustomer()->getEmail()], ['order' => $order, 'configuration' => $configuration]);
    }
}
