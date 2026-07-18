<?php
namespace App\DTOs;

class BioData
{

public function __construct(

public string $name,

public int $yearsExperience,

public array $technologies,

public ?string $degree,

public ?string $fieldOfStudy,

public ?string $university,

public ?int $graduationYear,

public ?string $location,

public ?string $targetRole,

public ?string $github,

public ?string $linkedin,

public ?string $portfolio,

public ?string $website_url,

){}


public function toArray(): array
{
    return get_object_vars($this);
}


}
