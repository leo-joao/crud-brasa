<?php

namespace App\Models;

use CodeIgniter\Model;

class MensagensModel extends Model
{
    protected $table            = 'messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sender',
        'receiver',
        'content',
        'teacher_answer',
    ];
}
