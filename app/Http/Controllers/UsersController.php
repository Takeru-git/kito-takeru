<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

class UsersController extends Controller
{
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $data = [];{
            // 認証済みユーザを取得
            $user = User::findOrFail($id);
            // ユーザの投稿の一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $kiros = $user->kiros()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'kiros' => $kiros,
            ];
        }
        
        return view('users.show',$data);
    }

}