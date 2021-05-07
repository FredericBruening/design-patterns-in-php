<?php


namespace SpecificationPattern;


class CustomersRepository {

    protected $customers;

    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }

    public function all()
    {
        return $this->customers;
    }

    public function bySpecification($specification)
    {
        return array_filter($this->customers, function ($customer) use ($specification) {
            return $specification->isSatisfiedBy($customer);
        });
    }
}