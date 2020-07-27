<?php 

class Student {
    private $id;
    private $fname = "";
    private $lname = "";
    private $conn;


    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function add($fname=null, $lname=null) {
        if (($fname == null) && ($lname == null)) {
            return FALSE;
        }

        $this->fname = ($fname != null) ? $fname : $this->fname;
        $this->lname = ($fname != null) ? $lname : $this->lname;

        try {
            $sql = "INSERT INTO student (firstname, lastname) values (:fname, :lname)";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            
            return $stmt->execute();
        }
        catch(PDOException $e) {
            $e->getMessage();
        }

        return FALSE;
    }
    

    public function view_students($offset=0, $per_page=10)
    {
        try {
            $sql = "SELECT * FROM student LIMIT :offset, :counts";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':counts', $per_page, PDO::PARAM_INT);
            
            if($stmt->execute()) {
                $res = array();
                while($fetch=$stmt->fetch(PDO::FETCH_OBJ)) {
                    $res[] = $fetch;
                }

                return $res;
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }

        return FALSE;
    }

}