<?php namespace TeachMe\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TeachMe\Repositories\CommentRepository;
use TeachMe\Repositories\TicketRepository;

class TicketsController extends Controller {

    protected $ticketRepository;
    protected $commentRepository;

    public function __construct(TicketRepository $ticketRepository, CommentRepository $commentRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->commentRepository = $commentRepository;
    }

    public function latest()
    {
        $tickets = $this->ticketRepository->paginateLatest();

        return view('tickets.list', compact('tickets'));
    }

    public function popular()
    {
        $tickets = $this->ticketRepository->paginatePopular();

        return view('tickets.list', compact('tickets'));
    }

    public function open()
    {
        $tickets = $this->ticketRepository->paginateOpen();
        return view('tickets.list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = $this->ticketRepository->paginateClosed();
        return view('tickets.list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id);
        $comments = $this->commentRepository->paginateLatest($id);
        return view('tickets.details', compact('ticket', 'comments'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|max:120',
            'link' => 'url'
        ]);

        $ticket = $this->ticketRepository->openNew(
            currentUser(),
            $request->get('title'),
            $request->get('link')
        );

        /*
        $ticket = new Ticket();
        $ticket->title = $request->get('title');
        $ticket->status = 'open';
        $ticket->user_id = $auth->user()->id;
        $ticket->save();*/

        return Redirect::route('tickets.details', $ticket->id);
    }

    public function select($ticketId, $commentId) {
        $ticket = $this->ticketRepository->findOrFail($ticketId);

        $this->authorize('selectResource', $ticket);

        $ticket->assignResource($commentId);

        return Redirect::back();
    }
}