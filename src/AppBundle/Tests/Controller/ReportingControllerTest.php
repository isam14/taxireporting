<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReportingControllerTest extends WebTestCase
{
    public function testListcourse()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listCourse');
    }

}
