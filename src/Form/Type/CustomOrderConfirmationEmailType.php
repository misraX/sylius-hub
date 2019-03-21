<?php
/**
 * Created by PhpStorm.
 * User: misrax
 * Date: 3/20/19
 * Time: 10:48 PM
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomOrderConfirmationEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('body', TextareaType::class, [
                'label' => 'Body: ',
            ])
            ->add('subject', TextType::class,[
                'label'=>'Subject:'
            ])
        ;
    }
}
