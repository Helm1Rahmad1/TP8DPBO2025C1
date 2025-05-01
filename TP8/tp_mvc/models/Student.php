<?php
class Student {
    private $conn;
    private $id;
    private $name;
    private $nim;
    private $phone;
    private $join_date;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Getters dan setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getNim() {
        return $this->nim;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getJoinDate() {
        return $this->join_date;
    }

    public function setJoinDate($join_date) {
        $this->join_date = $join_date;
    }

    // Database operations
    public function getAll() {
        $sql = "SELECT * FROM students";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function create() {
        $name = $this->name;
        $nim = $this->nim;
        $phone = $this->phone;
        $join_date = $this->join_date;

        $sql = "INSERT INTO students (name, nim, phone, join_date) VALUES ('$name', '$nim', '$phone', '$join_date')";
        return $this->conn->query($sql);
    }

    public function update() {
        $id = $this->id;
        $name = $this->name;
        $nim = $this->nim;
        $phone = $this->phone;
        $join_date = $this->join_date;

        $sql = "UPDATE students SET name='$name', nim='$nim', phone='$phone', join_date='$join_date' WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM students WHERE id=$id";
        return $this->conn->query($sql);
    }
}
?>