<?php

namespace TeachMe\Entities;

class TicketComment extends Entity
{
    public function ticket()
    {
        $this->belongsTo(Ticket::getClass());
    }
    
    public function user()
    {
        return $this->belongsTo(User::getClass());
    }
}
