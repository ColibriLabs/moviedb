<?php

namespace ColibriLabs\Lib\Collection;

use Colibri\Collection\AbstractLazyCollection;
use Colibri\Collection\Collection;
use Colibri\Connection\Statement\StatementIterator;

/**
 * Class ResultSetLazyCollection
 * @package ColibriLabs\Lib\Collection
 */
class ResultSetLazyCollection extends AbstractLazyCollection
{
  
  /**
   * @var StatementIterator
   */
  protected $statementIterator;
  
  /**
   * @param StatementIterator $statementIterator
   * @return $this
   */
  public function setStatementIterator(StatementIterator $statementIterator)
  {
    $this->statementIterator = $statementIterator;
    
    return $this;
  }
  
  /**
   * @inheritdoc
   */
  protected function doInitialize()
  {
    $this->collection = new Collection(iterator_to_array($this->statementIterator));
  }
  
}