<?php 

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;

class TicketRepository extends BaseRepository
{
    public function getModel()
    {
        return new Ticket();
    }

    protected function selectTicketsList()
    {
        return $this->newQuery()->selectRaw(
            'tickets.*, '
            . '( SELECT COUNT(*) FROM ticket_comments WHERE ticket_comments.ticket_id = tickets.id) as num_comments,'
            . '( SELECT COUNT(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id) as num_votes'
        )->with('author');
    }

    /*protected function selectTicketComments($ticket_id)
    {
        return TicketComment::where('ticket_id', $ticket_id)->with('user')->get();
    }*/

    public function paginateLatest()
    {
        return $this->selectTicketsList()
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }

    public function paginateOpen()
    {
        return $this->selectTicketsList()
            ->where('status','open')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }

    public function paginateClosed()
    {
        return $this->selectTicketsList()
            ->where('status','closed')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }

    public function openNew($user, $title)
    {
        return $user->tickets()->create([
            'title'  => $title,
            'status' => 'open'
        ]);
    }

    /*public function getComments($id)
    {
        return $this->selectTicketComments($id);
    }*/
}