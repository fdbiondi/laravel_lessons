<?php

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Entities\User;

class CommentRepository extends BaseRepository
{
    public function getModel()
    {
        return new TicketComment();
    }

    public function create(Ticket $ticket, User $user, $comment, $link = '')
    {
        $comment = new TicketComment(compact('comment', 'link'));
        $comment->user_id = $user->id;
        $ticket->comments()->save($comment);
    }

    protected function selectCommentsList()
    {
        return $this->newQuery()->selectRaw(
            'ticket_comments.*, '
            . '( SELECT name FROM users WHERE ticket_comments.user_id = users.id) as user_name'
        );
    }

    public function paginateLatest($ticket_id)
    {
        return $this->selectCommentsList()
            ->where('ticket_id', $ticket_id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

}