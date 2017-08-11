<?php

namespace Markup\NeedleBundle\Indexer;

use Markup\NeedleBundle\Exception\IllegalSubjectException;

class SubjectHashGenerator
{
    /**
     * @var SubjectDataMapperInterface
     */
    private $dataMapper;

    public function __construct(SubjectDataMapperInterface $dataMapper)
    {
        $this->dataMapper = $dataMapper;
    }

    public function createHashForSubject($subject)
    {
        try {
            $data = $this->dataMapper->mapSubjectToData($subject);
        } catch (IllegalSubjectException $e) {
            return null;
        }

        return $data;
    }
}
