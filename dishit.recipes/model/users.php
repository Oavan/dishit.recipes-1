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

function insertUser($username, $password, $email){
    global $db;

    extract($_REQUEST);

    $query = "INSERT INTO users(username, email, password, admin, created, modified) 
                                values (
                                    :username,
                                    :email,
                                    :password,
                                    FALSE, 
                                    NOW(),
                                    NOW())"; // approve by default for testing
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', sha1($password));


        $statement->execute();
        $statement->closeCursor();

        if($statement->rowCount()==1){
            return $db->lastInsertId();
        } else {
            return $statement->rowCount();
        }
    }

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

    function getUserName($user_id){
        global $db;

        $query = "Select username From users
						Where id=:user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);

        $statement->execute();

        $results = $statement->fetch();

        $statement->closeCursor();
        return $results['username'];
    }

    function changePassword($user_id, $password, $passwordConfirmation){
	    if(verifyPasswordMatch($password,$passwordConfirmation)){
            return updatePassword($user_id, $password);
        }
	    return false;
    }
    function verifyPasswordMatch($password, $passwordConfirmation){
	    if($password === $passwordConfirmation){
	        return true;
        }
	    return false;
    }

    function updatePassword($user_id,$password){
	    global $db;
        $query = "Update users
							  Set password=:password
							  Where id=:user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':password',sha1($password)); // update this to use a better hashing algorithm
        $statement->bindValue(':username',$user_id);
        $statement->execute();
        $statement->closeCursor();

        return $statement->rowCount();  // return 1 if successful
    }

    function registerUser($username,$password,$passwordConfirmation,$email){
	    if(verifyPasswordMatch($password,$passwordConfirmation)){
	        return insertUser($username,$password,$email); // return user_id or 0 if no rows added
        } else { return 0; }
    }

function getuserrecipes($user_id){
    global $db;
    $query = "Select r.id, r.title, u.username from recipes r inner join users u on u.id = r.user_id where r.user_id = :user_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id',$user_id);
    $statement->execute();

    $results = $statement->fetchAll();

    $statement->closeCursor();

    return $results;



}
?>