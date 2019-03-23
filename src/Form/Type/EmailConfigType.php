<?php

namespace App\Form\Type;

use App\Entity\EmailConfig\EmailConfig;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class EmailConfigType
 * @package App\Form\Type
 */
class EmailConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $emailConfig = new EmailConfig();
        $builder->add('subject', TextType::class, [
            'help' => 'app.ui.subject_help',
            'attr' => ['placeholder' => 'app.ui.subject_help']
        ])->add('emailType', ChoiceType::class, [
            'choices' => $emailConfig->getSyliusEmailTypes(true),
        ])->add('body', CKEditorType::class, [
            'attr' => ['placeholder' => 'app.ui.body_help']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'app_emailConfig';
    }
}
