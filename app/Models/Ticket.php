<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Ticket extends Model { protected $fillable=['user_id','assigned_to','title','description','status','priority','category','resolved_at']; protected function casts(): array{return ['resolved_at'=>'datetime'];} public function requester(){return $this->belongsTo(User::class,'user_id');} public function assignee(){return $this->belongsTo(User::class,'assigned_to');} public function comments(){return $this->hasMany(TicketComment::class);} public function auditLogs(){return $this->morphMany(AuditLog::class,'auditable');} }
