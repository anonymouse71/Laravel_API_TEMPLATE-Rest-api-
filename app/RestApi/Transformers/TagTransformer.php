<?php

namespace RestApi\Transformers;

class TagTransformer extends Transformer{

    public function transform($tag){
        return [
            'name' => $tag['name']
        ];
    }

}