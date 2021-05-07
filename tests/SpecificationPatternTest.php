<?php

use PHPUnit\Framework\TestCase;
use SpecificationPattern\Customer;
use SpecificationPattern\CustomerIsGold;
use SpecificationPattern\CustomersRepository;

class SpecificationPatternTest extends TestCase {


    protected $customers;

    function setUp(): void
    {
        $this->customers = [
            new Customer('gold'),
            new Customer('silver'),
            new Customer('bronze'),
            new Customer('gold'),
        ];
    }

    /** @test */
    function it_fetches_all_customers()
    {
        $repository = new CustomersRepository($this->customers);

        $this->assertCount(4, $repository->all());
    }

    /** @test */
    function a_customer_is_gold_if_it_has_the_gold_type()
    {
        $specification = new CustomerIsGold;

        $goldCustomer = new Customer('gold');
        $silverCustomer = new Customer('silver');

        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }

    /** @test */
    function it_fetches_all_customers_who_match_a_given_specification()
    {
        $customers = new CustomersRepository($this->customers);

        $results = $customers->bySpecification(new CustomerIsGold);

        $this->assertCount(2, $results);
    }
}