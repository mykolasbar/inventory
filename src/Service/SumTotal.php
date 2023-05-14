<?php
    namespace App\Service;

    class SumTotal {

        public $totalprice;
        public $totalitems;

        public function getSumTotal($allItems) : array {
            forEach($allItems as $item) {
                $this->totalprice += $item->getPrice();
                $this->totalitems += $item->getAmount();
            }
    
            return ['pricetotal' => $this->totalprice, 'amounttotal' => $this->totalitems];
        }
    }
?>