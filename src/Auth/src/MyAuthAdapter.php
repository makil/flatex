<?php
namespace Auth;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class MyAuthAdapter implements AdapterInterface
{
    private $password;
    private $username;

    public function __construct()
    {
        // Likely assign dependencies to properties
    }

    public function setPassword(string $password) 
    {
        $this->password = $password;
    }

    public function setUsername(string $username) 
    {
        $this->username = $username;
    }

    /**
     * Performs an authentication attempt
     *
     * @return Result
     */
    public function authenticate()
    {
        // Retrieve the user's information (e.g. from a database)
        // and store the result in $row (e.g. associative array).
        if($this->username !== 'admin@test.admin'){
            return new Result(Result::FAILURE_IDENTITY_NOT_FOUND, $this->username);
        }
        $userPasswordHash = password_hash('admin', PASSWORD_DEFAULT);
        $row = ['password' => $userPasswordHash ];

        if (password_verify($this->password, $row['password'])) {
            return new Result(Result::SUCCESS, $row);
        }

        return new Result(Result::FAILURE_CREDENTIAL_INVALID, $this->username);
    }

}