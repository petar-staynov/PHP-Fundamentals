<?php

namespace Data;

class IndexViewData
{
    /**
     * @var \Generator|Genre[]
     */
    private $genres;

    private $errors = null;

    private $formData;

    /**
     * @return Genre|\Generator
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param callable $genres
     */
    public function setGenres(callable $genres)
    {
        $this->genres = $genres();
    }

    /**
     * @return null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param null $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getFormData()
    {
        return $this->formData;
    }

    /**
     * @param mixed $formData
     */
    public function setFormData($formData)
    {
        $this->formData = $formData;
    }


}