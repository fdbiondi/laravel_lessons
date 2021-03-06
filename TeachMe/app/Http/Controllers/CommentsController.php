<?php namespace TeachMe\Http\Controllers;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TeachMe\Repositories\CommentRepository;
use TeachMe\Repositories\TicketRepository;

class CommentsController extends Controller {

    protected $commentRepository;
    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository, CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->ticketRepository = $ticketRepository;
    }

    public function submit($id, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|max:250',
            'link' => 'url'
        ]);

        $ticket = $this->ticketRepository->findOrFail($id);

        $this->commentRepository->create(
            $ticket,
            currentUser(),
            $request->get('comment'),
            $request->get('link')
        );

        session()->flash('success', 'Tu comentario fue guardado exitosamente.');
        return redirect()->back();
    }
}