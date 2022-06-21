<?php


namespace App\Repositories\EntrepreneurialActivity;


use App\Models\EntrepreneurialActivity;
use Illuminate\Database\Eloquent\Collection;

interface EntrepreneurialActivityInterface
{
    public function getAllEntrepreneurialActivity(): ?Collection;
    public function saveEntrepreneurialActivity(EntrepreneurialActivity $entrepreneurialActivity): EntrepreneurialActivity;
    public function updateEntrepreneurialActivity(EntrepreneurialActivity $entrepreneurialActivity): EntrepreneurialActivity;
    public function getEntrepreneurialActivityById(int $id): ?EntrepreneurialActivity;
    public function deleteEntrepreneurialActivity(EntrepreneurialActivity $entrepreneurialActivity): void;
}
