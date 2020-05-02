<?php

namespace App\Service;

use App\Entity\UserRole;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class SpreadsheetParser
{
    private $session;

    private $entityManager;

    public function __construct(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    public function parseAndSave(string $filename, int $fileImportId)
    {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
        $spreadsheet = $reader->load($filename);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = [];
        foreach ($worksheet->getRowIterator() as $rowKey => $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
            $cells = [];
            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
            if ($rowKey > 1) {
                $userRole = new UserRole();
                $userRole->setUserId((int)$cells[0]);
                $userRole->setRoleId((int)$cells[1]);
                $userRole->setImportId($fileImportId);

                $this->entityManager->persist($userRole);
                $this->entityManager->flush();
            }
        }

        $this->session->getFlashBag()->add('notice', serialize($rows));
    }
}
