<?php

class View extends Model
{
    public function showActivities()
    {
        return $this->showActivitiesM();
    }
    public function showActivity($activity_id)
    {
        return $this->showActivityM($activity_id);
    }
    public function editActivity($name, $time, $descirption, $activity_id): void
    {
        $this->updateActivityM($name, $time, $descirption, $activity_id);
    }
}
