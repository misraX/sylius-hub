<?php

namespace App\Repository;

use App\Entity\EmailConfig\EmailConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmailConfig|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailConfig|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailConfig[]    findAll()
 * @method EmailConfig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailConfigRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmailConfig::class);
    }

}
