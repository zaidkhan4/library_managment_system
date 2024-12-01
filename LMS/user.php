<?php
session_start();
class Library {
    private $db_name = "mysql:host=localhost;dbname=lms";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO($this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //insert data

    public function insert_data() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $sql = $this->conn->prepare("SELECT * FROM  user  WHERE email=:email");
        $data = [
            ':email' => $email,
        ];
        $sql->execute($data);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if($result){
            echo "This email id already exist";
        }else{
            $sql = $this->conn->prepare("INSERT INTO  user (name, email, password, mobile, address) VALUES
            (:name, :email, :password, :mobile, :address) ");
            $data = [
                ':name' => $name,
                ':email' => $email,
                ':password' => $password,
                ':mobile' => $mobile,
                ':address' => $address,
            ];
            $res = $sql->execute($data);
            if($res){
                // echo "Data insert successfully";
                header("location: index.php");
            }else{
                echo "Error not inserted";
            }
        }
    }

    //user login code
    public function login_form() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = $this->conn->prepare("SELECT * FROM  user  WHERE email=:email");
        $data = [
            ':email' => $email,
        ];
        $sql->execute($data);
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            if($row['email'] == $email){
                if($row['password'] == $password){
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    header("location: user_dashboard.php");
                }else{
                    echo "<script type='text/javascript'>
                        alert('Wrong Password');
                    </script>";
                }
            }
        }
    }       
            
            
     //view profile code   
     public function view_profile() {            
        $email = $_SESSION['email'];
        $sql = $this->conn->prepare("SELECT * FROM user WHERE email = :email");
        $sql->execute([':email' => $email]);
                               
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        
        return [
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'address' => $address,
        ];             
                
    }   
     
        //update data
        public function update_profile(){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];

            $sql = $this->conn->prepare("UPDATE  user  SET  name=:name, email=:email, mobile=:mobile, address=:address ");
            $data = [
                ':name' => $name,
                ':email' => $email,
                ':mobile' => $mobile,
                ':address' => $address,
            ];
            $res = $sql->execute($data);
            if($res){
                 header("location: user_dashboard.php");
            }else{
                echo "Error not updated";
            }
        }

        //update password
        public function update_password(){
            $email = $_SESSION['email'];
            $sql = $this->conn->prepare("SELECT * FROM user WHERE email = :email");
            $sql->execute([':email' => $email]);
                                   
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            $password = $row['password'];
            if($password == $_POST['old_password']){
                $new_pass = $_POST['new_password'];
                $sql = $this->conn->prepare("UPDATE  user  SET  password= :password  WHERE email = :email");
                $re = $sql->execute([
                    ':email' => $email,
                    ':password' => $new_pass,
                ]);
                if($re){
                    header("location: user_dashboard.php");
                }else{
                    echo "Error password not updated";
                }
            }
        }

    //admin login form
    public function admin_login_form(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = $this->conn->prepare("SELECT * FROM  admins  WHERE email=:email");
        $data = [
            ':email' => $email,
        ];
        $sql->execute($data);
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            if($row['email'] == $email){
                if($row['password'] == $password){
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    header("location: admin_dashboard.php");
                }else{
                    echo "<script type='text/javascript'>
                        alert('Wrong Password');
                    </script>";
                }
            }
        }
    }

    //admin profile code
    public function admin_view_profile(){
        $email = $_SESSION['email'];
        $sql = $this->conn->prepare("SELECT * FROM admins WHERE email = :email");
        $sql->execute([':email' => $email]);
                               
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        
        return [
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
        ];
    }

    //update
    public function admin_update_profile(){
        $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];

            $sql = $this->conn->prepare("UPDATE  admins  SET  name=:name, email=:email, mobile=:mobile ");
            $data = [
                ':name' => $name,
                ':email' => $email,
                ':mobile' => $mobile,
            ];
            $res = $sql->execute($data);
            if($res){
                 header("location: admin_dashboard.php");
            }else{
                echo "Error not updated";
            }
    }

    //admin update password
    public function admin_update_password(){
        $email = $_SESSION['email'];
        $sql = $this->conn->prepare("SELECT * FROM admins WHERE email = :email");
        $sql->execute([':email' => $email]);
                               
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        $password = $row['password'];
        if($password == $_POST['old_password']){
            $new_pass = $_POST['new_password'];
            $sql = $this->conn->prepare("UPDATE  admins  SET  password= :password  WHERE email = :email");
            $re = $sql->execute([
                ':email' => $email,
                ':password' => $new_pass,
            ]);
            if($re){
                header("location: admin_dashboard.php");
            }else{
                echo "Error password not updated";
            }
        }
    }

    
    //register user coder
    public function get_user_count() {
        $user_count = 0; // Default value in case the query returns no result
        $query = $this->conn->prepare("SELECT COUNT(*) AS user_count FROM user");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC); // Fetch the result
        if ($row) { // Check if a result is returned
            $user_count = $row['user_count'];
        }
        return $user_count;
    }

    //books code
    public function get_book_count() {
        $book_count = 0; // Default value in case the query returns no result
        $query = $this->conn->prepare("SELECT COUNT(*) AS book_count FROM books");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC); // Fetch the result
        if ($row) { // Check if a result is returned
            $book_count = $row['book_count'];
        }
        return $book_count;
    }

    //category code
    public function get_category_count() {
        $cat_count = 0; // Default value in case the query returns no result
        $query = $this->conn->prepare("SELECT COUNT(*) AS cat_count FROM category");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC); // Fetch the result
        if ($row) { // Check if a result is returned
            $cat_count = $row['cat_count'];
        }
        return $cat_count;
    }

    //authors code
    public function get_author_count() {
        $author_count = 0; // Default value in case the query returns no result
        $query = $this->conn->prepare("SELECT COUNT(*) AS author_count FROM authors");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC); // Fetch the result
        if ($row) { // Check if a result is returned
            $author_count = $row['author_count'];
        }
        return $author_count;
    }

    //issue book code
    public function issue_book_count() {
        $iss_book = 0; // Default value in case the query returns no result
        $query = $this->conn->prepare("SELECT COUNT(*) AS iss_book FROM issue_books");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC); // Fetch the result
        if ($row) { // Check if a result is returned
            $iss_book = $row['iss_book'];
        }
        return $iss_book;
    }

    //select uer register code
    public function user_select(){
        $sql = $this->conn->prepare("SELECT * FROM  user ");
        $sql->execute();
        $resu = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resu;
    }

    //register book code
    public function regbook_select_data() {
        $sql = $this->conn->prepare("SELECT books.book_name,books.book_no,books.book_price,authors.author_name
        FROM books left join authors on books.author_id = authors.author_id ");
        $sql->execute();
        $resu = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resu;
    }

    //register category code
    public function regcat_select() {
        $sql = $this->conn->prepare("SELECT * FROM  category ");
        $sql->execute();
        $resu = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resu;
    }

    //register authors code
    public function author_select() {
        $sql = $this->conn->prepare("SELECT * FROM  authors ");
        $sql->execute();
        $resu = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resu;
    }

    //register issued book code
    public function issued_book_select() {
        $sql = $this->conn->prepare("
            SELECT 
                issue_books.books_name,
                issue_books.books_author,
                issue_books.books_no,
                user.name
            FROM 
                issue_books
            LEFT JOIN 
                user 
            ON 
                issue_books.id = user.id
        ");
        $sql->execute(); 
        $resu = $sql->fetchAll(PDO::FETCH_ASSOC); 
        return $resu; 
    }

    //authors code
    public function author_fetch_data() {
        $sql = $this->conn->prepare("SELECT * FROM  authors ");
        $sql->execute();
        $resu = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resu;
    }
    
    //insert add book data
    public function insert_add_book_data() {
        $book_name = $_POST['book_name'];
        $book_author = $_POST['book_author'];
        $cat_name = $_POST['book_cat'];
        $book_no = $_POST['book_no'];
        $book_price = $_POST['book_price'];
    
        $sql = $this->conn->prepare("INSERT INTO books (book_name, author_id, cat_id, book_no, book_price)
        VALUES (:book_name, :author_id, :cat_id, :book_no, :book_price)");
    
        $data = [
            ':book_name' => $book_name,
            ':author_id' => $book_author,
            ':cat_id' => $cat_name,
            ':book_no' => $book_no,
            ':book_price' => $book_price,
        ];
    
         $sql->execute($data);
       
    }
    
    //category data
    public function category_data(){
        $catname = $_POST['cat_name'];
    
        $sql = $this->conn->prepare("INSERT INTO  category (cat_name) VALUES (:cat_name) ");
    
        $data = [
            ':cat_name' => $catname,
        ];
    
         $sql->execute($data);
    }

    //author data
    public function author_data(){
        $authorname = $_POST['author_name'];
    
        $sql = $this->conn->prepare("INSERT INTO  authors (author_name) VALUES (:author_name) ");
    
        $data = [
            ':author_name' => $authorname,
        ];
    
         $sql->execute($data);
    }

    //insert_issue_book_data
    public function insert_issue_book_data() {
        $book_name = $_POST['book_name'];
        $book_author = $_POST['book_author'];
        $book_no = $_POST['book_no'];
        $student_id = $_POST['student_id'];
        $issue_date = $_POST['issue_date'];

        $sql = $this->conn->prepare("INSERT INTO issue_books (books_name, books_author, books_no, student_id, issue_date)
         VALUES (:books_name, :books_author, :books_no, :student_id, :issue_date)");

        $data = [
            ':books_name' => $book_name,
            ':books_author' => $book_author,
            ':books_no' => $book_no,
            ':student_id' => $student_id,
            ':issue_date' => $issue_date,
        ];
    
        $sql->execute($data);
    
    }
    


    

}
