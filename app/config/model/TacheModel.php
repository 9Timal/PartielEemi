<?php

class Task {
    private  $id;
    private  $title;
    private  $description;
    private  $status;
    private  $date;

    
    public function __construct( $title,  $description,  $status, $date,$id = NULL) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->date = $date;
    }

    
    public function getId() {
        return $this->id;
    }
    public function setId( $id) {
        $this->id = $id;
    }

    
    public function getTitle() {
        return $this->title;
    }
    public function setTitle( $title) {
        $this->title = $title;
    }

  
    public function getDescription() {
        return $this->description;
    }
    public function setDescription( $description) {
        $this->description = $description;
    }

 
    public function getStatus() {
        return $this->status;
    }
    public function setStatus( $status) {
        $this->status = $status;
    }

  
    public function getDate() {
        return $this->date;
    }
    public function setDate( $date) {
        $this->date = $date;
    }
}



