<?php 
  class Languages {
    // DB stuff
    private $conn;
    private $table = 'languages';

    // Post Properties
    public $id;
    public $language;
    
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Languages
    public function read() {
      // Create query
      $query = 'SELECT 
            p.id,
            p.language
          FROM
            ' . $this->table . ' p ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }    

	// Create Post
    public function create() {
      // Create query
      $query = 'INSERT INTO ' . 
          $this->table . '
        SET
          language = :lang';
          

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->language = htmlspecialchars(strip_tags($this->language));
     

      // Bind data
      $stmt->bindParam(':lang', $this->language);
     
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
  }