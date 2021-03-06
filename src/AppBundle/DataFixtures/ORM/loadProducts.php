<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Product;
use Symfony\Component\Yaml\Yaml;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $products = Yaml::parse(__DIR__.'/../products.yml');

        foreach($products['products'] as $item){

            $product = new Product();
            $product->setName($item[0]);
            $product->setDescription($item[1]);
            $product->setPrice($item[2]);
            $product->setStock($item[3]);
            $product->setStatus($item[4]);
            $product->setImage($item[5]);

            $manager->persist($product);
        }

        $manager->flush();
    }
}