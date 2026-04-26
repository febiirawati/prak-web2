<?
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan apakah rolenya admin
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, tolak akses
        abort(403, 'Akses ditolak! Hanya Admin yang boleh menghapus data.');
    }
}