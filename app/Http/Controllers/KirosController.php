<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kiro;

class KirosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログインしている時はデータを渡そう
        //@if
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $kiros = $user->kiros()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'kiros' => $kiros,
            ];
        }
        
        return view('welcome',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kiro=new Kiro;
        
        return view('kiros.create', [
            'kiro'=>$kiro
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->kiros()->create([
            'kiro' => $request->kiro,
            'detail' => $request->detail,
        ]);
        
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kiro = Kiro::findOrFail($id);
        
        return view('kiros.show',[
                'kiro' => $kiro,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // idの値でメッセージを検索して取得
        $kiro = Kiro::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('kiros.edit', [
            'kiro' => $kiro,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // idの値でメッセージを検索して取得
        $kiro = Kiro::findOrFail($id);
        // メッセージを更新
        $kiro->kiro = $request->kiro;
        $kiro->detail = $request->detail;
        $message->save();

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $kiro = Kiro::findOrFail($id);
        // メッセージを削除
        $kiro->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
