<?php

namespace App\Models;

use App\Core\Model;

class Contact extends Model {

    // TODO: add universal create function to base model class
    public function create($attributes) {
        // TODO: extract database configuration
        $pdo = new \PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));
        $stmt = $pdo->prepare('INSERT INTO contacts (subject, email, body) VALUES (:subject, :email, :body)');
        $stmt->bindParam(':subject', $attributes['subject']);
        $stmt->bindParam(':email', $attributes['email']);
        $stmt->bindParam(':body', $attributes['body']);
        $stmt->execute($attributes);

        // add value to attribute array so we can access them later
        $this->populate($attributes);

        return $this;
    }

    public static function all()
    {
        $pdo = new \PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));
        $stmt = $pdo->prepare('SELECT * FROM contacts');
        $stmt->execute();

        // $contacts = $stmt->fetchAll(\PDO::FETCH_CLASS, Contact::class);
        $contacts = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $contacts;
    }
}