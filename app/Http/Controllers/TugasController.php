<?
namespace App\Http\Controllers;

use App\Services\TugasService;

class TugasController extends Controller
{
    protected $tugasService;

    public function __construct(TugasService $service)
    {
        $this->tugasService = $service;
    }

    public function destroy($id)
    {
        $this->tugasService->deleteData($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}