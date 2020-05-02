<?php

namespace App\Controller\EasyAdmin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use App\Entity\FileImport;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;

/**
 * This is an example of how to use a custom controller for a backend entity.
 */
class FileImportController extends EasyAdminController
{
    /**
     * @param FileImport $entity
     */
    protected function preUpdateEntity($entity)
    {
        $entity->setUpdatedAt(new \DateTime());
    }

    // public function newAction()
    // {
    // 	dd('new');
    // }
}
