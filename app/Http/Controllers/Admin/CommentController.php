<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

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
        $comment = Comment::find($id);
        $comment->update(['status' => 'Di Tolak']);

        return response()->json(['message' => 'Comment rejected successfully']);
    }

    public function approveComment($id)
    {
        $comment = Comment::find($id);
        $comment->update(['status' => 'Approve']);

        return response()->json(['message' => 'Comment approved successfully']);
    }

    public function getDataComments(Request $request)
    {

        $orderBy = 'users.nama';

        switch ($request->input('order.3.column')) {
            case '1':
                $orderBy = 'users.nama';
                break;
                // case '2':
                //     $orderBy = 'articles.judul';
                //     break;
        }

        $orderSort = $request->input('order.0.dir');

        $data = Comment::query();
        $data->join('users', 'comments.usersid', '=', 'users.id');
        // $data->join('articles', 'comments.articleid', '=', 'articles.id');

        if ($request->input('search.value') != null) {
            $data = $data->where(function ($q) use ($request) {
                $q->whereRaw('LOWER(users.nama) like ?', ['%' . $request->input('search.value') . '%']);
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
            $row[] = $x->user_nama->nama;
            $row[] = $x->article->judul;
            $row[] = $this->_status($x);
            $row[] = $this->_toggle($x);
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

    private function _toggle($x)
    {
        $statustoogle = $x->isactivecomments;
        if ($statustoogle == 'Active') {
            $togle = '<input type="checkbox" id="toggle" checked onclick="activenoncomments(this,' . $x->id . ')">';
        } else {
            $togle = '<input type="checkbox" id="toggle" onclick="activenoncomments(this,' . $x->id . ')">';
        }
        return $togle;
    }

    private function _status($x)
    {
        $status = $x->status;
        if ($status == 'New') {
            $span = '<span class="block h-6 text-center text-white bg-blue-800 rounded-full w-28">New</span>';
        } elseif ($status == 'Approve') {
            $span = '<span class="block h-6 text-center text-white bg-green-600 rounded-full w-28">Approve</span>';
        } else {
            $span = '<span class="block h-6 text-center text-white bg-red-600 rounded-full w-28">Rejected</span>';
        }
        return $span;
    }

    public function activenon(Request $request)
    {
        $commentStatus = Comment::firstWhere('id', $request->idComment);
        $status = $commentStatus->isactivecomments;
        if ($status == "Active") {
            $commentStatus->update(['isactivecomments' => 'Non Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        } else {
            $commentStatus->update(['isactivecomments' => 'Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }
    }
}
