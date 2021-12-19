<?php


namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IArticleRepository
{
    public function findOrFailById(int $id);
    
    public function all();
    
    public function paginated(int $perPage);
    
    public function newestPaginated(int $perPage);
    
    public function newestPaginatedByUserId(int $userId, int $perPage);
    
    public function store(array $data);
    
    public function update(int $id, array $data);
    
    public function destroy(int $id);
    
}
