<?php

namespace App\Entity\EmailConfig;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Psr\Log\LoggerInterface;
use Sylius\Bundle\CoreBundle\Mailer\Emails;
use Sylius\Component\Resource\Model\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmailConfigRepository")
 * @UniqueEntity("emailType")
 */
class EmailConfig implements EmailConfigInterface
{
    use TimestampableTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     */
    private $body;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\Choice(callback="getSyliusEmailTypes")
     * @Assert\NotBlank
     */
    private $emailType;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\NotBlank
     */
    private $subject;

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function getSyliusEmailTypes()
    {
        $reflectionClass = new \ReflectionClass(Emails::class);
        $emailTypes = $reflectionClass->getConstants();
        $emailTypeskeys = array_keys($emailTypes);
        return $emailTypeskeys;

    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string|null $body
     * @return EmailConfig
     */
    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return EmailConfig
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailType()
    {
        return $this->emailType;
    }

    /**
     * @param mixed $emailType
     */
    public function setEmailType($emailType): void
    {
        $this->emailType = $emailType;
    }

}
