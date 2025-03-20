<?php

namespace HalloVerden\BrregHttpClient\Exception;

use HalloVerden\BrregHttpClient\Entity\BrregDeletedEntity;

final class BrregDeletedEntityException extends \Exception {

  public function __construct(
    /** Might not exist due to legal reasons */
    public readonly ?BrregDeletedEntity $deletedEntity = null,
    string                              $message = "Brreg Entity deleted",
    int                                 $code = 0,
    ?\Throwable                         $previous = null
  ) {
    parent::__construct($message, $code, $previous);
  }

}
