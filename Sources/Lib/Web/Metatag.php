<?php

namespace ColibriLabs\Lib\Web;

use Colibri\Collection\ArrayCollection;
use Colibri\Html\HtmlElement;

/**
 * Class Metatag
 * @package ColibriLabs\Lib\Web
 */
class Metatag
{
  
  /**
   * @var ArrayCollection
   */
  protected $metatags;
  
  /**
   * Metatag constructor.
   */
  public function __construct()
  {
    $this->metatags = new ArrayCollection();
  }
  
  /**
   * @param $name
   * @param array $attributes
   * @return HtmlElement
   */
  public function setTagName($name, array $attributes)
  {
    $tag = new HtmlElement($name, $attributes, null);
    
    $hash = sha1(json_encode([$name, $attributes]));
    $this->metatags->offsetSet($hash, $tag);
    
    return $tag;
  }
  
  /**
   * @param $name
   * @param array $attributes
   * @return $this
   */
  public function removeTag($name, array $attributes)
  {
    $hash = sha1(json_encode([$name, $attributes]));
    $this->metatags->offsetUnset($hash);
    
    return $this;
  }
  
  /**
   * @param array $attributes
   * @return $this
   */
  public function setMetatag(array $attributes)
  {
    $this->setTagName('meta', $attributes)->setSingle(true);
    
    return $this;
  }
  
  /**
   * @param array $keywords
   * @return $this
   */
  public function setKeywords(array $keywords)
  {
    $this->setMetatag(['name' => 'keywords', 'content' => implode(',', $keywords),]);
    
    return $this;
  }
  
  /**
   * @param string $description
   * @return $this
   */
  public function setDescription($description)
  {
    $this->setMetatag(['name' => 'description', 'content' => $description,]);
    
    return $this;
  }
  
  /**
   * @param string $imagePath
   * @return $this
   */
  public function setOgImage($imagePath)
  {
    $this->setMetatag(['property' => 'og:image', 'content' => $imagePath,]);
    
    return $this;
  }
  
  /**
   * @param string $siteName
   * @return $this
   */
  public function setOgSiteName($siteName)
  {
    $this->setMetatag(['property' => 'og:site_name', 'content' => $siteName,]);
    
    return $this;
  }
  
  /**
   * @param string $title
   * @return $this
   */
  public function setOgTitle($title)
  {
    $this->setMetatag(['property' => 'og:title', 'content' => $title,]);
    
    return $this;
  }
  
  /**
   * @param string $description
   * @return $this
   */
  public function setOgDescription($description)
  {
    $this->setMetatag(['property' => 'og:description', 'content' => $description,]);
    
    return $this;
  }
  
  /**
   * @param string $name
   * @return $this
   */
  public function setTwitterCard($name)
  {
    $this->setMetatag(['name' => 'twitter:card', 'content' => $name,]);
    
    return $this;
  }
  
  /**
   * @param string $title
   * @return $this
   */
  public function setTwitterTitle($title)
  {
    $this->setMetatag(['name' => 'twitter:title', 'content' => $title,]);
    
    return $this;
  }
  
  /**
   * @param string $description
   * @return $this
   */
  public function setTwitterDescription($description)
  {
    $this->setMetatag(['name' => 'twitter:description', 'content' => $description,]);
    
    return $this;
  }
  
  /**
   * @param string $imagePath
   * @return $this
   */
  public function setTwitterImage($imagePath)
  {
    $this->setMetatag(['name' => 'twitter:image', 'content' => $imagePath,]);
    
    return $this;
  }
  
  /**
   * @return string
   */
  public function render()
  {
    return sprintf("%s\n", implode("\n", $this->metatags->toArray()));
  }
  
}