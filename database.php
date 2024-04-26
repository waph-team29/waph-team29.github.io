
<?php  

	$mysqli= new mysqli('localhost',
						'waph-team29',
						'Pa$$w0rd',
						'waph_team');
	if ($mysqli->connect_errno){
		printf("DATABASE COONECTION FAILED: %s\n", $mysqli->connect_error);
		return FALSE;
	}
	
  	function addnewuser($username, $password,$Fullname,$Email) {
		 global $mysqli;
		 $prepared_sql ="INSERT INTO users (username,password,fullname,otheremail) VALUES (?,md5(?),?,?);";
		 $stmt = $mysqli->prepare($prepared_sql);
		 $stmt-> bind_param("ssss",$username,$password,$Fullname,$Email);
		 if($stmt->execute()) return TRUE;
		  // echo "DEBUG>sql= $sql";	
		  return FALSE;
  	}

  	function checklogin_mysql($username, $password) {
		 global $mysqli;
		 $prepared_sql ="SELECT * FROM users WHERE username= ? AND password = md5(?);";
		 $stmt = $mysqli->prepare($prepared_sql);
		 $stmt-> bind_param("ss",$username,$password);
		 $stmt->execute();
		  // echo "DEBUG>sql= $sql";
		 $result = $stmt->get_result();
		 if($result->num_rows ==1)
		  return TRUE;
		 return FALSE;
  	}

  	/*function changepassword($username, $password) {
		 global $mysqli;
		 $prepared_sql ="UPDATE users SET password = md5(?) WHERE username= ?;";
		 $stmt = $mysqli->prepare($prepared_sql);
		 $stmt-> bind_param("ss",$username,$password);
		 if($stmt->execute()){ 
		 	return TRUE;
		    echo "DEBUG>sql= $sql";	
		 }else{
		  	return FALSE;
		  }
		 
  	}*/

  	   function changepassword($username, $password) {
       global $mysqli;
       $prepared_sql = "UPDATE users SET password = md5(?) WHERE username =?;";
       $stmt = $mysqli->prepare($prepared_sql);
       $stmt-> bind_param("ss",$password, $username);
       $stmt->execute();
       return $stmt->affected_rows == 1;
    }


   function changeprofile($Username, $Fullname, $Email, $Phone) {
        global $mysqli;
        $prepared_sql = "UPDATE users SET fullname = ?, otheremail = ?, phone = ? WHERE username = ?"; 
        $stmt = $mysqli->prepare($prepared_sql);
        $stmt->bind_param("ssss", $Fullname, $Email, $Phone, $Username);
        if($stmt->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
       
    }

    function getUserInfo($username) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
    }
  
  function createPost($title, $content, $posttime, $owner) {
        global $mysqli;
        $prepared_sql = "INSERT INTO posts (title, content, posttime, owner) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($prepared_sql);
        $stmt->bind_param("ssss", $title, $content, $posttime, $owner);
        $stmt->execute();
        return $stmt->affected_rows == 1;
    }

    function getPostsByUsername($username) {
        global $mysqli;
        $prepared_sql = "SELECT * FROM posts WHERE owner = ?";
        $stmt = $mysqli->prepare($prepared_sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function getPostByID($postID) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM posts WHERE postID = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

    function Comments($postID, $comment) {
    global $mysqli;
    $prepared_sql = "INSERT INTO comments (postID, comment) VALUES (?, ?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("is", $postID, $comment);  // Assuming postID is integer, comment is string
    $stmt->execute();
    return $stmt->affected_rows == 1;

}
function getCommentsByPostID($postID) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM comments WHERE postID = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


function deletePost($postID) {
    global $mysqli;
    
    // Delete comments associated with the post
    if (!deleteComments($postID)) {
        return false; // If deleting comments fails, return false
    }

    // Delete the post
    $prepared_sql = "DELETE FROM posts WHERE postID = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

function deleteComments($postID) {
    global $mysqli;

    $prepared_sql = "DELETE FROM comments WHERE postID = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    return true; // Assuming successful deletion of comments
}
function updatePost($postID, $title, $content) {
    global $mysqli;
    $prepared_sql = "UPDATE posts SET title = ?, content = ? WHERE postID = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssi", $title, $content, $postID);
    $stmt->execute();
    return $stmt->affected_rows == 1;
}

function getAllSuperusers() {
    global $mysqli;
    $query = "SELECT * FROM superusers";
    $result = $mysqli->query($query);
    if ($result) {
        $superusers = $result->fetch_all(MYSQLI_ASSOC);
        return $superusers;
    } else {
        return false;
    }
}



?>
