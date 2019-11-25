<?php

namespace App\Models;

use Core\Model;

class Contact extends Model {

    public function create($attributes) {
        $pdo = new PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));
        $pdo->prepare('INSERT INTO contacts (subject, email, body) VALUES (:subject, :email, :body)');
        $pdo->execute($attributes);

        $this->populate($attributes);

        return $this;
    }
}