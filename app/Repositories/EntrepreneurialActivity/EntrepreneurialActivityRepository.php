<?php


namespace App\Repositories\EntrepreneurialActivity;

use App\Models\EntrepreneurialActivity;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class EntrepreneurialActivityRepository extends BaseRepository implements EntrepreneurialActivityInterface
{
    public function getAllEntrepreneurialActivity(): ?Collection
    {
       $entrepreneurialActivity = EntrepreneurialActivity::all();

       return $entrepreneurialActivity;
    }

    public function saveEntrepreneurialActivity(EntrepreneurialActivity $entrepreneurialActivity): EntrepreneurialActivity
    {
        $entrepreneurialActivity->save();

        return $entrepreneurialActivity;
    }

    public function updateEntrepreneurialActivity(EntrepreneurialActivity $entrepreneurialActivity): EntrepreneurialActivity
    {
        $entrepreneurialActivity->update();

        return $entrepreneurialActivity;
    }

    public function getEntrepreneurialActivityById(int $id): ?EntrepreneurialActivity
    {
        $itemEntrepreneurialActivity = EntrepreneurialActivity::find($id);

        return $itemEntrepreneurialActivity;

    }

    public function deleteEntrepreneurialActivity(EntrepreneurialActivity $entrepreneurialActivity): void
    {
        $entrepreneurialActivity->delete();
    }
}
