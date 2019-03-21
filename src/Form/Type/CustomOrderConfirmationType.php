<?php
/**
 * Created by PhpStorm.
 * User: misrax
 * Date: 3/20/19
 * Time: 4:26 PM
 */

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomOrderConfirmationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('firstName', TextType::class,[
                'label'=>'First Name'
            ])
            ->add('lastName', TextType::class, [
                'label'=>'Last Name'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_admin_order_createion_confirmation_email';
    }

}
