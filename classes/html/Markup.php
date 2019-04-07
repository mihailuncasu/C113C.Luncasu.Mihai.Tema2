<?php 

abstract class Markup {
    // M: The name of the tag;
    protected $tagName;
    
    // M: List of tag properties;
    protected $properties;
    
    // M: The begin of the tag;
    abstract static public function begin($tagName, $properties, $content);
    
    // M: The end of the tag;
    abstract static public function end();
}