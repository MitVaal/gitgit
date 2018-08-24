<?php

namespace DoctrineExoBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // représentation abstraite du formulaire = notre base pour le formulaire
        $builder->add('image')
                ->add('kind')
                ->add('title')
                ->add('pagesNumber')
                ->add('format')
                ->add('author', EntityType::class, array(
                // looks for choices from this entity
                'class' => 'DoctrineExoBundle:Author',
                'choice_label' => 'nom'
                ))
                ->add('submit', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DoctrineExoBundle\Entity\Book'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'doctrineexobundle_book';
    }


}
