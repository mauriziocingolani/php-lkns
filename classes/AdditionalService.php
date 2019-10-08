<?php

namespace mauriziocingolani\lkns\classes;

/**
 * Description of AdditionalService
 *
 * @property string $name The service’s general category.
 * @property AdditionalServiceItem[] $items The list of the items, of the same category.
 * 
 * @author Maurizio Cingolani <mauriziocingolani74@gmail.com>
 * @version 1.0
 */
class AdditionalService {

    public $name;
    public $items;

    /* Metodi */

    public function __construct($params) {
        foreach ($params as $name => $value) {
            if ($name == 'items') :
                foreach ($value as $i) :
                    $this->items[] = new AdditionalServiceItem($i);
                endforeach;
            else :
                $this->$name = $value;
            endif;
        }
    }

    /* Metodi statici */
}
