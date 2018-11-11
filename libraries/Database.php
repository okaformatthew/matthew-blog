<?php
class Database{
    public  $host = DB_HOST;
    public  $user = DB_USER;
    public  $pass = DB_PASS;
    public  $db_name = DB_NAME;

    public $link;
    public $error;

    //Constructor
    public function __construct()
    {
        $this->connect();
    }
    //DB Connect Function
    private function connect(){
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        //Check Connection
        if(!$this->link){
            $this->error = 'Connection Failed: '.$this->link->connect_error;
            return false;
        }
    }

    /**************
     * Select Method
     ***************
     * @param $query
     * @return bool
     */
    public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    /**********
     * INSERT FUNCTION
     **********
     * @param $query
     */
    public function insert($query){
     $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

     /**********
      * Validate Insert
      ***********/
         if($insert_row){
             header("Location:index.php?msg=".urlencode("Post Added"));
             exit();
         }else{
             die("Error: (".$this->link->errno.")".$this->link->error);
         }
    }

    /*******
     * @param $query
     * Update Post Function
     */
    public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row){
            header("Location:index.php?msg=".urlencode("Post Updated"));
            exit();
        }else{
            die("Error: (".$this->link->errno.")".$this->link->error);
        }
    }

    /***************
     * delete post function
     * @param $query
     */
    public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->errror.__LINE__);
        if($delete_row){
            header("Location:index.php?msg=".urlencode("Post Deleted"));
            exit();
        }else{
            die("Error: (".$this->link->errno.")".$this->link->error);
        }
    }
}