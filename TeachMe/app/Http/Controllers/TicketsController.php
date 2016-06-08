<?php namespace TeachMe\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TeachMe\Repositories\TicketRepository;

class TicketsController extends Controller {

    /**
     * @var TicketRepository
     */
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function latest()
    {
        $tickets = $this->ticketRepository->paginateLatest();

        return view('tickets.list', compact('tickets'));
    }

    public function popular()
    {
        return view('tickets.list');
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
        //$comments = $this->ticketRepository->getComments($id);
        return view('tickets.details', compact('ticket'), compact('comments'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request, Guard $auth)
    {
        $this->validate($request, [
           'title' => 'required|max:120'
        ]);

        $ticket = $auth->user()->tickets()->create([
            'title'  => $request->get('title'),
            'status' => 'open'
        ]);
        /*
        $ticket = new Ticket();
        $ticket->title = $request->get('title');
        $ticket->status = 'open';
        $ticket->user_id = $auth->user()->id;
        $ticket->save();*/

        return Redirect::route('tickets.details', $ticket->id);
    }
}