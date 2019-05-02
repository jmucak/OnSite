<?php

namespace App\Helpers;

use App\Story;

class Slug {

    public function createSlug($title, $id = 0) {
        
        // Normalize slug
        $slug = str_slug($title);

        $slugs = $this->getRelatedSlugs($slug, $id);

        // if slug doesn't exists
        if(!$slugs->contains('slug', $slug)) {
            return $slug;
        }

        // append number if slug is used
        for($i=1; $i<=100; $i++){
            $newSlug = $slug . '-' . $i;
            if(!$slugs->contains('slug', $newSlug)){
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0) {
    
        $story = Story::select('slug')->where([
            ['slug', 'like', $slug.'%'],
            ['id', '<>', $id]
        ])->get();
        

        return $story;
    }
}