<?php 

namespace Kirby\Cms;

use \Yaml;


class BlueprintMapSection extends BlueprintSection {
    protected $storage;
    protected $height;

    public function setStorage($value = []) {
        $this->storage = $value;
    }

    public function setHeight($height = 'medium') {
        $this->height = $height;
    }

    public function toArray():array {
        return [
            'apikey' => kirby()->option('rasteiner/kn-map-section/apikey'),
            'height' => $this->height,
            'storage' => $this->storage
        ];
    }
}

\Kirby::plugin('rasteiner/kn-map-section', [
    'fields' => [
        'latlng' => [

        ],
        'geocoded' => [
            'props' => [
                'apikey' => function() {
                    return kirby()->option('rasteiner/kn-map-section/apikey');
                },
                'value' => function($value = '') {
                    return Yaml::decode($value);
                }
            ]
        ]
    ]
]);