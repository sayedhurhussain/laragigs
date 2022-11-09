<?php
namespace App\Models;

class Listing {
    public static function all() {
        return [
            [
                'id' => 1,
                'title' => 'listing One',
                'description' => 'But they are not helping me to format Laravel Blade Codes
                [blade.php files]. I mean they are not auto indenting the codes as I expected.
                But I have seen blade codes online which are well indented in visual studio Code IDE.',
                ],
                [
                'id' => 2,
                'title' => 'listing Two',
                'description' => 'But they are not helping me to format Laravel Blade Codes
                [blade.php files]. I mean they are not auto indenting the codes as I expected.
                But I have seen blade codes online which are well indented in visual studio Code IDE.',
                ]
                ];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
