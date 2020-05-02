<?php

namespace App\EventSubscriber;

use App\Service\SpreadsheetParser;
use App\Entity\FileImport;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Doctrine\ORM\EntityManagerInterface;

class PostFileSubscriber implements EventSubscriberInterface
{
    private $spreadsheetParser;

    private $entityManager;

    public function __construct(SpreadsheetParser $spreadsheetParser, EntityManagerInterface $entityManager)
    {
        $this->spreadsheetParser = $spreadsheetParser;
        $this->entityManager = $entityManager;
    }

    public function onEasyAdminPostPersist($event)
    {
        $result = $event->getSubject();
        $method = $event->getArgument('request')->getMethod();

        if (! $result instanceof FileImport || $method !== Request::METHOD_POST) {
            return;
        }

        $file = $event->getArgument('request')->files->get('fileimport')['file_name'];

        if ($file instanceof UploadedFile) {
            $this->spreadsheetParser->parseAndSave($result->getFilename(), $result->getId());
            $result->setFileName($file->getClientOriginalName());
            $this->entityManager->flush();
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            EasyAdminEvents::POST_PERSIST => 'onEasyAdminPostPersist',
        ];
    }
}
