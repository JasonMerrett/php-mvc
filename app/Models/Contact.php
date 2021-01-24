<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Db;

class Contact extends Model {

    public function create($attributes) {
        $pdo = Db::instance()->getConnection();
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
        $pdo = Db::instance()->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM contacts');
        $stmt->execute();

        $contacts = $stmt->fetchAll($pdo::FETCH_CLASS, Contact::class);

        return $contacts;
    }
}