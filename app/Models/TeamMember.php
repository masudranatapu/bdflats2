<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table        = 'web_team_members';
    protected $primaryKey   = 'id';

    public function getTeamMembers()
    {
        return TeamMember::where('is_active',1)->get();
    }
}
