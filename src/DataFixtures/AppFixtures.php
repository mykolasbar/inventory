<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getItemData() as $itemleData) {
            $item = new Item();

            $item->setTitle($itemleData['title']);
            $item->setPrice($itemleData['price']);
            $item->setAmount($itemleData['amount']);

            $manager->persist($item);
        }

        $manager->flush();
    }

    /**
     * @return iterable<array>
     */
    protected function getItemData(): iterable
    {
        yield [
            'title' => 'Duona',
            'price' => 1.20,
            'amount' => 10,
            ];

        yield [
            'title' => 'Batonas',
            'price' => 1,
            'amount' => 12,
        ];

        yield [
            'title' => 'Druska',
            'price' => 1.50,
            'amount' => 20,
        ];

        yield [
            'title' => 'Šampūnas',
            'price' => 2.20,
            'amount' => 8,
        ];

        yield [
            'title' => 'Aliejus',
            'price' => 3,
            'amount' => 7,
        ];
    }

}
