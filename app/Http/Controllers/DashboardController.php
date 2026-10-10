<?php
namespace App\Http\Controllers;
use App\Models\Ticket;
class DashboardController extends Controller { public function __invoke(){ $user=request()->user();$query=$user->isStaff()?Ticket::query():Ticket::where('user_id',$user->id);return view('dashboard.index',['stats'=>['total'=>(clone $query)->count(),'open'=>(clone $query)->whereIn('status',['open','in_progress'])->count(),'urgent'=>(clone $query)->where('priority','urgent')->count(),'resolved'=>(clone $query)->where('status','resolved')->count()],'tickets'=>(clone $query)->with(['requester','assignee'])->latest()->limit(8)->get()]); } }
