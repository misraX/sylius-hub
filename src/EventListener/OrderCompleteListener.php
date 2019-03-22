<?php
/**
 * Created by PhpStorm.
 * User: misrax
 * Date: 3/22/19
 * Time: 5:49 PM
 */

namespace App\EventListener;

use Sylius\Bundle\ShopBundle\EmailManager\OrderEmailManagerInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webmozart\Assert\Assert;

final class OrderCompleteListener
{
    /** @var OrderEmailManagerInterface */
    private $orderEmailManager;

    public function __construct(OrderEmailManagerInterface $orderEmailManager)
    {
        $this->orderEmailManager = $orderEmailManager;
    }

    public function sendConfirmationEmail(GenericEvent $event): void
    {
        $order = $event->getSubject();
        Assert::isInstanceOf($order, OrderInterface::class);

        $this->orderEmailManager->sendConfirmationEmail($order);
    }
}
