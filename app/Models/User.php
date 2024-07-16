<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Yajra\DataTables\EloquentDataTable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getActionAttribute()
    {
        $editButton = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
        $deleteButton = '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
        return $editButton . ' ' . $deleteButton;
    }

    public function getDatatables()
    { 

        // $query = $this->newQuery();
        // $datatable = new EloquentDataTable($query);

        // return $datatable->addColumn('action', function ($user) {
        //     return $user->action;
        // })->rawColumns(['action']);

        return (new EloquentDataTable ($this->newQuery()))
        ->addColumn('action', function ($user) {
            return $user->action;
        })
        ->rawColumns(['action']);
    }
}