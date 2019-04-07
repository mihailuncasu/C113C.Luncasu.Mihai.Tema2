<?php

class li extends Markup {
    static function begin($tagName, $properties, $content) {
        echo $tagName;
    }
    
    static function end() {
        echo '</li>';
    }
}