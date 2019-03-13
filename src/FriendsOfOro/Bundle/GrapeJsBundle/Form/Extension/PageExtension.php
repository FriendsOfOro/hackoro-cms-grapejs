<?php

namespace FriendsOfOro\Bundle\GrapeJsBundle\Form\Extension;

use Oro\Bundle\CMSBundle\Form\Type\PageType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;

class PageExtension extends AbstractTypeExtension
{

    public function getExtendedType()
    {
        return PageType::class;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('grapejsState', HiddenType::class)
        ;
    }
}
