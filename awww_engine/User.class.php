<?php
class User {
  
  public static $USER_TYPES = array(
    'UNAUTHORISED'  => 0,
    'STUDENT'       => 1,
    'INSTRUCTOR'    => 2,
    'ADMIN'         => 3
  );
  
  public static $PRIVILEGED_GROUP = 'PRIVILEGED';
  
  private $id;
  private $mail;
  private $type;
  private $name;
  
  public function __construct($id, $mail, $type, $name) {
    $this->id    = $id;
    $this->mail  = $mail;
    $this->type  = $type;
    $this->name  = $name;
  }
  
  public function getMail() {
    return $this->mail;
  }
  
  public function getID() {
    return $this->id;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function canLogin() {
    return $this->type > self::$USER_TYPES['UNAUTHORISED'];
  }
  
  public function isPrivileged() {
    return $this->type > self::$USER_TYPES['STUDENT'];
  }
  
  public function isAdmin() {
    return $this->type >= self::$USER_TYPES['ADMIN'];
  }
}