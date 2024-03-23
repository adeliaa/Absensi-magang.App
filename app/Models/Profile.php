<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Profile extends Model
{
    protected $table = 'mahasiswa'; // Menetapkan tabel yang digunakan oleh model Profile

    protected $fillable = ['nama', 'email', 'universitas', 'unit'];

    // Aturan validasi
    public static function rules($id = null)
    {
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswa,email,' . $id,
            'universitas' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
        ];
    }

    // Validasi data
    public function validate(array $data, $id = null)
    {
        return Validator::make($data, self::rules($id));
    }
}
