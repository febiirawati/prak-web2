<?
namespace App\Services;

use App\Models\Tugas;

class TugasService
{
    public function deleteData($id)
    {
        $data = Tugas::findOrFail($id);
        return $data->delete();
    }
    // Tambahkan fungsi tambah, tampil, ubah di sini juga...
}