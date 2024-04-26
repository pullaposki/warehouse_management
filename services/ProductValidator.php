<?php
require_once __DIR__ . '/../utils/OperationResult.php';

class ProductValidator
{


  public function isTypeValid($type)
  {

    if ($type === '') {
      return new OperationResult(false, 'Type cannot be empty');
    }

    $isValidInput = preg_match('/^[a-zA-Z0-9 ]+$/', $type);
    if (!$isValidInput) {
      return new OperationResult(false, 'Type can only contain letters and spaces');
    }

    if (!is_string($type) || strlen($type) > 50 || strlen($type) < 2) {
      return new OperationResult(false, 'Type must be between 2 and 50 characters');
    }

    return new OperationResult(true, 'Type is valid');
  }

  public function isPriceValid($price)
  {
    return is_numeric($price) && $price > 0;
  }
  public function isQuantityValid($quantity)
  {
    return is_numeric($quantity) && $quantity > 0;
  }
}
