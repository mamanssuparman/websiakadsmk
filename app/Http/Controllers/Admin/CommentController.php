<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Comments',
            'head'          => 'Comments',
            'breadcumb1'    => 'Comments',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.comment.index', $data);
    }

    public function detail($id)
    {
        $decodedId = base64_decode($id);

        $data = [
            'title'         => 'S-Panel | Comments',
            'head'          => 'Comments',
            'breadcumb1'    => 'Comments',
            'breadcumb2'    => 'Detail',
            'comment'       => Comment::find($decodedId)
        ];
        return view('adminpanel.pages.comment.detail', $data);
    }

    public function rejectComment($id)
    {
        try {
            $comment = Comment::where('id',$id);
            $comment->update([
                'statuscomment'     => 'Di Tolak'
            ]);
            return response()->json([
                'message'       => 'Comment rejected successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message'       => 'Something went wrong.!'
            ], 500);
        }
    }

    public function approveComment($id)
    {
        try {
            $comment = Comment::where('id', $id);
            $comment->update([
                'statuscomment'     => 'Approve'
            ]);
            return response()->json(['message'  => 'Comment Approved'], 200);
        } catch (Exception $error) {
            return response()->json(['message'  => 'Something went wrong'], 500);
        }
    }

    public function getDataComments(Request $request)
    {

        $orderBy = 'comments.namacomentar';

        switch ($request->input('order.3.column')) {
            case '1':
                $orderBy = 'comments.namacomentar';
                break;
                // case '2':
                //     $orderBy = 'articles.judul';
                //     break;
        }

        $orderSort = $request->input('order.0.dir');

        // $data = DB::table('comments')->leftJoin('users', 'comments.usersid', '=', 'users.id')->leftJoin('articles','comments.articleid','=','articles.id') ->select('comments.*', 'users.nama','articles.judul');
        $data = DB::table('comments')->leftJoin('articles', 'comments.articleid', '=', 'articles.id')->select('comments.*', 'articles.judul');
        // $data->join('users', 'comments.usersid', '=', 'users.id');
        // $data->join('articles', 'comments.articleid', '=', 'articles.id');

        if ($request->input('search.value') != null) {
            $data = $data->where(function ($q) use ($request) {
                $q->whereRaw('LOWER(comments.namacomentar) like ?', ['%' . $request->input('search.value') . '%']);
                // ->orWhereRaw('LOWER(articles.judul) like ?', ['%' . $request->input('search.value') . '%']);
            });
        }

        $recordsFiltered = $data->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, 'asc')->get();

        $recordsTotal = $data->count();
        $data1 = array();
        $no = $request->input('start');
        foreach ($data as $x) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = substr($x->namacomentar, 0, 80) ;
            $row[] = substr($x->comment, 0, 80).'...' ;
            $row[] = substr($x->judul, 0, 80).'...' ;
            $row[] = $this->_status($x);
            $row[] = $this->_btn_detail($x);
            $data1[] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data1,
        ]);
    }

    private function _btn_detail($x)
    {
        $btn_detail = '<a href="' . url('admin/comment/detail/' . base64_encode($x->id)) . '"
            class="px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></a>';
        return $btn_detail;
    }

    private function _status($x)
    {
        $status = $x->statuscomment;
        if ($status == 'New') {
            $span = '<span class="block h-6 text-center text-white bg-yellow-500 rounded-full w-28">New</span>';
        } elseif ($status == 'Approve') {
            $span = '<span class="block h-6 text-center text-white bg-green-500 rounded-full bg-blue-600-600 w-28">Approve</span>';
        } else {
            $span = '<span class="block h-6 text-center text-white bg-red-600 rounded-full w-28">Rejected</span>';
        }
        return $span;
    }
}
