<?php

class User{
    private $id;
    private $email;
    private $password;

    private function __construct()
    {

    }
   public function get_id(){
        return $this->id;
   }
   public function get_email(){
    return $this->email;
}
    public static function create(string $email, string $password, $conn): User
    {
        $user = new User();
        $user->email = $email;
        $user->password = md5($password);

        $stmt = $conn->prepare("INSERT INTO `users` (`email` ,`password`) VALUES (?,?)");
        $stmt->bind_param('ss',$user->email, $user->password);

        $stmt->execute();

        $result = $stmt->get_result();
        print_r($result->fetch_object(__CLASS__));
        return $user;
    }
    public static function fetchOne(string $email, string $password, $conn): User
    {
        $md5password = md5($password);

        $stmt = $conn->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = ? and `password` = ?");
        $stmt->bind_param('ss', $email, $md5password);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
        
        $user = $result->fetch_object('User');
        var_dump($user);
        return $user;
    }
    // public static function fetchAll(): User
    // {
    //     $md5password = md5($password);

    //     $stmt = $conn->prepare("SELECT `id`, `email` FROM `users` WHERE `email` = ? and `password` = ?");
    //     $stmt->bind_param('ss', $email, $md5password);
    
    //     $stmt->execute();
    
    //     $result = $stmt->get_result();
    
    // }
    
}
