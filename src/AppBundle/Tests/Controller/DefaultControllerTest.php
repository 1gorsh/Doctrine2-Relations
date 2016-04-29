<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * PHPUnit's data providers allow to execute the same tests repeated times
     * using a different set of data each time.
     * See http://symfony.com/doc/current/cookbook/form/unit_testing.html#testing-against-different-sets-of-data.
     *
     * @dataProvider getPublicUrls
     */
    public function testPublicUrls($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);
        $this->assertTrue(
            $client->getResponse()->isSuccessful(),
            sprintf('The %s public URL loads correctly.', $url)
        );
    }

    public function getPublicUrls()
    {
        return array(
            array('/')
        );
    }
}
