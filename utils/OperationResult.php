<?php
class OperationResult
{
  private $success;
  private $message;
  private $data;

  public function __construct(bool $success, string $message = '', $data = null)
  {
    $this->success = $success;
    $this->message = $message;
    $this->data = $data;
  }

  public function setSuccess(bool $success): void
  {
    $this->success = $success;
  }

  public function setMessage(string $message): void
  {
    $this->message = $message;
  }

  public function setData($data): void
  {
    $this->data = $data;
  }
  

  public function isSuccess(): bool
  {
    return $this->success;
  }

  public function getMessage(): string
  {
    return $this->message;
  }

  public function getData()
  {
    return $this->data;
  }
}