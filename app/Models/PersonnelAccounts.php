<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonnelAccounts extends Model {
    protected $table = 'school_personnel'; 
    protected $allowedFields = [
        'firstname', 'middlename', 'lastname', 'email', 
        'password', 'role', 'department', 'contact_number'
    ];
    
    public function getPersonnelsAccounts($personnelID = false) {
        if ($personnelID === false) {
            return $this->findAll();
        }
        
        return $this->where(['id' => $personnelID])->first();
    }
}