<?php

use Nette\Security as NS;


/**
 * Users authenticator.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class Authenticator extends Nette\Object implements NS\IAuthenticator
{
	/** @var Nette\Database\Table\Selection */
	private $users;



	public function __construct(Nette\Database\Table\Selection $users)
	{
		$this->users = $users;
	}



	/**
	 * Performs an authentication
	 * @param  array
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		$row = $this->users->where('username', $username)->fetch();

		if (!$row) {
			throw new NS\AuthenticationException("Uživatel '$username' nebyl nalezen.", self::IDENTITY_NOT_FOUND);
		}

		if ($row->password !== $this->calculateHash($password)) {
			throw new NS\AuthenticationException("Neplatné heslo.", self::INVALID_CREDENTIAL);
		}

		unset($row->password);
		return new NS\Identity($row->id, $row->role, $row->toArray());
	}



	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
//	public function calculateHash($password)
//	{
//		return md5($password . str_repeat('*enter any random salt here*', 10));
//	}
        
        public function calculateHash($password)
        {
            return hash('sha512', $password);
        }
        
        public function setPassword($id, $password)
        {
            $this->users->where(array('id' => $id))
                ->update(array('password' => $this->calculateHash($password)));
        }

}
