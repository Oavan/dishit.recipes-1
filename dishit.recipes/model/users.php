<?php
	function createUserPasswords() {
		global $db;
		
		$query = "Select username from users";
		$statement = $db->prepare($query);
		$statement->execute();
		
		$results = $statement->fetchAll();
		
		$statement->closeCursor();
		
		foreach ($results as $user) {
			$query = "Update users
							  Set password=:password
							  Where username=:username";
			$statement = $db->prepare($query);
			$statement->bindValue(':password',sha1($user['userName'])); // update this to use a better hashing algorithm
			$statement->bindValue(':username',$user['username']);
			$statement->execute();
			$statement->closeCursor();
		}//end foreach				  
		echo "Done";
	}//end createUserPasswords
	
	// This function looks for a username in the database and returns a 1 if found, 0 if not
	function isUser($username){
		global $db;
		
		$query = "Select * from users where username=:username";
		$statement = $db->prepare($query);
		$statement->bindValue(':username', $username);
		$statement->execute();
		
		$statement->closeCursor();
		
		return $statement->rowCount();
	}//end isUser
	
	// This function returns the password for a given username
	function getUserPassword($username){
		global $db;
		
		$query = "Select password From users
						Where username=:username";   
		$statement = $db->prepare($query);
		$statement->bindValue(':username', $username);

		$statement->execute();
		
		$results = $statement->fetch();
		
		$statement->closeCursor();
		return $results['password'];
	} //end getUserPassword
	
	// this function accepts a username and password as parameters and returns TRUE
	//	if username and password match, otherwise FALSE is returned
	function isAuthorizedUser($username, $password){

		if(isUser($username)){
			if(sha1($password) == getUserPassword($username))
				return true;
		}
		return false;		
	} //end isAuthorizedUser

    function getUserID($username){
	    global $db;

        $query = "Select id From users
						Where username=:username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);

        $statement->execute();

        $results = $statement->fetch();

        $statement->closeCursor();
        return $results['id'];
    }

?>